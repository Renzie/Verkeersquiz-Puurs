$(document).ready(function () {
    $('.question').on('click', '.updateQuestion', updateQuestion);
    $('.makeQuestion').on('click', makeQuestion);
    $('.questions').on('click', '.newanswer', addNewAnswer);
});

var updateQuestion = function(){
  //console.log("updating question");
  //getting data

  var questionId = $(this).closest('.question').attr("questionid");
  var question = $(this).closest('.question').find("[name='question']").val();
  var difficulty = $(this).closest('.question').find("[name='difficulty']").val();
  var img = $(this).closest('.question').find("[name='image']").attr("src");
  var imgLink="";
  if(img != "#"){
    imgLink = "imageQuestion_"+questionId+".png";
  }


  var ajaxurl = 'dbaction.php',
  data =  {
    'action': 'updateQuestion',
    'id': questionId,
    'question': question,
    'difficulty': difficulty,
    'imgLink': imgLink,
    'time': '00:00:00'
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("Nieuwe vraag aangemaakt!",1000);
      //alert("action performed successfully");
  });

 var answerlist = $(this).find('.answer li');

 $('.answer li').each(fucntion(){

   var answerId = $(this).attr("answerid");
   var answer = $(this).val();
   var correct = $(this).attr("correct");


   var ajaxurl = 'dbaction.php',
   data =  {
     'action': 'updateAnswer',
     'answerId':questionId,
     'answer': answer,
     'correct': correct
   };
   $.post(ajaxurl, data, function (response) {
      //response
   });



 });



}

var makeQuestion = function(){
  console.log("making question");

    var url_string = window.location.href;
    var url = new URL(url_string);
    var quizId = url.searchParams.get("id");
    console.log("quizId:"+ quizId);
    quizId = parseInt(quizId);


  var ajaxurl = 'dbaction.php',
  data =  {
    'action': 'createQuestion',
    'question': 'nieuwe vraag',
    'difficulty': 1,
    'imgLink': '',
    'time': '00:00:00',
    'quizId':quizId
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("Nieuwe vraag aangemaakt!",1000);

        $('.questions').load(document.URL +  ' .question');
        //$.getScript("assets/materialize/js/materialize.min.js");
      //alert("action performed successfully");
  });





}

var addNewAnswer = function (e) {
    e.preventDefault();
    var newInput = '<li class="answer"><div class="input-field col s12">' +
        '<input placeholder="Antwoord " type="text" class="validate">' +
        '<a  class="removeanswer btn btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>' +
        ' <a data-tooltip="Markeer deze antwoord als correct" class="markcorrect tooltipped btn btn-small waves-effect waves-light green"><i class="material-icons">done</i></a>' +
        '</div></li>';
    $(this).closest('.question').find('.answers').append(newInput);


    var questionId = $(this).closest('.question').attr("questionid");
    var answer = "nieuw antwoord";
    var correct = 0;

    var ajaxurl = 'dbaction.php',
      data =  {
      'action': 'makeAnswer',
      'questionId': questionId,
      'answer': answer,
      'correct': correct
    };
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        Materialize.toast("Nieuw antwoord aangemaakt!",1000);

          $('.questions').load(document.URL +  ' .question');
    });


};
