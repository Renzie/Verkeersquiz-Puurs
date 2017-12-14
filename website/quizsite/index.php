<?php
/**
 * Created by PhpStorm.
 * User: Renzie
 * Date: 7/12/2017
 * Time: 15:08
 */
session_start();
require_once "../includes/Database.class.php";
require_once "../includes/UserTools.class.php";
require_once "../includes/View.class.php";
$usertools = new UserTools();
$view = new View();


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/materialize/css/materialize.css" rel="stylesheet" media="screen,projection"/>
        <link href="assets/css/screen.css" rel="stylesheet">

        <script src="assets/js/jquery-3.2.1.js"></script>
        <script src="assets/materialize/js/materialize.js"></script>

        <script src="assets/js/index.js"></script>
    </head>
    <body>


    <nav class="">
        <div class="nav-wrapper row">
            <a class=" center brand-logo">Verkeersquiz Puurs</a>
            <div class="right col offset-10">
                <a class="btn purple">Naar administratie</a>
            </div>
        </div>


    </nav>


    <main class="container login">


        <div class="container">


            <div class="row">
                <div class="card col s6 offset-s3 ">
                    <div class="card-content">

                        <form class="input-field">


                            <p class="input-field">

                                <input type="text" id="firstname" name="firstname">
                                <label for="firstname">Voornaam</label>
                            </p>

                            <p class="input-field">
                                <input type="text" id="familyname" name="familyname">
                                <label for="familyname">Familienaam</label>
                            </p>


                            <div class="input-field center">
                                <p class="input-field">
                                    <select name="organisatie" onchange="getDepartments()" id="organization">
                                        <option value="" disabled>Selecteer je organisatie</option>
                                        <?php
                                        $view->listOrganization();

                                        ?>

                                    </select>
                                    <label>School</label>
                                </p>


                                <p class="input-field">
                                    <select name="department" id="department">
                                        <option value="" disabled selected>Selecteer je klas</option>
                                    </select>
                                    <label>Klas</label>
                                </p>
                                <p class="input-field">

                                    <select name="quiz">
                                        <option value="" disabled selected>Kies quiz</option>
                                        <option value="">3f</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                    <label>Quiz</label>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="card-action">
                        <input class="btn pulse purple" type="submit" value="Speel Quiz!">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        var departments = [
                <?php foreach ($usertools->getAllDepartments() as $data)
                {
                ?>
            {
                id : <?php echo $data["id"]; ?>,
                name: "<?php echo $data["name"]; ?>",
                organizationid: <?php echo $data["organizationId"]; ?>
            },


            <?php

            }?>
        ];

        console.log(departments);

        function getDepartments() {
            var dep = document.getElementById("department");
            var org = document.getElementById("organization");
            var selected = org.options[org.selectedIndex].value;
            var html = "";
            $(departments).each(function (data) {
                if (departments[data].organizationid == selected){
                    html += "<option value=" +  departments[data].id + ">" + departments[data].name + "</option>"
                }

                console.log(dep)
            });
            $(dep).append(html);
            $(dep).material_select('update');
        }
    </script>
    </body>
    </html>

<?php

if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
    //echo "login attempt";

    $check = $usertools->registerUser($_POST["firstname"], $_POST["familyname"], $_POST["department"]);
    if ($check) {
        //echo "succesfull";
        $_SESSION['login'] = true;
        header("location:game.php");
        //$_SESSION['questions'] = $usertools->getRandomQuestionsByQuizId($_POST['quiz']); //todo test out

        //$_SESSION['user'] =


    } else {
        //echo "failed";
        $_SESSION['login'] = false;
        echo '<script>Materialize.toast("Login gefaald!",1155);</script>';
        //echo "<script>alert('login gefaald')</script>";
        //die;
    }


}
?>