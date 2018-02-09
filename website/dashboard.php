<?php

session_start();

if (!$_SESSION['login']) {
    header("location:logout.php");
    //die;
}

require_once "head.html";


?>


<h1>Dashboard</h1>
<!--
<div class="row">
    <div class="col s3">
        <label for="organisation" >Organisaties</label>
        <select name="filter" id="organisation">
            <option value="" disabled selected>Filter op school</option>
        </select>
    </div>

    <div class="col s3">
        <label for="department" >Departementen</label>
        <select name="filter" id="department">
            <option value="" disabled selected>Filter op klas</option>
        </select>
    </div>

    <div class="col s3">
        <label for="user">Studenten</label>
        <select name="filter" id="user">
            <option value="" disabled selected>Filter op student</option>
        </select>
    </div>
</div>-->

<!--<canvas id="students" width="400px" height="400px"></canvas>-->

<h3>Alle resultaten</h3>
<table class="striped">
  <thead>
  <tr>
    <th>Naam</th>
    <th>Quiz</th>
    <th>score</th>
    <tr>
  </thead>
  <tbody id="resultstable">
    <tr>
      <td>Maxime Mylle</td><td>Howest Quiz</td><td>8/10</td>
    </tr>
    <tr>
      <td>Arthur Saprunov</td><td>Howest Quiz</td><td>9/10</td>
    </tr>
    <tr>
      <td>Renzie omana</td><td>Howest Quiz</td><td>7/10</td>
    </tr>
    <tr>
      <td>user1 bbbb</td><td>Howest Quiz</td><td>3/10</td>
    </tr>
    <tr>
      <td>ahmed aaa</td><td>Howest Quiz</td><td>2/10</td>
    </tr>
    <tr>
      <td>shabala ddd</td><td>Howest Quiz</td><td>5/10</td>
    </tr>
    <tr>
      <td>rachid ttt</td><td>Howest Quiz</td><td>10/10</td>
    </tr>
  </tbody>

</table>
<br>
<h3>Top resultaten</h3>

<table class="striped">
  <thead>
  <tr>
    <th>Naam</th>
    <th>Quiz</th>
    <th>score</th>
    <tr>
  </thead>
  <tbody id="resultstable">
    <tr>
      <td>rachid ttt</td><td>Howest Quiz</td><td>10/10</td>
    </tr>
    <tr>
      <td>Arthur Saprunov</td><td>Howest Quiz</td><td>9/10</td>
    </tr>
    <tr>
      <td>Maxime Mylle</td><td>Howest Quiz</td><td>8/10</td>
    </tr>
  </tbody>

</table>
<br>
<h3>Andere resultaten</h3>
<h5>Gemiddelde tijd voor het oplossen van een vraag: 4 seconden</h5>
<br>
<h5>Meest juist beantwoorde vraag: "Heb je voorang hier?" (questionid:35)</h5>
<br>
<h5>Meest fout beantwoorde vraag: "Wat moet ik doen bij dit verkeersbord" (questionid:15)</h5>
<br>





<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    // var ctx = document.getElementById("myChart").getContext('2d');
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255,99,132,1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/statistics.js"></script>

<?php

require_once "tail.html";

?>
