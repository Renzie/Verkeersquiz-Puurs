/**
 * Created by Renzie on 27/10/2017.
 */
$(document).ready(function () {
    $(".add_new_school").on('click', addNewSchool);
    $('.tabel_school').on('click', '.remove_school', removeSchool);
    $('.tabel_school').on('click', '.save_school', saveSchool);
    $('.tabel_school').on('click', '.dupe_school', dupeSchool);
});


function addNewSchool(e) {
    e.preventDefault();
    var newRow = '<tr class="school">' +
    '<td><input class="schoolName" type="text"></td>' +
    '<td><input class="schoolInfo" type="text"></td>' +
        '<td><a class="btn red remove_school" buttonAction="deleteOrganisation"><i class="material-icons">delete</i></a>' +
        '<a class="btn purple save_school" buttonAction="createOrganisation"><i class="material-icons">save</i></a>' +
        '</td>' +
    '</tr>'


    $('.tabel_school').append(newRow);
}

function removeSchool() {
    var schoolId = $(this).closest('.school').attr("schoolId");
    var buttonAction = $(this).attr("buttonAction");
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': buttonAction,
      'schoolId': schoolId
    };
    $.post(ajaxurl, data, function (response) {
        // Response div goes here.
        Materialize.toast("verwijderd!",1155);
        //alert("action performed successfully");
    });



    var school = $(this).closest('.school');
    school.remove();
}

function dupeSchool(e){

    e.preventDefault();
    var schoolId = $(this).closest('.school').attr("schoolId");
    var buttonAction = $(this).attr("buttonAction");
    var ajaxurl = 'dbaction.php',
    data =  {
      'action': buttonAction,
      'schoolId': schoolId
    };
    $.post(ajaxurl, data, function (response) {
        Materialize.toast("Nieuwe kopie gemaakt!",1155);
        location.reload();

    });

}

function saveSchool() {



  var schoolId = $(this).closest('.school').attr("schoolId");
  console.log("schoolid: "+schoolId);
  var schoolName = $(this).parent().parent().find(".schoolName").val();
  var schoolName2 = $(this).closest('.school').find(".schoolName").val();

  console.log("schoolName: "+schoolName);
  console.log("schoolName2: "+schoolName2);

  var schoolInfo = $(this).parent().parent().find(".schoolInfo").val();
  console.log("schoolInfo: "+schoolInfo);

  var buttonAction = $(this).attr("buttonAction");
  console.log("buttonAction: ",buttonAction);

  if(buttonAction == "createOrganisation"){
    $(this).attr("buttonAction", "updateOrganisation");
  }

        var ajaxurl = 'dbaction.php',
        data =  {
          'action': buttonAction,
          'schoolId': schoolId,
          'schoolName': schoolName,
          'schoolInfo': schoolInfo
        };
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            Materialize.toast("opgeslagen!",1155);

            //alert("action performed successfully");
        });


}
