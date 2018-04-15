'use strict';

$(function () {
    $('select').material_select();
    getUser();
});

var currentQuiz = {};
var allQuestions = [];
var currentQuestion;
var currentQuestionPosition = 0;
var currentUser;
var currentDepartment;

/**
 * Shuffles array in place. ES6 version
 * @param {Array} a items An array containing the items.
 */
function shuffle(a) {
    for (var i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}


function doDbAction(action, callback) {
    $.ajax({
        type: "POST",
        url: "../dbaction.php",
        data: action,
        error: function () {
            console.log("error");
        }
    }).then(function (data) {
        //console.log(callback);
        //console.log(data);
        callback(JSON.parse(data));
        //callback(data);
    })
}

function getUser() {
    doDbAction({action: "getUser", userId: localStorage.getItem('userId')}, function (data) {
        currentUser = data;
        setupUser(currentUser.name, currentUser.familyName);
        getCurrentQuiz();

    })
}

function setupUser(firstname, lastname) {
    $('.username a').text(firstname + " " + lastname);
}

function setupQuiz() {
    var width = (currentQuestionPosition + 1) / allQuestions.length * 100 + "%";
    $(".quiz_progress .progress .determinate").css("width", width);
    $(".quiz_progress .current_position").text(currentQuestionPosition + 1 + " / " + allQuestions.length);
    $(".question .title").text("Vraag " + currentQuestionPosition + 1);
    $('.quizname').text(currentQuiz.name);
}

function getCurrentQuiz() {
    doDbAction({action: "getCurrentQuiz", quizId: localStorage.getItem('quizId')}, function (data) {
        currentQuiz = data;
        getDepartmentByDepartmentId();
    })
}

function getDepartmentByDepartmentId() {
    doDbAction({
        action: 'getDepartmentByDepartmentId',
        departmentId: localStorage.getItem('departmentId')
    }, function (data) {
        currentDepartment = data;
        getTemplateByDepartmentId();
        //getQuestionsByTemplateId();
    })
}

function getAllQuestionsFromQuiz() {
    doDbAction({action : 'getAllQuestionsByQuizId', quizId : currentQuiz.id}, function (data) {
        setUpQuestions(data);
    })
}

function getTemplateByDepartmentId() {
    doDbAction({
        action : 'getTemplateByDepartmentId',
        departmentId: currentDepartment.id,
        quizId: localStorage.quizId
    }, function (data) {
        if (data.id == null){
            console.log("getAllQuestionsFromQuiz");
            getAllQuestionsFromQuiz();
        } else {
            console.log("getQuestionsByTemplateId",data);
            getQuestionAndAnswerByQuizId(currentQuiz.id);
            //getQuestionsByTemplateId(data.schemaId);
        }
    });
}

function getQuestionsByTemplateId(templateId) {
    doDbAction({action: 'getAllQuestionsByQuizId', quizId: currentQuiz.id,templateId: templateId}, function (data) {
        setUpQuestions(data);
    });
}

function getQuestionAndAnswerByQuizId(quizId){
    var ajaxurl = '../dbaction.php',
      data =  {
      'action': 'getQuestionAndAnswerByQuizId',
      'quizId': quizId
    };
    $.post(ajaxurl, data, function (response) {
        response = response.replace(/'/g, "");
        response = response.replace(/é/g, "e");
        response = response.replace(/\\t/g, "");
        //console.log(processRawData(response));
        processRawData(response,setUpQuestionsV2);




    });
}

function processRawData(data,callback){
    /*
    [{ "id": 5,
        "question":"Is dit een quiz?",
        "diff":7,
        "cat":5,
        "imageLink":"image.png",
        "answers": [{"id":7, "answer":"Ja", "correct":1},
                  {"id":7, "answer":"Nee", "correct":0}]

    }]


    "questionId" => $questionId,
    "question" => $question,
    "difficulty" => $difficulty,
    "imageLink" => $imageLink,
    "category" => $category,
    "answerId" => $answerId,
    "answer" => $answer,
    "correct" => $correct
    */

    var temp = {};

    data = JSON.parse(data);
    var key = 0;
    var counter = 0;
    var answerCounter = 0;
    for(var i = 0; i<data.length;i++){

        if(data[i].questionId != key){
            temp[counter++] = {id: data[i].questionId, question:data[i].question, difficulty:data[i].difficulty, category:data[i].category, imageLink:data[i].imageLink, answers:[]};
            answerCounter = 0;
        }

        if(temp[counter - 1].id == data[i].questionId){
            temp[counter - 1].answers[answerCounter++] = {id:data[i].answerId, answer: data[i].answer, correct: data[i].correct};
        }
        key = data[i].questionId;
    }

    callback(temp);

}

function setUpQuestionsV2(data){
    //console.log("DATA LEN",Object.keys(data).length);
    for(var i = 0; i < Object.keys(data).length; i++){
         allQuestions[i] = new QuestionV2(data[i]);
         //console.log(data[i]);
    }

    allQuestions = shuffle(allQuestions);
    currentQuestion = allQuestions[0];
    //console.log("allquestions",allQuestions);
    //allQuestions[0].setup();
    currentQuestion.setup();
    setupQuiz();
}



function setUpQuestions(data) {
    let questions;
    questions = shuffle(data).map((question) => {
        return new Promise((resolve) => {
            doDbAction({action: 'getQuestionById', questionId: question.id}, function (res) {
                allQuestions.push(new Question(res));
                resolve();
            })
        })
    });
    Promise.all(questions).then(function () {
        //console.log(allQuestions);
        currentQuestion = allQuestions[0];
        currentQuestion.setup();
        setupQuiz();
    })

}


function Question(obj) {
    this.id = obj.id;
    this.difficultyId = obj.difficulty;
    this.time = 0;

    this.answers = [];
    this.timer = null;

    var that = this;
    this.text = obj.question;
    this.width = 0;
    this.total = 0;
    this.imageLink = obj.imageLink;

    this.setImage = function () {
        console.log(this.imageLink)
        if (this.imageLink == null || this.imageLink == '') {
            $('.image').hide()
            $('.image').attr('src', '')

        } else {
            $('.image').show()
            $('.image').attr('src', '../images/' + this.imageLink)
        }
    };
    this.getTime = function () {
        return doDbAction({
            action: "getDifficultyById",
            difficultyId: this.difficultyId
        }, function (data) {
            that.currentTime = data.time;
            that.time = data.time;
            that.total = data.time;
            console.log("current",that.currentTime)
            console.log("total", that.total)

        })
    };

    this.getAnswers = function () {
        doDbAction({
            action: "getAnswersByQuestionId",
            questionId: currentQuestion.id
        }, function (data) {
            that.answers = data;
            that.setupAnswers(that.answers);
        })
    };

    this.setupAnswers = function (answers) {
        $('[data-role="answers"]').empty();
        $(answers).each(function (data) {
            var html = '<p>' +
                '<input name="answer" type="radio" id="answer-' + answers[data].id + '">' +
                '<label for="answer-' + answers[data].id + '">' + answers[data].answer + '</label>' +
                '</p>';

            $('[data-role="answers"]').append(html);
        })

    };

    this.setupText = function () {
        var text = currentQuestionPosition;
        text++;
        $("[data-role='question']").text(currentQuestion.text);
        $(".question_number").text('Vraag ' + text);
    };

    this.setup = function () {
        if (this.total <= 0) {
            this.timer = window.setInterval(this.update, 1000);
        }
        this.setupText();
        this.getTime();

        this.getAnswers();
        this.setImage();
        $('form').off().on('submit', currentQuestion.sendAnswer)

    };



    this.update = () => {
        if (this.currentTime == 0) {
            console.log(this.currentTime)
            that.stopTimer();
        } else if (this.currentTime == Math.round((this.total / 2) * 10 / 10)) {
            Materialize.toast('Je hebt nog ' + this.currentTime-- + ' Seconden!', 4000);

        } else if (this.currentTime == 10) {
            Materialize.toast('Je hebt nog ' + this.currentTime-- + ' Seconden! Schiet op!', 4000);
        }
        else {
            this.width += 100 / this.total;
            $('.timeleft').css('width', this.width + '%');
            $('.seconds').text(this.currentTime--);
        }
    };

    this.stopTimer = () => {
        this.width += 100 / this.total;
        $('.timeleft').css('width', this.width + '%');
        Materialize.toast('Vraag ' + (currentQuestionPosition + 2), 4000);
        $('.answers p input').attr('disabled', true)
        console.log(this.timer)
        window.clearInterval(this.timer)
    }

    this.nextQuestion = () => {

        $('.question').fadeOut();

        if ((currentQuestionPosition + 1) == allQuestions.length) {
            window.location = 'endgame.php'
        } else {
            currentQuestion = allQuestions[++currentQuestionPosition];
            currentQuestion.setup();
            setupQuiz();
            $('.question').fadeIn();
        }

    };

    this.sendAnswer = (e) => {
        if (e) e.preventDefault();
        this.stopTimer()
        var answer = $('input[name="answer"]:checked').attr('id')
        if (answer !== undefined) {
            answer = answer.split('answer-')[1];
        } else {
            answer = 0;
        }
        $.ajax({
            type: "POST",
            url: "../dbaction.php",
            data: {action: 'sendAnswer', userId: currentUser.id, answerId: answer, time: currentQuestion.currentTime},
        }).then(function () {
            that.time = that.total;
            that.nextQuestion();
            console.log(that.time)
        });
    }
}

function QuestionV2(obj) {
    this.id = obj.id;
    this.difficultyId = obj.difficulty;
    this.time = 0;

    this.answers = obj.answers;
    this.timer = null;

    var that = this;
    this.text = obj.question;
    this.width = 0;
    this.total = 0;
    this.imageLink = obj.imageLink;

    this.setImage = function () {
        console.log(this.imageLink)
        if (this.imageLink == null || this.imageLink == '') {
            $('.image').hide()
            $('.image').attr('src', '')

        } else {
            $('.image').show()
            $('.image').attr('src', '../images/' + this.imageLink)
        }
    };
    this.getTime = function () {
        return doDbAction({
            action: "getDifficultyById",
            difficultyId: this.difficultyId
        }, function (data) {
            that.currentTime = data.time;
            that.time = data.time;
            that.total = data.time;
            console.log("current",that.currentTime)
            console.log("total", that.total)

        })
    };


    this.setupAnswers = function (answers) {
        $('[data-role="answers"]').empty();
        console.log("answer",answers);
        $(answers).each(function (data) {
            console.log("answer",data);
            var html = '<p>' +
                '<input name="answer" type="radio" id="answer-' + answers[data].id + '">' +
                '<label for="answer-' + answers[data].id + '">' + answers[data].answer + '</label>' +
                '</p>';

            $('[data-role="answers"]').append(html);
        })

    };


    this.setupText = function () {
        var text = currentQuestionPosition;
        text++;
        $("[data-role='question']").text(currentQuestion.text);
        $(".question_number").text('Vraag ' + text);
    };

    this.setup = function () {
        if (this.total <= 0) {
            this.timer = window.setInterval(this.update, 1000);
        }
        this.setupText();
        this.getTime();

        this.setupAnswers(this.answers);
        this.setImage();
        $('form').off().on('submit', currentQuestion.sendAnswer)

    };



    this.update = () => {
        if (this.currentTime == 0) {
            console.log(this.currentTime)
            that.stopTimer();
        } else if (this.currentTime == Math.round((this.total / 2) * 10 / 10)) {
            Materialize.toast('Je hebt nog ' + this.currentTime-- + ' Seconden!', 4000);

        } else if (this.currentTime == 10) {
            Materialize.toast('Je hebt nog ' + this.currentTime-- + ' Seconden! Schiet op!', 4000);
        }
        else {
            this.width += 100 / this.total;
            $('.timeleft').css('width', this.width + '%');
            $('.seconds').text(this.currentTime--);
        }
    };

    this.stopTimer = () => {
        this.width += 100 / this.total;
        $('.timeleft').css('width', this.width + '%');
        Materialize.toast('Vraag ' + (currentQuestionPosition + 2), 4000);
        $('.answers p input').attr('disabled', true)
        console.log(this.timer)
        window.clearInterval(this.timer)
    }

    this.nextQuestion = () => {

        $('.question').fadeOut();

        if ((currentQuestionPosition + 1) == allQuestions.length) {
            window.location = 'endgame.php'
        } else {
            currentQuestion = allQuestions[++currentQuestionPosition];
            currentQuestion.setup();
            setupQuiz();
            $('.question').fadeIn();
        }

    };

    this.sendAnswer = (e) => {
        if (e) e.preventDefault();
        this.stopTimer()
        var answer = $('input[name="answer"]:checked').attr('id')
        if (answer !== undefined) {
            answer = answer.split('answer-')[1];
        } else {
            answer = 0;
        }
        $.ajax({
            type: "POST",
            url: "../dbaction.php",
            data: {action: 'sendAnswer', userId: currentUser.id, answerId: answer, time: currentQuestion.currentTime},
        }).then(function () {
            that.time = that.total;
            that.nextQuestion();
            //console.log(that.time)
        });
    }
}
