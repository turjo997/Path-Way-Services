<?php
    //require_once 'header.php';
    //require_once 'checklogin.php';
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

   
	 </head>
	
	 <body>

<div class="container">

<div class="div1 bg-success p-4 p-lg-3 m-2 m-lg-4">
    <h3 class="text-black text-center">Welcome to the Admin Panel Arena !</h3>           
</div>


<section>
<div class="row">
                                      
    <div class="col-lg-3 d-block d-lg-flex">
                     
       <div class="card  width: 18rem  text-center">
                                                  
         <img class = 'card-img-top' src="images/bus.jpg" alt="card-image"height="200">
                     
           <div class="card-body">
                     
                <h4 class="card-title">Total Bus</h4>
                <a style = "width:100%" class= "btn btn-primary card-link stretched-link" target="_blank" href="registeredUsers.php">View Total Bus</a>
          </div>
                                                    
                                             
      </div>
                     
   </div>
   <div class="col-lg-3 d-block d-lg-flex">
                     
      <div class="card  width: 18rem text-center">
                                                                
           <img  class = 'card-img-top' src="images/seat.jpg" alt="card-image"height="200">
                                   
               <div class="card-body">
                                   
                   <h4 class="card-title">Total Seats</h4>
                    <a style = "width:100%" class= "btn btn-primary card-link stretched-link" target="_blank" href="manageBooks.php">View Total Seats</a>
               </div>
                                                                                                                    
      </div>
   </div>

   <div class="col-lg-3 d-block d-lg-flex">
                     
      <div class="card  width: 18rem text-center">
                                                                               
          <img style="width: 270px" class = 'card-img-top' src="images/sold.png" alt="card-image" height="200" >
                                                  
               <div class="card-body">
                                                  
                   <h4 class="card-title">Total Sold</h4>
                   <a style = "width:100%" class= "btn btn-primary card-link stretched-link" target="_blank" href="orders.php">View Total Sold</a>
              </div>
                                                                                                                                   
        </div>
           
      </div>

      <div class="col-lg-3 d-block d-lg-flex">
                     
                     <div class="card  width: 18rem text-center">
                                                                                              
                         <img style="width: 330px" class = 'card-img-top' src="images/pending1.jpg" alt="card-image" height="200" >
                                                                 
                              <div class="card-body">
                                                                 
                                  <h4 class="card-title">Total Pending</h4>
                                  <a style = "width:100%" class= "btn btn-primary card-link stretched-link" target="_blank" href="orders.php">View Total Pending</a>
                             </div>
                                                                                                                                                  
                       </div>
                          
                     </div>

   </div>
   </section>

                           
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		
	 </body>



</html> 