/**
 * Created by Renzie on 27/10/2017.
 */
$(document).ready(function () {
    $(".add_new_school").on('click', addNewSchool);
})


function addNewSchool(e) {
    e.preventDefault();
    var newRow = '<tr>' +
    '<td><input type="text"></td>' +
    '<td><input type="text"></td>' +
    '</tr>'

    console.log("derp   ")

    $('.tabel_school').append(newRow);
}