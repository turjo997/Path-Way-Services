<?php 
	session_start();

    $db = mysqli_connect('localhost', 'root', '', 'path-way services');

	
	$id = 0;
	
    $route = "";

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM route WHERE id=$id");
        $_SESSION['message'] = "Route deleted!"; 
        header('location: editroute.php');
    }
