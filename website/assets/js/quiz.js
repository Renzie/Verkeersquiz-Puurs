'use strict';

$(document).ready(function () {
    $('.materialboxed').materialbox();
    $('.modal').modal();
    $('.tooltipped').tooltip({delay: 50});
    $('select').material_select();


    $('.markcorrect').on('click', markCorrectAnswer);
    $('.newquestion').on('click', addNewQuestion);
    $('.questions').on('change', '.imageupload', uploadImg);
    $('.questionbuttons').on('click', 'a.delquestion', checkQuestion);



    //create quiz
    $(".add_new_quiz").on('click', addNewQuiz);
    $('.tabel_quiz').on('click', '.remove_quiz', removeQuiz);
    $('.tabel_quiz').on('click', '.save_quiz', saveQuiz);
    //$('.tabel_quiz').on('click', '.edit_questions', edit_questions);
    $(".questionbuttons").on('click', '.removeimage', removeImage);
});

var removeImage = function(){

  $(".questionimg").attr("src","#");
  $(this).remove();

}


function addNewQuiz(e) {
    e.preventDefault();
    var newRow = '<tr class="quiz" quizId="" >'+
      '<td><input class="quizName" type="text" value="" quizIdName="" ></td>'+
      '<td><input class="quizInfo" type="text" value="" quizIdInfo=""  ></td>'+
      '<td>'+
        '<a class="btn grey "><i class="material-icons">edit</i> </a>'+
        '<a class="btn purple save_quiz" buttonAction="createQuiz" ><i class="material-icons">save</i></a>'+
        '<a  class="btn red remove_quiz" buttonAction="deleteQuiz"><i class="material-icons">delete</i></a>'+
        '</td>'+
        '</tr>'


    $('.tabel_quiz').append(newRow);
}

function saveQuiz() {

  //todo

  var quizId = $(this).closest('.quiz').attr("quizId");
  console.log("quizid: "+quizId);
  var quizName = $(this).parent().parent().find(".quizName").val();


  console.log("quizName: "+quizName);

  var quizInfo = $(this).parent().parent().find(".quizInfo").val();
  console.log("quizInfo: "+quizInfo);

  var buttonAction = $(this).attr("buttonAction");
  console.log("buttonAction: ",buttonAction);

  // if(buttonAction == "createQuiz"){
  //   $(this).parent().find(".grey").removeClass("grey").addClass("edit_questions");
  // }

        var ajaxurl = 'dbaction.php',
        data =  {
          'action': buttonAction,
          'quizId': quizId,
          'quizName': quizName,
          'quizInfo': quizInfo
        };
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            //alert("action performed successfully");
            Materialize.toast("Opgeslagen!",1155);
            $('.body').load(document.URL +  ' .body');
            location.reload();

        });


}


function removeQuiz() {
    var quizId = $(this).closest('.quiz').attr("quizId");
    console.log("quizId: "+quizId);
    var buttonAction = $(this).attr("buttonAction");
    console.log("buttonAction: "+buttonAction);
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': buttonAction,
      'quizId': quizId
    };
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        Materialize.toast("verwijderd!",1155);
    });



    var quiz = $(this).closest('.quiz');
    quiz.remove();
}

var checkQuestion = function (e) {
    e.preventDefault();
    var currentQuestion = $(this).closest('.question');
    var questionList = $('.questions');
    if (questionList.children().length <= 1 ){
        Materialize.toast('Je hebt geen vragen meer!', 4000)
    } else {
        showQuestionWarning(currentQuestion);

    }
};

var showQuestionWarning = function(question){
    $("#questionmodal").modal('open');
    $("remquestion").on('click', delqu(question))
}

var delqu = function (question) {
    question.remove();
}


