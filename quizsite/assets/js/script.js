/**
 * Created by Renzie on 10/11/2017.
 */
$(function () {
    $('select').material_select();

    $('.carousel.carousel-slider').carousel({fullWidth: true});

    Materialize.showStaggeredList('.list')

    $('.next').on('click', nextPanel);
    startTimer(60);
})

document.addEventListener("DOMContentLoaded", function(){
    $('.preloader-background').delay(1000).fadeOut('slow');

    $('.preloader-wrapper')
        .delay(1000)
        .fadeOut();
});
var nextPanel = (e) =>{
    e.preventDefault();
    $('.carousel').carousel('next');
}

var startTimer = function(time){
    var width = 0;
    var total = time;
    var interval = setInterval(update,1000);


    function update() {

        if (time < 0) {
            endTimer();
        } else {
            width += 100 / total;
            $('.determinate').css('width', width + '%')
            //$('.timer').css('width', (time/total)*100 + 'vw')
            $('.seconds').text(time-- + " sec");

            console.log(width);
        }
    };

    function endTimer(){
        clearInterval(interval);
        $('.answers p input').attr('disabled', true)
    }
};

