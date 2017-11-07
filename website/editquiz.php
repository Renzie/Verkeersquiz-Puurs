<?php
require_once "head.html";

?>

<div id="editquiz">
    <table class="highlight">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Aantal gemakkelijke vragen</th>
            <th>Aantal gemiddelde vragen</th>
            <th>Aantal moeilijke vragen</th>

        </tr>
        </thead>

        <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>$0.87</td>
            <td><a class="btn"><i class="material-icons">edit</i> </a> </td>
        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td>$0.87</td>
            <td><a class="btn"><i class="material-icons">edit</i> </a> </td>
        </tr>
        <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
            <td>$0.87</td>
            <td><a class="btn"><i class="material-icons">edit</i> </a> </td> <!-- TODO -->
        </tr>
        </tbody>
    </table>
</div>

<?php

require_once "tail.html";

?>