var uploadImg = function () {
    var image = $(this).closest('.question').find('.questionimg');
    var questionId = $(this).closest('.question').attr("questionid");
    var promise = Promise.resolve();
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            image.attr('src', e.target.result);
            promise.then(() => addRemoveImageButton(image));

            $.ajax({
                url: 'imgUpload.php?id='+questionId,
                type: 'POST',
                contentType: 'application/octet-stream;charset=UTF-8',
                data: e.target.result.split(",", 2)[1], //remove text header
                processData: false
            });

            };
        reader.readAsDataURL(this.files[0]);

    }
};
var addRemoveImageButton = (image) => {
    if (image.attr('src') != "#"){
        $(".removeimage").remove();
        $(".questionbuttons").append('<a data-tooltip="Verwijder afbeelding" class="removeimage btn tooltipped btn-small waves-effect waves-light red">' +
            '<i class="material-icons">block</i>'+
            '</a>' );
        $('.questionbuttons').off('.removeimage');
        $('.questionbuttons').on('click', 'a.removeimage', function () {

            var image = $(this).closest('.question').find('.questionimg' );

            image.attr('src', '#');
            $(".removeimage").remove();
        });
    };
}

var addNewQuestion = function (e) {
    e.preventDefault();
    var newQuestion =
    '<li class="newQuestion">' +
        '<div class="collapsible-header">' +
        '<i class="material-icons">chevron_right</i> Links of rechts </div>'+
    '<div class="collapsible-body">'+
        '<label>Vraag</label>'+
        '<input value="Links of rechts" class=" col s6" type="text" placeholder="text vraag"/>'+

        '<div class="editquestion row">'+
        '<div class="input-field col s5">'+
        '<select>'+
        '<option value="" disabled selected>Selecteer de moeilijkheidsgraad</option>'+
        '' +
        '</select>'+
        '<label>Moelijkheidsgraad</label>'+



        '</div>'+
       ' <div class="col s4 file-field ">'+
        '<div>'+
        '<label>Afbeelding</label>'+
        '<img class="materialboxed questionimg" src="#">'+
        '</div>'+



        '</div>'+
        '<div class="questionbuttons col s3 file-field input-field">'+
        '<a data-tooltip="Voeg een foto toe" class=" btn tooltipped btn-small waves-effect waves-light purple">'+
        '<i class="material-icons">add_a_photo</i> <input class="imageupload" type="file" accept="image/gif, image/jpeg, image/png">'+
        '</a>' +

       ' </div>'+
        '</div>'+


        '<ul class="answers row">'+
        '<li>'+
        '<h4>Antwoorden</h4>'+
        '</li>'+
        '<li class="answer">'+
        '<div class="  input-field col s12">'+
        '<input placeholder="Antwoord" type="text" class="validate">'+


        '<a class="removeanswer  btn btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>'+
        '<a data-tooltip="Markeer deze antwoord als correct" class="markcorrect tooltipped btn btn-small waves-effect waves-light green"><i class="material-icons">done</i></a>'+
        '</div>'+
        '</li>'+

        '</ul>'+

        '<div class="row">'+
        '<div class="col s6">'+
        '<a data-tooltip="Voeg een nieuwe antwoord"'+
    ' class="newanswer tooltipped btn btn-small waves-effect waves-light blue"><i'+
    ' class="material-icons">add</i></a>'+
        '</div>'+

        '<div class="col s3 offset-s3 ">'+
        '<a data-tooltip="Markeer deze antwoord als correct"'+
    ' class="markcorrect tooltipped btn btn-small waves-effect waves-light green"><i'+
    ' class="material-icons">save</i></a>'+
        '<a data-tooltip="Verwijder deze antwoord"'+
    ' class="removeanswer tooltipped btn btn-small waves-effect waves-light red"><i'+
   ' class="material-icons">delete</i></a>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</li>';
    $('.questions').append(newQuestion);
    $('.materialboxed').materialbox();
    $('select').material_select();

}





var markCorrectAnswer = function (e) { //TODO
    e.preventDefault();
    $('.tap-target').tapTarget('open');
}
