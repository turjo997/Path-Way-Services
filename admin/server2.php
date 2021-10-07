<?php
//require_once "header.php";
//session_start();

require_once '../config.php';
    //$db = mysqli_connect('localhost', 'root', '', 'path-way services');

	
	$id = 0;

    //$data= $_SESSION['busid'];
   // $data1 = $_SESSION['user_name'];

    
   //echo $data1;

   $name_error = $phn_error ="";
   $seatname = $bookid =  $bookseat = $seatcount  = $cnt_seat = "";

    if (isset($_GET['book'])) {
        $bookid = $_GET['book'];
    }


    //echo $bookid;

    $seat_cost = 0;
    $amount_error=$date_err=$type_error=$email_error = $pass_error = $conpass_error = $name_error = $phn_error = "";
    $type=$amount=$email = $pass = $confirmpass = $name= $phn = $status = "" ;
    $status1 = "pending";
 
    $bus_id = 0;
    
    if(isset($_POST['submit'])){
        $query = "SELECT * FROM seat_info where id = $bookid";
        $result = mysqli_query($link, $query);

        while($row = mysqli_fetch_assoc($result)){
            $bus_id = $row['bus_id']; 
        } 

     //   echo $bus_id;

        if(empty($_POST['fullname'])){
            $name_error  = "Please enter your fullname" ; 
          }else{
            $name= $_POST['fullname'];
            $name_pattern = '/^[a-zA-Z ]+$/';
              if(!preg_match($name_pattern ,  $name)){
                $name_error  = "Please enter valid naming" ; 
              }
          }
          if(empty($_POST['cell'])){
              $phn_error  = "Please enter your cell number" ; 
            }else{
              $phn= $_POST['cell'];
              $cell_pattern = '/^([01]|\+88)?\d{11}$/';
                if(!preg_match($cell_pattern ,  $phn)){
                  $phn_error  = "Please enter valid phone number" ; 
                }
            }

            if(empty($_POST['date'])){
                $date_err  = "Please enter the date" ; 
              }else{
                $date = check_input($_POST['date']);
              }

              if(empty($_POST['amount'])){
                $amount_error  = "Please enter the amount" ; 
              }else{
                $amount = check_input($_POST['amount']);
              }

              if(empty($_POST['type'])){
                $type_error  = "Please enter the type" ; 
              }else{
                $type = $_POST['type'];
             }


    
       
       if(empty($name_error) && empty($phn_error)&&empty($date_err)&&empty($amount_errorr)&&empty($type_error)){

        $sql = "DELETE FROM seat_info WHERE id='$bookid'";

        mysqli_query($link, $sql);

        $seatquery = "select * from seat_info where bus_id = '$bus_id'";
        $query7 = mysqli_query($link , $seatquery);
        $seatcount = mysqli_num_rows($query7); // 9
        $query = "SELECT * FROM bus_sch where id = $bus_id";
        $result = mysqli_query($link, $query);
     
        while($row = mysqli_fetch_assoc($result)){
            $cnt_seat = $row['seat'];
        } 

        //echo $seatcount." ".$cnt_seat;
    
        $sold = $cnt_seat - $seatcount ; 
        $avail = $cnt_seat - $sold;
       // $sold = 0; 
   
        mysqli_query($link, "update seat_info set sold_seat = '$sold' where bus_id = '$bus_id'");
        mysqli_query($link, "update seat_info set available_seat = '$avail' where bus_id = '$bus_id'");
        mysqli_query($link, "update bus_sch set sold_seat = '$sold' where id = '$bus_id'");
        mysqli_query($link, "update bus_sch set available_seat='$avail' where id = '$bus_id'");
   
    
        
     $sql = "INSERT INTO  transaction(user_name , tran_date , tran_id , card_type , amount) values('$name','$date','$phn','$type','$amount')";
       
            // echo $name.''.$date.''.''.$phn.''.''.$type.''.''.$amount.''.$phn;
            if (!$link) {
             die("Connection failed: " . mysqli_connect_error());
             }
     
             if (mysqli_query($link, $sql)) {

               $status = '<div class="alert alert-success">Your ticket is confirmed successfully.</div>';

               ?>
               <script type='text/javascript'>
              // window.onload = function(){
              // document.getElementById("submitbtn").style.display = "none";
                 
             //  }
                 
               </script>

             <?php    

             } else {
              
               $status = '<div class="alert alert-danger ">Failed Attempt !</div>' ; 
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
	 
	        <title>admin</title>
	        <link rel = "shortcut icon" type="image" href="images/logo1.png"/>	
			
            <link rel = "stylesheet" href="style.css"/>	   
            <link rel="stylesheet" type="text/css" href="editstyle.css">
        	   
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

   <div class="col-sm-2">
   
   </div>

   <div class="col-sm-8">

   <span class="text-danger"> <?php echo $status;?></span>
    

     <br><br><br>

<form  id = "form" method ="post" action="">

            <div class="form-group">
            
            <i class="fa fa-user"></i> <label for="fullname">&nbsp;&nbsp; Full Name</label>
            <input type="text" id = "name" class="form-control" placeholder="Enter Your Full Name"  name="fullname" required>
            <!--<span id="fullname-nm"> </span>-->
            <span class="text-danger"> <?php echo $name_error;?></span>
          
            </div>


            <div class="form-group">
            <i class="far fa-calendar-alt"></i> <label for="date">&nbsp;&nbsp; Date</label>
            <input type="date" size="30"  name="date" class="form-control btn-success" min="2015-01-01" max="2022-01-01"> 
            <span class="text-danger"> <?php echo $date_err ;?></span>
            </div>



            <div class="form-group">
            
            <i class="fas fa-mobile-alt"></i><label for="cell">&nbsp;&nbsp; Transaction No: </label>
            <input type="text" id="cell" class="form-control" placeholder="Enter Your Transaction Number"  name="cell">
            <!--<span id="cell-cl"></span>-->
            <span class="text-danger"> <?php echo $phn_error;?></span>

            </div>

            <div class="from-group">

            <label for="category">Transaction Type</label>
            <br>
            <select name="type">

            <option value="Category">Select Transaction Type</option>
            <option value="handon">Hand On Delivery</option>
      
            </select>
            <!-- <input type="text" class="form-control" name="category">-->
            <span class="text-danger"> <?php echo $type_error;?></span>


           </div>
           <br><br>

            <div class="form-group">
            
            <i class="fas fa-money-bill"></i><label for="">&nbsp;&nbsp; Amount: </label>
            <input type="text" id="" class="form-control" placeholder="Enter the ammount"  name="amount">
            <!--<span id="cell-cl"></span>-->
            <span class="text-danger"> <?php echo $amount_error;?></span>

            </div>

            <div class="form-group">
            <input type="submit" style = "width:50%"  name="submit" id ="submitbtn" class="form-control btn btn-success" value="Confirm Ticket"> 
            </div>

 </form>

 <div >


</div>



   </div>

</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
	
<?php

require_once "footer.php";

?>