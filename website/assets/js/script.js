$(document).ready(function(){
  $('select').material_select();
  $('.newanswer').on('click', addNewAnswer);
});


var addNewAnswer = function(e) {
  e.preventDefault();
    var newInput = '<div class="input-field col s10">' +
      '<input placeholder="Antwoord 1" id="Antwoord-1" type="text" class="validate">' +
      '<a class=" col s3 newanswer waves-effect waves-light btn">Voeg een nieuwe antwoord toe</a>' +
    '</div>' +  
    '<a class="btn-floating btn-small red">' +
'<i class="large material-icons">mode_edit</i>' +
'</a>'
    ;

    $(this).parent().append(newInput);

}
