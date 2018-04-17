$(document).ready(function () {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('.collapsible').collapsible({accordion:true,
                                    onClose: function(e) { $(e).find(".collapsible-header > i").text("keyboard_arrow_right");},
                                    onOpen: function(e) {  $(e).find(".collapsible-header > i").text("keyboard_arrow_down");}
                                });

    addHTMLToNav();
});




var loaded = false;

var addHTMLToNav= function(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var quizId = url.searchParams.get("id");
    var html = `<li><div class="divider"></div></li>
            <li><a href="editquestions.php?id=${quizId}"><i class="material-icons">label</i>Vragen</a></li>
            <li><a href="template.php?id=${quizId}"><i class="material-icons">format_list_numbered</i>Quiz Template</a></li>
            <li><a href="difficulty.php?id=${quizId}"><i class="material-icons">format_align_left</i>Moeilijkheidsgraad</a></li>
            <li><a href="category.php?id=${quizId}"><i class="material-icons">sort</i>Categorieën</a></li>
            <li><a href="results.php?id=${quizId}"><i class="material-icons">equalizer</i>Statistics</a></li>`;

    if(quizId != null && url.pathname != '/editorganisation.php' && !loaded) {
        $("#slide-out").append(html);
        loaded = true;
    }

    if(url.pathname == "/createquiz.php" && !loaded){
        html = '<li><div class="divider"></div></li><li><a href="print.php" target="_blank"><i class="material-icons">print</i>Print alle vragen</a></li>'
        $("#slide-out").append(html);
        loaded = true;

    }

}
