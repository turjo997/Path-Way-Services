<?php
   require_once '../config.php';
   
   $cnt_seat=$busid=$seat = $route =$date=$time=$status="";
   $seat_err=$busid_err  =$date_err=$time_err =$error ="";
   
   if(isset($_POST['submit'])){

    if(empty($_POST['busid'])){
      $busid_err  = "Please enter the bus id" ; 
    }else{
      $busid = check_input($_POST['busid']);
   }
     $sql = "SELECT * FROM seat_info where bus_id = $busid";
      $result = mysqli_query($link , $sql);
      $total_seat = mysqli_num_rows($result);
   
   
      $query5 = "SELECT * FROM bus_sch where id = $busid";
      $result5 = mysqli_query($link, $query5);
   
      while($row = mysqli_fetch_assoc($result5)){
          $cnt_seat = $row['seat'];
      } 
      if($total_seat == $cnt_seat){
       $error= "All seats are filed";
      }
   //echo $cnt_seat;

   if(empty($_POST['seat'])){
    $seat_err  = "Please enter the no of the seats" ; 
  }else{
    $seat = check_input($_POST['seat']);


    $seatquery = "select * from seat_info where seat_name ='$seat'";
    $query = mysqli_query($link , $seatquery);
  
    $seatcount = mysqli_num_rows($query);
    if($seatcount > 0 ){
      $seat_err = "This Seat is already exist. Try Another !!";
    }
 }
            
    if(empty($busid_err) && empty($seat_err) && empty($error)){
     
      $sql = "INSERT INTO  seat_info (bus_id,seat_name,available_seat) values('$busid','$seat','$cnt_seat')";
       
       if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($link, $sql)) {
        
          $status = '<div class="alert alert-success ">Successfully Added Seat</div>';
        } else {
         
          $status = '<div class="alert alert-danger ">Failed to Added</div>' ; 
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
   //require_once 'header.php';
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
      <h3 class="font-weight-bolder">Add New Seat</h3>
     <span class="text-danger"> <?php echo $status;?></span>
     <span class="text-danger"> <?php echo $error ;?></span>
    </div>

   <br><br><br>

   <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   <label for="route">&nbsp;&nbsp; Select Bus Id</label>
   <br>
   <?php  


        function showAllData(){
          $connection = mysqli_connect("localhost","root","","path-way services");
          $query = "SELECT id FROM bus_sch";
          $result = mysqli_query($connection, $query);

          if(!$result){
              die('Query Failed'.mysqli_connect_error());
          }
          while($row = mysqli_fetch_assoc($result)){
              $id = $row['id'];
              echo $id;
              echo "<option name='$id'>$id</option>";
          } 
        }
                      
                        
      ?>
      <select style = "font-size:25px" name="busid"> <?php showAllData();?> </select>
   
   <!--<span id="email-e"> </span>
   
   <input type="text" value=""  id ="route" class="form-control" placeholder="Enter the route"  name="route" required>
                            -->
   <span class="text-danger"> <?php echo $busid_err ;?></span>
 
   </div>

   <div class="form-group">
   
   <label for="seat">&nbsp;&nbsp; Seat Name</label>
   <input type="text" value=""  id ="seat" class="form-control" placeholder="Enter seat name"  name="seat" required>
   <!--<span id="email-e"> </span>-->
   <span class="text-danger"> <?php echo $seat_err ;?></span>
 
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