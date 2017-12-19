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

function getUser(){
    doDbAction({action : "getUser"}, function (data) {
        currentUser = data;
        setupUser(currentUser.name,currentUser.familyName);
    })
}

function setupUser(firstname, lastname) {
    $('.username a').text(firstname + " " + lastname);
}

function setupQuiz() {

    var width = currentQuestionPosition + 1 / allQuestions.length *100 + "%";
    $(".quiz_progress .progress .determinate").css("width", width)
    $(".quiz_progress .current_position").text(currentQuestionPosition + 1 + " / " + allQuestions.length);
    $(".question .title").text("Vraag " + currentQuestionPosition + 1)
}

function getCurrentQuiz() {
    doDbAction({action : "getCurrentQuiz"},function (data) {
        currentQuiz = data;
        getAllQuestionsByQuizId();
    })
}

function getAllQuestionsByQuizId() {
    doDbAction({action : 'getAllQuestionsByQuizId', quizId : currentQuiz.id }, function (data) {
        allQuestions = data;
        getQuestion(currentQuestionPosition);
    })
}

function getQuestion(currentposition) {
    doDbAction({action : "getCurrentQuestion", questionId : allQuestions[currentposition].id}, function (data) {
        currentQuestion = new Question(data);
        currentQuestion.setup();
        setupQuiz();
    });
}
function Question(obj) {

    this.time = obj.time.split(':');
    this.setupTime = function () {
        var hour = this.time[0]*60*60;
        var minute = this.time[1]*60;
        var second = this.time[2];
        return parseInt(hour + minute + second);
    };
    this.answers = [];
    this.currentTime = this.setupTime();

    var that = this;
    this.text = obj.question;
    this.width = 0;
    this.total = this.time;


    this.getAnswers = function () {
        doDbAction({
            action : "getAnswersByQuestionId",
            questionId: currentQuestion.id
        }, function (data) {
            that.answers = data;
            that.setupAnswers(that.answers);
        })
    };

    this.setupAnswers = function (answers) {
        $('[date-role="answers"]').empty();
        $(answers).each(function (data) {

            var html = '<p>' +
                '<input name="answer" type="radio" id="answer-' +answers[data].id + '"/>' +
                '<label for="answer-' + answers[data].id + '">' + answers[data].answer +'</label>' +
            '</p>';

            $('[data-role="answers"]').append(html);
        })
    };

    $('#eindevraag').on('click', this.stopTimer);
    this.setupText = function () {
        $("[data-role='question']").text(obj.question);
    };
    this.setup = function () {
        timer = setInterval(this.update, 1000);
        this.setupText();
        this.getAnswers();
        $('form').on('submit',currentQuestion.sendAnswer)
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
        this.nextQuestion()
    }

    this.nextQuestion = () => {
        $('.question').fadeOut();

        currentQuestion = allQuestions[++currentQuestionPosition];
        that.setup();

        $('.question').fadeIn();
    }

    this.sendAnswer = (e) => {e.preventDefault();
       var answer = $('input[name="answer"]:checked').attr('id').split('answer-')[1];

        $.ajax({
            type: "POST",
            url: "../dbaction.php",
            data: {action: 'sendAnswer',  userId: currentUser.id, answerId: answer, time: currentQuestion.currentTime},
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
