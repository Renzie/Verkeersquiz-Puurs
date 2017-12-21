'use strict';

$(function () {
    $('select').material_select();
    getCurrentQuiz();
    getUser();
});

var currentQuiz = {};
var allQuestions = [];
var currentQuestion;
var currentQuestionPosition = 0;
var currentUser;



function doDbAction(action, callback) {
    $.ajax({
        type: "POST",
        url: "../dbaction.php",
        data: action,
        error: function () {
            console.log("error")
        }
    }).then(function (data) {
        callback(JSON.parse(data));
    })
}

function getCorrectAnswers() {
    doDbAction({action : "getCorrectAnswers", userId : localStorage.getItem('userId')}, function (data) {
        console.log(data);
    })
}

function getUser() {
    doDbAction({action: "getUser", userId: localStorage.getItem('userId')}, function (data) {
        currentUser = data;
        setupUser(currentUser.name, currentUser.familyName);
    })
}

function setupUser(firstname, lastname) {
    $('.username a').text(firstname + " " + lastname);
}

function setupQuiz() {

    var width = (currentQuestionPosition + 1) / allQuestions.length * 100 + "%";
    $(".quiz_progress .progress .determinate").css("width", width)
    $(".quiz_progress .current_position").text(currentQuestionPosition + 1 + " / " + allQuestions.length);
    $(".question .title").text("Vraag " + currentQuestionPosition + 1);
    $('.quizname').text(currentQuiz.name);
}

function getCurrentQuiz() {
    doDbAction({action: "getCurrentQuiz", quizId: localStorage.getItem('quizId')}, function (data) {
        currentQuiz = data;
        getAllQuestionsByQuizId();
    })
}

function getAllQuestionsByQuizId() {
    doDbAction({action: 'getAllQuestionsByQuizId', quizId: currentQuiz.id}, function (data) {
        allQuestions = data;
        currentQuestion = new Question(allQuestions[currentQuestionPosition]);
        currentQuestion.setup();
        setupQuiz();
    })
}

function Question(obj) {
    this.id = obj.id;

    this.timer = null;

    this.time = obj.time.split(':');
    this.setupTime = function () {
        var hour = this.time[0] * 60 * 60;
        var minute = this.time[1] * 60;
        var second = this.time[2];
        return parseInt(hour + minute + second);
    };
    this.answers = [];
    this.currentTime = this.setupTime();

    var that = this;
    this.text = obj.question;
    this.width = 0;
    this.total = this.currentTime;

    this.imageLink = obj.imageLink;

    this.setImage = function () {
        if (this.imageLink == null || this.imageLink == '') {
            $('.image').hide()
            $('.image').attr('src','')

        } else {
            $('.image').show()
            $('.image').attr('src', '../images/' + this.imageLink)
        }
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
        $('[data-role="answers"]').empty('p');
        console.log(answers)
        $(answers).each(function (data) {
            var html = '<p>' +
                '<input name="answer" type="radio" id="answer-' + answers[data].id + '"/>' +
                '<label for="answer-' + answers[data].id + '">' + answers[data].answer + '</label>' +
                '</p>';

            $('[data-role="answers"]').append(html);
        })
    };

    $('#eindevraag').off().on('click', function (e) {
        e.preventDefault();
        that.stopTimer();
    });

    this.setupText = function () {
        var text = currentQuestionPosition;
        text++;
        $("[data-role='question']").text(currentQuestion.text);
        $(".question_number").text('Vraag ' + text);
    };
    this.setup = function () {
        if (this.total !== 0) {
            that.timer = setInterval(this.update, 1000);
        }
            this.setupText();
            this.getAnswers();
            this.setImage();
            $('form').on('submit', currentQuestion.sendAnswer)

    };


    this.update = () => {
        console.log(this.currentTime);
        if (this.currentTime < 0) {
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
        Materialize.toast('Vraag ' +  (currentQuestionPosition + 2), 4000);

        clearInterval(this.timer);
        $('.answers p input').attr('disabled', true)
        that.sendAnswer();
    }

    this.nextQuestion = () => {
        $('.question').fadeOut();

        currentQuestion = new Question(allQuestions[++currentQuestionPosition]);

        currentQuestion.setup();
        setupQuiz();
        getCorrectAnswers();
        $('.question').fadeIn();
    };

    this.sendAnswer = (e) => {
        if (e) e.preventDefault();
        var time;
        if (time == undefined) {
            time = 0
        } else {
            time = currentQuestion.currentTime
        }
        var answer = $('input[name="answer"]:checked').attr('id')
        if (answer !== undefined) {
            answer = answer.split('answer-')[1];
        } else {
            answer =  null;
        }
        console.log(answer)
        $.ajax({
            type: "POST",
            url: "../dbaction.php",
            data: {action: 'sendAnswer', userId: currentUser.id, answerId: answer, time: time},
        }).then(function () {
            that.nextQuestion();
        });
    }
}

/*document.addEventListener("DOMContentLoaded", function () {
 $('.preloader-background').delay(1000).fadeOut('slow');

 $('.preloader-wrapper')
 .delay(1000)
 .fadeOut();
 });

 */
