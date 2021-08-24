<?php
  //   require_once 'header.php';
     require_once 'contactController.php';
?>

<!DOCTYPE html>

<html lang="en">
     <head>
	 
	        <title>User</title>
          <link rel = "shortcut icon" type="image" href="images/logo1.png"/>	
			
			<link rel = "stylesheet" href="userStyle.css"/>	
            <link rel = "stylesheet" href="footerStyle.css"/>	

            
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


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       

	 </head>
   
	 
	 <body>

  
  <div class="container-fluid">

     <nav class="navbar navbar-expand-md">
                   
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     <span><i class="fas fa-bars navbar-icon"></i></span>
                   </button>

                   <a class="navbar-brand" href="main.php">
                         <img src="images/logo1.png" alt="logo">
                  
                   </a>


                   <div class="collapse navbar-collapse"  id="navbarNavDropdown">
                     <ul class="navbar-nav ml-auto">

                     </ul>
                   </div>
                 </nav>
                
    </div>       



    <div class="container">

<div class="row">

   <div class="col-sm-4">
   
   </div>

   <div class="col-sm-4">
     
   <br><br><br>

   <form  id = "form" method ="post" action="">
   <br>
   <span><?php echo $status;?></span>
        <div class="form-group">
        
        <i class="fa fa-user"></i> <label for="fullname">&nbsp;&nbsp; Full Name</label>
        <input type="text" id = "name" class="form-control" placeholder="Enter Your Full Name"  name="fullname" required>
        <span class="text-danger"> <?php echo $name_err ;?></span>
        </div>

        <div class="form-group">
        
        <i class="fa fa-envelope"></i><label for="email">&nbsp;&nbsp; Email</label>
        <input type="email" value=""  id ="email" class="form-control" placeholder="Enter Your Email"  name="email" required>
        <span class="text-danger"> <?php echo $mail_err ;?></span>
        </div>

        <div class="from-group">

        <i class="fas fa-envelope-open-text"></i><label for="subject">&nbsp;&nbsp;Subject</label>
        <input type="text" class="form-control" name="subject">
        <span class="text-danger"> <?php echo $sub_err ;?></span>


        </div>


      <div class="from-group">
          <br>

      <i class="fas fa-comments"></i><label for="message">&nbsp;&nbsp;Message</label>
        <textarea style = "resize: none;" name="message" class = "form-control" id="" cols="30" rows="6"></textarea>
        <span class="text-danger"> <?php echo $msg_err ;?></span>
        </div>

  
   <br><br>

   <div class="form-group">
   <input type="submit" style = "width:100%"  name="submit" class="form-control btn btn-success" value="Add Feedback"> 
   </div>


 </form>
   
   </div>

   <div class="col-sm-4"></div>
    

</div>


</div>


         <!--<script src="validation.js"></script>-->
      
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			

	 </body>



</html> 





<?php
     require_once 'footer.php';
?>