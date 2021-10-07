<?php 
	session_start();
	//$db = mysqli_connect('localhost', 'root', '', 'c');
    $db = mysqli_connect('localhost', 'root', '', 'path-way services');

	// initialize variables
	$name = "";
	$address = "";
	$id = "";
	$update = false;
    $status="";


    $route = "";


    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        //echo $id;
    }
    if (isset($_POST['update'])) {
   
        $route = $_POST['route'];
    
        mysqli_query($db, "UPDATE route SET name='$route' WHERE id=$id");
       
       $status = '<div class="alert alert-success ">Updated Successfully</div>'; 
       // header('location: updateroute.php');
    }



?>




<!DOCTYPE html>

<html lang="en">
     <head>
	 
	        <title>admin</title>
	        <link rel = "shortcut icon" type="image" href="images/logo1.png"/>	
			
            <link rel = "stylesheet" href="style.css"/>	   
        	   
     <!--font awsome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>

     <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:wght@100&family=Roboto:wght@100&display=swap" rel="stylesheet">
      <!---bootstrapt cdn--->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
			



				<style>
	
	            </style>
			   <meta charset = "UTF-8">
            <meta name="viewport" content="width = device-width , initial-scale = 1.0">
            <meta http-equiv="X-UA-compatible" >

            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		
	 </head>
	
	 <body>


<div class="container">

<div class="row">

   <div class="col-sm-4">
   
   </div>
 
   <div class="col-sm-4">
     <br><br>


     <div class="title text-center mb-3">
      <h3 class="font-weight-bolder">Update New Route</h3>

      <br><br>


     <span><?php echo $status;?></span>
    
    </div>

   <br><br><br>

   <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   <label for="route">&nbsp;&nbsp; Add a route</label>
   <input type="text" value=""id ="route" class="form-control" placeholder="Enter the route"  name="route" required>
   
 
 
   </div>


<div class="form-group">

<input type="submit" name="update" id ="submitbtn1" class="form-control btn-success" value="Update"> 
</div>

 </form>
   
   </div>

   <div class="col-sm-4"></div>
    

</div>


</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		
	 </body>



</html> 



<?php
   require_once 'footer.php';
?>
