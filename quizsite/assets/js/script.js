/**
 * Created by Renzie on 10/11/2017.
 */
$(function () {
    $('select').material_select();

    var question = new Question('derp', 60);
    //question.startQuestion();
    startQuestion = setInterval(question.update, 1000);
    $('#eindevraag').on('click', question.stopTimer);
});



function Question(text, time) {
    var that = this;

    this.time = time;
    this.text = text;
    this.width = 0;
    this.total = time;

    //this.startQuestion = setInterval(that.update, 1000);


    this.update = () => {
        console.log("updating")
        if (time < 0) {
            that.stopTimer();
        } else if (time == Math.round((this.total / 2) * 10 / 10)) {
            Materialize.toast('Je hebt nog ' + time-- + ' Seconden!', 4000);
        } else if (time == 10) {
            Materialize.toast('Je hebt nog ' + time-- + ' Seconden! Schiet op!', 4000);
        }
        else {
            this.width += 100 / this.total;
            $('.determinate').css('width', this.width + '%');
            $('.seconds').text(time-- + " sec");
        }
    };

    this.stopTimer = () => {
        $('.answers p input').attr('disabled', true)
        console.log(time);
        clearInterval(startQuestion);
    }
}

/*document.addEventListener("DOMContentLoaded", function () {
    $('.preloader-background').delay(1000).fadeOut('slow');

    $('.preloader-wrapper')
        .delay(1000)
        .fadeOut();
});

*/
