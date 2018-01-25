$(document).ready(function () {
  $('.new_extra_question').on('click',addExtraQuestion);
  $('.newanswer').on('click',addNewAnswer);
  $('.extraquestion').on('click', '.removeanswer', removeAnswer);
  $('body').on('click', '.markcorrect', markCorrect);
  $('.extraquestion').on('click','.removeQuestion',removeQuestion);
  $('.extraquestion').on('click', '.updateQuestion', updateQuestion);

  $('.extraquestion').on('change', '.imageupload', uploadImg);
  $(".extraquestion").on('click', '.removeimage', removeImage);
  $(".create_template_department").on('click', createTemplateDepartment);




});


var addExtraQuestion = function(){
  $('.collapsible').collapsible();

  //TODO
  var templatedepartmentid =  $(this).attr('templatedepartmentid');

  var ajaxurl = 'dbaction.php',
    data =  {
    'action': 'addExtraQuestion',
    'templatedepartmentid': templatedepartmentid,
  };
  $.post(ajaxurl, data, function (response) {
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


    var questionId = $(this).closest('.extraquestion').attr("questionid");
    console.log("QUESTIONID: "+questionId);
    var answer = "new answer";
    var correct = 0;
    var that = this;
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
        //TODO
        //refresh
        var id = $(that).closest('.extraquestion').attr("questionid");
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
    console.log("REMOVING Answer");
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

var removeQuestion = function(e){
    e.preventDefault();
    var currentQuestion = $(this).closest('.extraquestion');
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

var updateQuestion = function(){
  //console.log("updating question");
  //getting data
  console.log("updating");

  var questionId = $(this).closest('.extraquestion').attr("questionid");
  var question = $(this).closest('.extraquestion').find("[name='question']").val();
  var difficulty = $(this).closest('.extraquestion').find("[name='difficulty']").val();
  var category = $(this).closest('.extraquestion').find("[name='category']").val();

  var img = $(this).closest('.extraquestion').find("[name='image']").attr("src");
  var imgLink="";
  if(img != "images/No-image-found.jpg"){
    imgLink = "imageQuestion_"+questionId+".png";
  }

  console.log("questionId: "+questionId + " question: " + question + " diff: "+ difficulty + " category: " + category);
  console.log("img: "+ img);


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

var uploadImg = function () {
    var image = $(this).closest('.extraquestion').find('.questionimg');
    var questionId = $(this).closest('.extraquestion').attr("questionid");
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

var removeImage = function(){

  $(".questionimg").attr("src","images/No-image-found.jpg");
  $(this).remove();

}


var createTemplateDepartment = function(){
  var schemaId = $(this).parent().parent().parent().find('.schemas').val;
  console.log("schemaId: " );
  console.log(schemaId);
  var url_string = window.location.href;
  var url = new URL(url_string);
  var departmentId=url.searchParams.get("did");
  console.log("departmentid: "+departmentId);
  var quizId= $(this).closest('.quiz').attr("quizid");
  console.log("quizId: "+quizId);
}
