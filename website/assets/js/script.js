'use strict';

$(document).ready(function () {
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip({delay: 50});
    $('select').material_select();
    $('.questions').on('click', '.newanswer', addNewAnswer);
    $('.questions').on('click', '.removeanswer', removeAnswer)
    $('.markcorrect').on('click', markCorrectAnswer);
    $('.newquestion').on('click', addNewQuestion);
    $('.questions').on('change', '.imageupload', uploadImg);
    $('.questions').on('click', '.delquestion', removeQuestion)

});

var removeQuestion = function (e) {
    e.preventDefault();
    console.log($(this).parent().find('question'))

}

var uploadImg = function (e) {
    var image = $(this).parent().parent().parent().find('.questionimg');

    if (e.target.files && e.target.files[0]) {
        var reader = new FileReader();
        //var parent = this.parent()
        reader.onload = function (e) {
            image
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(e.target.files[0]);

    }
}

var addNewQuestion = function (e) {
    e.preventDefault();
    var newQuestion = '<li class="question">' +
        '<div class="collapsible-header valign-wrapper"><i class="material-icons">add_box</i><input style="width:50%" type="text" placeholder="text vraag"/> <img class="materialboxed questionimg" src="#"> '+
        '<div class="questionsettings file-field input-field">' +
        '<a data-tooltip="Voeg een foto toe" class=" tooltipped btn btn-large waves-effect waves-light purple"><i class="material-icons">add_a_photo</i> <input class="imageupload" type="file" accept="image/gif, image/jpeg, image/png"></a>'+
        '<a data-tooltip="Verwijder deze vraag" class=" tooltipped btn btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a> </div>'+

        '</div>' +
        '</div> ' +
        '<div class="collapsible-body">' +
        '<ul class="answers row"><li>' +
        '<div class=" answer input-field col s12">' +
        '<input placeholder="Antwoord" type="text" class="validate">' +
        '<a data-tooltip="Voeg een nieuwe antwoord" class="newanswer tooltipped btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>' +
        '<a data-tooltip="Verwijder deze antwoord" class="removeanswer tooltipped btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>' +
        '<a data-tooltip="Markeer deze antwoord als correct" class="markcorrect tooltipped btn-floating btn-small waves-effect waves-light green"><i class="material-icons">done</i></a>' +
        '</div> ' +
        '</li>' +
        '</ul>' +
        '</div>' +
        '</li>';
    console.log()
    $('.questions').append(newQuestion);
    $('.materialboxed').materialbox();

}

var removeAnswer = function (e) {
    e.preventDefault();
    var parent = $(this).parent().parent();
    if (parent.parent().children().length <= 1) {
        Materialize.toast('Je hebt geen antwoorden meer!', 4000)
    } else {
        parent.remove();
    }
    console.log(parent.parent().children().length);
}

var addNewAnswer = function (e) {
    e.preventDefault();
    var newInput = '<li><div class="answer input-field col s12">' +
        '<input placeholder="Antwoord " type="text" class="validate">' +
        '<a data-tooltip="Voeg een nieuwe antwoord" class="newanswer tooltipped btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>' +
        '<a data-tooltip="Verwijder deze antwoord" class="removeanswer tooltipped btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>' +
        ' <a data-tooltip="Markeer deze antwoord als correct" class="markcorrect tooltipped btn-floating btn-small waves-effect waves-light green"><i class="material-icons">done</i></a>' +
        '</div></li>';

    $(this).parent().parent().parent().append(newInput);

    console.log("derp")

};

var markCorrectAnswer = function (e) { //TODO
    e.preventDefault();
    $('.tap-target').tapTarget('open');
}
