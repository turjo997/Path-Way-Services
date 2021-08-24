<?php


require_once '../config.php';
$name="";
$date ="";

$seat = $route =$date=$time=$status="";
$seat_err=$route_err  =$date_err=$time_err =$error ="";

if(isset($_POST['submit'])){

 if(empty($_POST['route'])){
   $route_err  = "Please enter the route" ; 
 }else{
   $route = check_input($_POST['route']);
}
       
if(empty($_POST['date'])){
$date_err  = "Please enter the date" ; 
}else{
$date = check_input($_POST['date']);
}
     

         
 if(empty($route_err) && empty($date_err)){
  
   $sql = "select * from bus_sch where date='$date' AND route = '$route'";
   $query = mysqli_query($link , $sql);
 
   $count = mysqli_num_rows($query);

   if($count > 0){
    session_start();   

    $_SESSION['route_name'] = $route;
    $_SESSION['date'] = $date;
    header('location: view.php');
   }
    else {
      
       $status = '<div class="alert alert-danger ">No record found</div>' ; 
    }
    mysqli_close($link);

 }

}


function check_input($data){
 $data =  trim($data);
 $data =  stripcslashes($data);
 $data =  htmlspecialchars($data);      
 return $data;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Path-Way Services</title>
  <link rel = "shortcut icon" type="image" href="images/logo1.png"/>	
  <link rel="stylesheet" type="text/css" href="editstyle.css">

       <!--font awsome-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>

<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:wght@100&family=Roboto:wght@100&display=swap" rel="stylesheet">
 <!---bootstrapt cdn--->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
       
           <style>


          header{
                  background: url("images/three-cover.jpg");
                  background-position: center;
                  background-attachment: fixed;
                  background-repeat: no-repeat;
                  background-size: cover;
            }

            .banner-container{
                height: 100vh;
                }
                .banner-container h1{
                font-size: 3.2rem;
                background-color: rgb((0,0,128));
                padding: 10px 20px;
             
                border-radius: 5px;
                }


           </style>
   
       <meta name="viewport" content="width = device-width , initial-scale = 1.0">
       <meta http-equiv="X-UA-compatible" >
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="footerstyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>


<body>




  
     <nav class="navbar navbar-expand-lg navbar-light bg-light py-5">
 
 <div class="collapse navbar-collapse" id="navbarNavDropdown">
   <ul class="navbar-nav">
  
   <li class="nav-item">
       <a class="nav-link" href="main.php"><b>Home</b></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="contact.php"><b>Contact</b></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="login.php"><b>Login</b></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="register.php"><b>Register</b></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="aboutus.php"><b>About Us</b></a>
     </li>
    
   </ul>
 </div>
</nav>


  

  <header>
     <div class="banner-container d-flex justify-content-center align-items-center">
      <div class="banner-contents text-center">

      <div class="row">
       <div class="col-lg-4">
       <h1 style="color:#a60692">Welcome to Path-Way E-Ticketing Services.</h1>
      
       </div>

       <div class="col-lg-6">
       <span class="text-danger"> <?php echo $status;?></span>
        <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   
   <h3 style="color: orange;">Check Buses</h3>
   <br>
   <?php  




        function showAllData(){
          $connection = mysqli_connect("localhost","root","","path-way services");
          $query = "SELECT route FROM bus_sch";
          $result = mysqli_query($connection, $query);

          if(!$result){
              die('Query Failed'.mysqli_connect_error());
          }
          while($row = mysqli_fetch_assoc($result)){
              $name = $row['route'];
              echo $name;
              echo "<option name='$name'>$name</option>";
          } 
        }
                      
                        
      ?>
      <select name="route"> <?php showAllData();?> </select> 
      <span class="text-danger"> <?php echo $route_err ;?></span>
      
   </div>
   <div class="form-group">

    <input type="date" name="date"  min="2015-01-01" max="2022-01-01"> 
    <span class="text-danger"> <?php echo $date_err ;?></span>
   
    </div>


    <div class="form-group">

       <input type="submit" name="submit" id ="submitbtn1" class="form-control btn-success" value="Check Now"> 
      </div>
 

    
      </form>
         
  

        </div>




      </div>
    
      </div>
      </div>
    
     </header>


   



		  
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<?php
   require_once 'footer.php';
?>