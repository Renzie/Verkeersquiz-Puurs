/**
 * Created by Renzie on 27/10/2017.
 */
$(document).ready(function () {
    $(".add_new_school").on('click', addNewSchool);
    $('.tabel_school').on('click', '.remove_school', removeSchool);
    $('.tabel_school').on('click', '.save_school', saveSchool);
})


function addNewSchool(e) {
    e.preventDefault();
    var newRow = '<tr class="school">' +
    '<td><input type="text"></td>' +
    '<td><input type="text"></td>' +
        '<td><a class="btn red remove_school"><i class="material-icons">delete</i></a>' +
        '<a class="btn purple save_school"><i class="material-icons">save</i></a>' +
        '</td>' +
    '</tr>'


    $('.tabel_school').append(newRow);
}

function removeSchool() {
    var school = $(this).closest('.school')
    school.remove();
}

function saveSchool() {
    //todo
}