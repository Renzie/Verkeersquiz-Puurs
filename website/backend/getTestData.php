<?php
require_once('../mysql_connect.php');

$query = "SELECT School from school_info";

$response = @mysql_query($dbc, $query);

if($response){
  while($row = mysqli_fetch_array($response)){
    echo $row['School'] . "</br>";
  }
}


mysqli_close($dbc);

?>
