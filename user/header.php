<!DOCTYPE html>

<html lang="en">
     <head>
	 
	        <title>user panel</title>
	        <link rel = "shortcut icon" type="image" href="images/logo1.png"/>	
			
			<link rel = "stylesheet" href="style.css"/>	
     
      <link rel="stylesheet" href="footerstyle.css">

            
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

		
	 </head>
	 
	  </head>
	 
	 <body>


                     <?php
                     session_start();
                     
                       if(!isset($_SESSION['aloggedin'])){

                          echo'                  
                          <div class="container-fluid">
                          
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
                        </div> 
                        '
                        
                         
                         ;
                           
                       }else{

                        echo'
                        <div class="container-fluid">
                          
                        <nav class="navbar navbar-expand-lg navbar-light bg-light py-5">

                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                          <ul class="navbar-nav">
                         
                         
                            <li class="nav-item">
                           <a class="nav-link" href="contact.php"><b>Contact</b></a>
                            </li>
                           
                            <li class="nav-item">
                              <a class="nav-link" href="aboutus.php"><b>About Us</b></a>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="notification.php"><i class="fas fa-bell"></i></i>  <b>Notification</a>
                              <a class="dropdown-item" href="myprofile.php"><i class="fas fa-user"></i>  <b>My Profile</a>
                              <a class="dropdown-item" href="changepass.php"><i class="fas fa-key"></i>  <b>Change Password</a>
                             
                              <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>  <b>Logout</a>
                            </div>
                          </li>
                          
                          </ul>
                        </div>
                       </nav>
                       </div> 

                       ';

                       }

        
                     ?>
                           

			




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		
