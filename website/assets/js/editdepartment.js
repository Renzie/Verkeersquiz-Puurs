$(document).ready(function () {
  $('.new_extra_question').on('click',addExtraQuestion);
  $('.collapsible').collapsible();

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
