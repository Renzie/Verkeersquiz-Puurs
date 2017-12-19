$(function () {
    $('select').material_select();
    getCurrentQuiz();
    getUser();
});

var timer;
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

function getUser() {
    doDbAction({action: "getUser"}, function (data) {
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
    $(".question .title").text("Vraag " + currentQuestionPosition + 1)
}

function getCurrentQuiz() {
    doDbAction({action: "getCurrentQuiz"}, function (data) {
        currentQuiz = data;
        getAllQuestionsByQuizId();
    })
}

function getAllQuestionsByQuizId() {
    doDbAction({action: 'getAllQuestionsByQuizId', quizId: currentQuiz.id}, function (data) {
        allQuestions = data;
        currentQuestion = new Question(allQuestions[currentQuestionPosition]);
        console.log(currentQuestion)
        currentQuestion.setup();
        setupQuiz();
        console.log(allQuestions)
    })
}

function Question(obj) {
    this.id = obj.id;

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
        if (this.imageLink !== undefined) {
            $('.image').attr('src', '../images/' + this.imageLink)
        } else {
            $('.image').attr('src', '')
        }
    }

    this.getAnswers = function () {
        console.log(currentQuestion.id)
        doDbAction({
            action: "getAnswersByQuestionId",
            questionId: currentQuestion.id
        }, function (data) {
            that.answers = data;
            console.log(data);
            that.setupAnswers(that.answers);
        })
    };

    this.setupAnswers = function (answers) {
        $('[date-role="answers"]').empty();
        $(answers).each(function (data) {
            console.log(answers[data].id)
            var html = '<p>' +
                '<input name="answer" type="radio" id="answer-' + answers[data].id + '"/>' +
                '<label for="answer-' + answers[data].id + '">' + answers[data].answer + '</label>' +
                '</p>';

            $('[data-role="answers"]').append(html);
        })
    };

    $('#eindevraag').on('click', this.stopTimer);
    this.setupText = function () {
        var text = currentQuestionPosition;
        console.log(currentQuestion)
        text++;
        $("[data-role='question']").text(currentQuestion.text);
        $(".question_number").text('Vraag ' + text);
    };
    this.setup = function () {
        timer = setInterval(this.update, 1000);
        this.setupText();
        this.getAnswers();
        this.setImage()
        $('form').on('submit', currentQuestion.sendAnswer)
    };


    this.update = () => {
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
        Materialize.toast('Je tijd is op!', 4000);
        $('.answers p input').attr('disabled', true)
        clearInterval(timer);
        that.sendAnswer();
    }

    this.nextQuestion = () => {
        $('.question').fadeOut();

        currentQuestion = new Question(allQuestions[++currentQuestionPosition]);

        currentQuestion.setup();
        setupQuiz();
        console.log(currentQuestion.answers)

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
        }
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
