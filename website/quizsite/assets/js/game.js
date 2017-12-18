$(function () {
    $('select').material_select();
    getQuestion();
});

var currentQuestion;
var timer;

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
    this.tijd = obj.time.split(':');
    this.setupTime = function () {
        if(this.tijd[1] !== "00"){
            if (this.tijd[2] !== "00"){

                return this.tijd[2]*this.tijd[1]*this.tijd[0];
            } else {

                return this.tijd[2]*this.tijd[1];
            }
        } else {

            return this.tijd[1];
        }
        return null;

    }
    this.currentTime = this.setupTime();

    console.log(this.tijd)


    var that = this;
    this.text = obj.question;
    this.width = 0;
    this.total = obj.time;

    $('#eindevraag').on('click', this.stopTimer);
    this.setupText = function () {
        $("[data-role='question']").text(obj.question);
    };
    this.setup = function () {
        console.log(this.currentTime)
        timer = setInterval(this.update(that.currentTime), 1000);
        this.setupText();
    };


    this.update = (time) => {
        if (time < 0) {
            that.stopTimer();
        } else if (time == Math.round((this.total / 2) * 10 / 10)) {
            Materialize.toast('Je hebt nog ' + time-- + ' Seconden!', 4000);
        } else if (time == 10) {
            Materialize.toast('Je hebt nog ' + time-- + ' Seconden! Schiet op!', 4000);
        }
        else {
            this.width += 100 / this.total;
            $('.timeleft').css('width', this.width + '%');
            $('.seconds').text(time--);
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
