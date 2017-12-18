$(document).ready(function () {
  $('.klassen').on('click', '.remove_department', removeDepartment);
  $('.klassen').on('click', '.update_department', updateDepartment);
  $('.add_new_department').on('click',makeDepartment);

});

var removeDepartment = function(){
  //ophalen naam clicked
  var klasId = $(this).parent().parent().attr("klasId");
  console.log(klasId);

  var ajaxurl = 'dbaction.php',
    data =  {
    'action': 'deleteDepartment',
    'departmentId': klasId
  };

  $.post(ajaxurl, data, function (response) {
      Materialize.toast("Klas is verwijderd!",1155);
      //Dirty way
      location.reload();
  });
}

var updateDepartment = function(){
  var klasId = $(this).parent().parent().attr("klasId");
  console.log(klasId);
  var klasName = $(this).parent().parent().find(".klasName").val();
  console.log(klasName);

  var ajaxurl = 'dbaction.php',
    data =  {
    'action': 'updateDepartment',
    'departmentId': klasId,
    'departmentName':klasName
  };

  $.post(ajaxurl, data, function (response) {

      Materialize.toast("Klas is gewijzigd!",1155);
      //Dirty way
      location.reload();

  });

}

var makeDepartment = function(){
  var url_string = window.location.href;
  var url = new URL(url_string);

  var organizationId = url.searchParams.get("id")

  var ajaxurl = 'dbaction.php',
    data =  {
    'action': 'makeDepartment',
    'departmentName':"nieuwe klas",
    'organizationId': organizationId
  };

  $.post(ajaxurl, data, function (response) {

      Materialize.toast("Klas is aangemaakt!",1155);
      //Dirty way
      location.reload();

  });

}
