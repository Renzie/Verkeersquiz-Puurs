$(function () {
    $('select').material_select();
    getQuestion();
});




var currentQuestion;
var timer;

var currentQuiz = [];


function getQuestion() {
    $.ajax({
        type: "POST",
        url: "../dbaction.php",
        data: {
            action: "getCurrentQuestion",
            questionId: 4
        },
        success: function (data) {
            currentQuestion = new Question(JSON.parse(data));
            currentQuestion.setup();
        }
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
    this.total = this.currentTime;

    this.getAnswers = function () {
        $.ajax({
            type : "POST",
            url : "../dbaction.php",
            data : {
                action : "getAnswersByQuestionId",
                questionId: 3
            },
            success: function (data) {
                that.answers = JSON.parse(data);
                console.log(that.answers)
                that.setupAnswers(that.answers);
            }
        })
    };

    this.setupAnswers = function (answers) {
        $(answers).each(function (data) {

            var html = '<p>' +
                '<input name="group1" type="radio" id="answer-' +answers[data].id + '"/>' +
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

        //TODO question aanpassen


        $('.question').fadeIn();
    }


}

/*document.addEventListener("DOMContentLoaded", function () {
 $('.preloader-background').delay(1000).fadeOut('slow');

 $('.preloader-wrapper')
 .delay(1000)
 .fadeOut();
 });

 */
