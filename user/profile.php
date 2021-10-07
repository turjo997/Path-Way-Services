
<?php

require_once "header.php";

$data = "";

$data= $_SESSION['bus_id'];

// echo $data;

$db = mysqli_connect('localhost', 'root', '', 'path-way services');
$results = mysqli_query($db, "SELECT * FROM bus_sch where id = '$data'");


$count = mysqli_num_rows($results);

echo '$count';



if($count > 0){
  session_start();
  $_SESSION['bus_id'] = $data;
  header('location: profile1.php');
}else{
  header('location: profile2.php');
}

?>
