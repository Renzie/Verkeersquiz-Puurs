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
    setInterval(function() {
        console.log(time);
        $('.seconds').text(time-- + " sec  ");

    },1000);
}