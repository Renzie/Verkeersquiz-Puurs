$(document).ready(function () {
    bindEvents();
});

function bindEvents(){
    $('select').material_select();
    $('.question').on('click', '.updateQuestion', updateQuestion);

    $('.makeQuestion').on('click', makeQuestion);
    $('.questions').on('click', '.newanswer', addNewAnswer);
    $('.questions').on('click', '.removeanswer', removeAnswer);
    $('body').on('click', '.markcorrect', markCorrect);
    $('.question').on('click','.removeQuestion',removeQuestion);
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('form').on('change',updateQuestion);
}

var updateQuestion = function(){
  //console.log("updating question");
  //getting data
  console.log("updating");

  var questionId = $(this).closest('.question').attr("questionid");
  var question = $(this).closest('.question').find("[name='question']").val();
  var difficulty = $(this).closest('.question').find("[name='difficulty']").val();
  var category = $(this).closest('.question').find("[name='category']").val();

  var img = $(this).closest('.question').find("[name='image']").attr("src");
  var imgLink="";
  if(img != "#"){
    imgLink = "imageQuestion_"+questionId+".png";
  }


  var ajaxurl = 'dbaction.php',
  data =  {
    'action': 'updateQuestion',
    'questionId': questionId,
    'question': question,
    'difficulty': difficulty,
    'category':category,
    'imgLink': imgLink
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("Vraag opgeslaan",1000);
      //alert("action performed successfully");
  });

 var answerlist = $(this).find('.answer li');
 console.log("before");
  //console.log($(this).parent().parent().parent().find(".answers"));
  var ul = $(this).closest(".collapsible-body").find(".answers");
  $(ul).find(".answer").each(function(){

   var answerId = $(this).attr("answerid");
   var answer = $(this).find("input").val();
   var correct = $(this).attr("correct");
   console.log("answerid:"+answerId );
   console.log("answer:"+answer);
   console.log("correct:"+correct );

   var ajaxurl = 'dbaction.php',
   data =  {
     'action': 'updateAnswer',
     'answerId':answerId,
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
    'category': 1,
    'quizId':quizId
  };
  $.post(ajaxurl, data, function (response) {

      Materialize.toast("Nieuwe vraag aangemaakt!",1000);

      //Dirty way, just reload the entire page!
      location.reload();


  });





}

var removeQuestion = function(e){
    e.preventDefault();

    var currentQuestion = $(this).closest('.question');
    var questionId = currentQuestion.attr('questionid');




    var ajaxurl = 'dbaction.php',
      data =  {
      'action': 'deleteQuestion',
      'questionId': questionId
    };
    $.post(ajaxurl, data, function (response) {

        Materialize.toast("Vraag is verwijderd!",1155);
        //Dirty way
        location.reload();

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
    var answer = "new answer";
    var correct = 0;
    var that = this;


    var ajaxurl = 'dbaction.php',
      data =  {
      'action': 'makeAnswer',
      'questionId': questionId,
      'answer': answer,
      'correct': correct,
      'category': 3 //TODO verander dit naar de category
    };

    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        Materialize.toast("Nieuw antwoord aangemaakt!",1000);




        //TODO
        //refresh
        var id = $(that).closest('.question').attr("questionid");
        var div = $(that).parent().parent().parent().find(".answersdiv"+id);
        console.log(that);
        console.log(div);
        console.log("id: "+id);
          var thegodrow = $(that).parent().parent().parent().find(".answers");
          console.log("doing reload");
          $(div).load(document.URL +  ' .answersdiv'+id+' .answers');

          //$(that).closest(".answers").load(document.URL +  ' .answer');

    });
};

var removeAnswer = function (e) {
    e.preventDefault();
    var parent = $(this).closest('.answers');
    var currentAnswer = $(this).closest('.answer');
    if (parent.children().length <= 1) {
        Materialize.toast('Je hebt geen antwoorden meer!', 4000)
    } else {
        currentAnswer.remove();
    }

    var answerId = $(this).closest(".answer").attr("answerid");
    console.log("te verwijderen id: "+answerId);


    var ajaxurl = 'dbaction.php',
      data =  {
      'action': 'deleteAnswer',
      'answerId': answerId
    };
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        Materialize.toast("Antwoord is verwijderd",1000);

    });
}

var markCorrect = function(){
  console.log("correct!");

  $(this).removeClass("orange").addClass("green");
  $(this).closest(".answer").attr("correct", 1);
  var clickedAnswerId = $(this).closest(".answer").attr("answerid");

  var ul = $(this).closest(".collapsible-body").find(".answers");
   $(ul).find(".answer").each(function(){
     if($(this).attr("answerid") != clickedAnswerId){
       $(this).find(".markcorrect").removeClass("orange").removeClass("green").addClass("red");
       $(this).attr("correct", 0)
     }
   });
}
