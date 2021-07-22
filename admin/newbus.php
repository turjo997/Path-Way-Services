<?php
   require_once '../config.php';
   
   $seat = $route ="";
   $seat_err=$route_err  = $error ="";
   
   if(isset($_POST['submit'])){
     
      if(empty($_POST['username'])){
        $username_err  = "Please Enter Username" ; 
      }else{
        $username = check_input($_POST['username']);
      }

      if(empty($_POST['password'])){
        $password_err  = "Please Enter Password" ; 
      }else{
        $password= check_input($_POST['password']);
      }

      if(empty($username_err) && empty($password_err)){
           
        $sql = "SELECT * FROM admin where email = '$username' and  password = '$password'";

        $result = mysqli_query($link , $sql);

        if(mysqli_num_rows($result)>0){

           session_start();
            $_SESSION['aloggedin'] = true;
            header('location: profile.php');
        }
        else{

          $error = "Invalid login credentials";
        }

      }

   }


   function check_input($data){

    $data =  trim($data);
    $data =  stripcslashes($data);
    $data =  htmlspecialchars($data);    

    return $data;


   }


   //require_once 'header.php';
?>




<!DOCTYPE html>

<html lang="en">
     <head>
	 
	        <title>admin</title>
	        <link rel = "shortcut icon" type="image" href="images/bookLogo.png"/>	
			
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
      <h3 class="font-weight-bolder">Add New Bus</h3>
     <span class="text-danger"> <?php echo $error;?></span>
    </div>

   <br><br><br>

   <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   <label for="route">&nbsp;&nbsp; Select Route</label>
   <input type="text" value=""  id ="route" class="form-control" placeholder="Enter the route"  name="route" required>
   <!--<span id="email-e"> </span>-->
   <span class="text-danger"> <?php echo $route_err ;?></span>
 
   </div>

   <div class="form-group">
   
   <label for="seat">&nbsp;&nbsp; Total number of seat</label>
   <input type="text" value=""  id ="seat" class="form-control" placeholder="Enter total seat"  name="seat" required>
   <!--<span id="email-e"> </span>-->
   <span class="text-danger"> <?php echo $seat_err ;?></span>
 
   </div>



<div class="form-group">
<label for="date">&nbsp;&nbsp; Date</label>
<input type="date" size="30"  class="form-control btn-success" min="2015-01-01" max="2022-01-01"> 
</div>


<div class="form-group">

<label for="time">&nbsp;&nbsp; Time</label>

<input type="time" size="30"  class="form-control btn-success"> 
</div>


<div class="form-group">

<input type="submit" name="submit" id ="submitbtn1" class="form-control btn-success" value="Add"> 
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