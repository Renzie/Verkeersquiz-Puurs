$(document).ready(function () {
  //$('form').on('change',getData);
  $("#submitTemplate").on("click",getData);
  $("#updateTemplate").on("click",updateTemplate);
  $("#deleteTemplate").on("click",deleteTemplate);
  $('select').material_select();
  $('select').on('change', loadTemplate);
});

var getData = function(){
  var newTemplate = {};

  $('.category').each(function(){
	  var category = $(this).attr("category");
    var subtemplate = {};
    //console.log(category);
    $('[subcategory="'+category+'"]').each(function(){

		var difficulty = $(this).attr("difficulty");
		var val = $(this).val();
		subtemplate[difficulty]=val;
    });
    newTemplate[category] = subtemplate;
  });

  var url_string = window.location.href;
  var url = new URL(url_string);
  var quizId = url.searchParams.get("id");

  var templatename = [];
  templatename = $("#template_name").val();

  console.log(newTemplate);

  console.log("stringified: "+JSON.stringify(newTemplate));

  var stringTemplate = JSON.stringify(newTemplate);

  var ajaxurl = 'dbaction.php',
  data =  {
    'action': "submitTemplate",
    'quizId': quizId,
    'template': stringTemplate,
    'name':templatename
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("nieuwe template aangemaakt!",1155);
      //location.reload();
  });
}




var loadTemplate = function(){
  console.log('triggered option click');
  console.log($(".templateSelect :selected").text());

  var template = $(".templateSelect :selected").attr("quiztemplate");
  var id = $(".templateSelect :selected").val();
  var name = $(".templateSelect :selected").text();

  $("#template_name").val(name);

  template = JSON.parse(template);
  console.log(template);

  for(var category in template){
      console.log(category);
      var obj = template[category]
    for(var difficulty in obj){
      //console.log(difficulty);
      //var cat = template[category]
      //console.log(cat[difficulty]);
      console.log(obj[difficulty]);


        $('[subcategory="'+category+'"][difficulty="'+difficulty+'"]').val(obj[difficulty]);

      //console.log(template[category]["Makkelijk"]);
    }
  }

  //$("#submitTemplate").text("update").attr("id", "updateTemplate").attr("templateId",id);
  $("#submitTemplate").addClass("hide");
  $("#updateTemplate").removeClass('hide').attr("templateId",id);
  $("#back").removeClass('hide').attr("templateId",id);


}


var updateTemplate = function(){
  console.log("updating...");

  //getting nubers out of template
  var newTemplate = {};

  $('.category').each(function(){
	  var category = $(this).attr("category");
    var subtemplate = {};
    //console.log(category);
    $('[subcategory="'+category+'"]').each(function(){

		var difficulty = $(this).attr("difficulty");
		var val = $(this).val();
		subtemplate[difficulty]=val;
    });
    newTemplate[category] = subtemplate;
  });

  var url_string = window.location.href;
  var url = new URL(url_string);
  var quizId = url.searchParams.get("id");

  var templatename = [];
  templatename = $("#template_name").val();

  console.log(newTemplate);
  console.log("stringified: "+JSON.stringify(newTemplate));

  var stringTemplate = JSON.stringify(newTemplate);

  var id = $(this).attr("templateId");

  var ajaxurl = 'dbaction.php',
  data =  {
    'action': "updateTemplate",
    'templateId':id,
    'quizId': quizId,
    'template': stringTemplate,
    'name':templatename
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("Template geupdate!",1155);
      //location.reload();
  });
}


var deleteTemplate = function(){

  var id = $(this).attr("templateId");

  var ajaxurl = 'dbaction.php',
  data =  {
    'action': "deleteTemplate",
    'templateId':id
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("Template verwijdert!",1155);
      location.reload();
  });
}
