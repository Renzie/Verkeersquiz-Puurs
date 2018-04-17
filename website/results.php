<?php
include('session.php');

require_once "head.html";

?>


<h1>Dashboard [Work in progress]</h1>

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
</div>

<!--<canvas id="students" width="400px" height="400px"></canvas>-->

<h3>Alle resultaten</h3>
<table class="striped">
  <thead>
  <tr>
    <th>Naam</th>
      <th>Organisatie</th>
    <th>Departement</th>
    <th>Score</th>
    <tr>
  </thead>
  <tbody id="all-results">

  </tbody>

</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/js/statistics.js"></script>

<?php

require_once "tail.html";

?>
