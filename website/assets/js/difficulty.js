$(document).ready(function () {
    $(".add_new_difficulty").on('click', addNewDifficulty);

    $('.tabel_school').on('click','.deleteDifficulty',removeDifficulty);
    $('.tabel_school').on('click','.updateDifficulty',updateDifficulty);
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
      Materialize.toast("verwijderd!",1155);
      location.reload();
  });
}

function addNewDifficulty() {
    console.log("new diff");
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': "makeDifficulty",
      'difficulty': "nieuwe moeilijkheidsgraad"
    };
    $.post(ajaxurl, data, function (response) {
        location.reload();
    });

}


function updateDifficulty(){
  var diffid = $(this).closest('.difficulty').attr("diffId");
  var difficulty = $(this).closest('.difficulty').find(".difficultyName").val();
  console.log("id: , "+diffid+"difficulty: "+difficulty);
  var ajaxurl = 'dbaction.php',
  data =  {
    'action': "updateDifficulty",
    'diffid':diffid,
    'difficulty': difficulty
  };
  $.post(ajaxurl, data, function (response) {
      location.reload();
  });


}
