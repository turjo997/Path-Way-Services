<!DOCTYPE html>

<html lang="en">
     <head>
	 
	        <title>admin</title>
	        <link rel = "shortcut icon" type="image" href="images/bookLogo.png"/>	
			
         
          <link rel = "stylesheet" href="profile.css"/>	
        	
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

  
                     <?php
                     session_start();
                     
                       if(!isset($_SESSION['aloggedin'])){

                          echo'
                          
                         <nav class="navbar navbar-expand-md">
                            <li class="nav-item active">
                            <a class="nav-link text-center text-md-left" href="login.php">Login</a>
                            </li>
                     
                          </nav> ';
                           
                       }else{
                        
 
                         echo'
                         <div class="btn">
                         <span class="fas fa-bars"></span>
                        </div>
                      <nav class="sidebar">
                         <div class="text">
                            Side Menu
                         </div>
                         <ul>
                            <li class="active"><a href="#">Dashboard</a></li>
                            <li>
                               <a href="#" class="feat-btn">Manage Route
                               <span class="fas fa-caret-down first"></span>
                               </a>
                               <ul class="feat-show">
                                  <li><a href="#">Add new Route</a></li>
                                  <li><a href="#">Edit Route</a></li>
                               </ul>
                            </li>
                            <li>
                               <a href="#" class="serv-btn">Manage Bus
                               <span class="fas fa-caret-down second"></span>
                               </a>
                               <ul class="serv-show">
                                  <li><a href="#">Add new bus schedule</a></li>
                                  <li><a href="#">View bus schedule</a></li>
                                  <li><a href="#">Booking</a></li>
                               </ul>
                            </li>
                            <li><a href="#">Bus Ticket Info</a></li>
                            <li><a href="#">Pending Tickets</a></li>
                            
                           <li><a href="logout.php">Logout</a></li>
                         </ul>
                      </nav>
                      <div class="content">
                         <div class="header">
                            Welcome to the admin panel arena!
                         </div>
                         <p>
                            Path-Way E-Tieketing Services
                         </p>
                      </div> ';
                         
  
                    

                       }

        
                     ?>
                           





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		
	 </body>



</html> 
