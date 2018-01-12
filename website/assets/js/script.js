$(document).ready(function () {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('select').material_select();

    addHTMLToNav();
});


var loaded = false;

var addHTMLToNav= function(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var quizId = url.searchParams.get("id");
    var html = `<li><div class="divider"></div></li>
              <li><a href="aantal.php?id=${quizId}"><i class="material-icons">format_list_numbered</i>Quiz Template</a></li>
              <li><a href="moeilijkheidsgraad.php?id=${quizId}"><i class="material-icons">format_align_left</i>Moeilijkheidsgraad</a></li>
              <li><a href="categories.php?id=${quizId}"><i class="material-icons">sort</i>Categorieën</a></li>
              <li><a href="dashboard.php?id=${quizId}"><i class="material-icons">equalizer</i>Statistics</a></li>`;

    if(quizId != null && url.pathname == '/editquestions.php' && !loaded) {
        $("#slide-out").append(html);
        loaded = true;
    }

}
