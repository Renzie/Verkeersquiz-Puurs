$(document).ready(function () {
    $(".add_new_difficulty").on('click', addNewCategorie);

    $('.tabel_school').on('click','.deleteCategory',removeCategory);
    $('.tabel_school').on('click','.updateCategory',updateCategory);
});

var removeCategory = function(){
  var catid = $(this).closest('.category').attr("catId");
  console.log(catid);

  var buttonAction = $(this).attr("buttonAction");
  console.log("buttonAction: "+ buttonAction);

  var ajaxurl = 'dbaction.php',
  data =  {
    'action': buttonAction,
    'catId': catid
  };
  $.post(ajaxurl, data, function (response) {
      Materialize.toast("verwijderd!",1155);
      location.reload();
  });
}

function addNewCategory() {
    console.log("new cat");
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': "makeCategory",
      'category': "nieuwe categorie"
    };
    $.post(ajaxurl, data, function (response) {
        location.reload();
    });

}


function updateCategory()){
  var catid = $(this).closest('.categorie').attr("catId");
  var category = $(this).closest('.category').find(".categoryName").val();
  //console.log("id: , "+diffid+"difficulty: "+difficulty);
  var ajaxurl = 'dbaction.php',
  data =  {
    'action': "updateCategory",
    'catid':catid,
    'category': category
  };
  $.post(ajaxurl, data, function (response) {
      location.reload();
  });
}
