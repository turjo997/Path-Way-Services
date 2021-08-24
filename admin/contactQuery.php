<?php
   require_once '../config.php';
   
   $results = mysqli_query($link, "SELECT * FROM contact");
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

   

<div class="col-lg-1"></div>


<div class="col-lg-11">
<br><br><br>

<div class="title text-center mb-3">
      <h3 class="font-weight-bolder">Contact Queries / Feedback's</h3>
    
    </div>


<table class="table table-striped table-bordered table-hover table-dark text-center">
<thead>
<tr>
   <th>Full Name</th>
   <th>Email</th>
  
   <th>Subject</th>
   <th>Message</th>

</tr>
</thead>

<?php while ($row = mysqli_fetch_array($results)) { ?>
<tr>
   <td><?php echo $row['fullname']; ?></td>
   <td><?php echo $row['email']; ?></td>
   <td><?php echo $row['subject']; ?></td>
   <td><?php echo $row['message']; ?></td>


</tr>
<?php } ?>
</table>



</div>


</div>
    

</div>


</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		
	 </body>



</html> 
<br><br><br><br><br><br>

<?php
   require_once 'footer.php';
?>