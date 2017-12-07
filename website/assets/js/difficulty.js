$(document).ready(function () {

    $('.tabel_school').on('click','.deleteDifficulty',removeDifficulty);
});

var removeDifficulty = function(){
  var diffid = $(this).closest('.difficulty').attr("diffId");
  console.log(diffid);

  var buttonAction = $(this).attr("buttonAction");
  console.log("buttonAction: "+ buttonAction);

  var ajaxurl = 'dbaction.php',
  data =  {
    'action': buttonAction,
    'diffId': diffid
  };
  $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      Materialize.toast("verwijdert!",1155);

      //alert("action performed successfully");
  });
}

function addNewDifficulty(e) {
    e.preventDefault();
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': "addDifficulty",
      'difficulty': "nieuwe moeilijkheidsgraad"
    };
    $.post(ajaxurl, data, function (response) {
        location.reload();
    });

}
