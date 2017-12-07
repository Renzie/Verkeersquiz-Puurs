/**
 * Created by Renzie on 10/11/2017.
 */
$(function () {
    $('select').material_select();

    generateRandomTheme();
});


var kleur = [{
    body: "yellow lighten-5",
    nav: "blue-grey"
},
    {
        body: "light-blue lighten-5",
        nav: "deep-purple lighten-1"
    }
];


function generateRandomTheme() {
    var rand = Math.floor((Math.random() * kleur.length ) + 1);
    removeColorClasses();
    addColorClasses(rand);
}

function removeColorClasses() {
    $('body').removeClass();
    $('nav').removeClass();
}


function addColorClasses(rand) {
    $('body').addClass(kleur[rand - 1].body);
    $('nav').addClass(kleur[rand - 1].nav);
}