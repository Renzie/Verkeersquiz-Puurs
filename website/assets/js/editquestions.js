$(document).ready(function () {
    $('.question').on('click', '.updateQuestion', updateQuestion);
    $('.makeQuestion').on('click', makeQuestion);
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



  //console.log("question: "+question);
  //console.log("difficulty: "+difficulty);
  //console.log("img: "+ img);




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