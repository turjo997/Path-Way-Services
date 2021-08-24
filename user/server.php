<?php
require_once "header.php";
//session_start();

    $db = mysqli_connect('localhost', 'root', '', 'path-way services');

	
	$id = 0;

    $data= $_SESSION['busid'];
    $data1 = $_SESSION['user_name'];

    
   //echo $data1;

   $name_error = $phn_error ="";
   $seatname = $bookid =  $bookseat = $seatcount  = $cnt_seat = "";

    if (isset($_GET['book'])) {
        $bookid = $_GET['book'];
    }

    $seat_cost = 0;
    $email_error = $pass_error = $conpass_error = $name_error = $phn_error = "";
    $email = $pass = $confirmpass = $name= $phn = $status = "" ;
    $status1 = "pending";
 
    if(isset($_POST['submit'])){
        $seatname = "";
    $query = "SELECT * FROM seat_info where id = $bookid";
    $result = mysqli_query($db, $query);
 
    while($row = mysqli_fetch_assoc($result)){
        $seatname = $row['seat_name'];
    } 

     if(empty($_POST['fullname'])){
       $name_error  = "Please enter your fullname" ; 
     }else{
       $name= $_POST['fullname'];
       $name_pattern = '/^[a-zA-Z ]+$/';
         if(!preg_match($name_pattern ,  $name)){
           $name_error  = "Please enter valid naming" ; 
         }
     }
         $phn= $_POST['cell'];
         $cell_pattern = '/^([01]|\+88)?\d{11}$/';
           if(!preg_match($cell_pattern ,  $phn)){
             $phn_error  = "Please enter valid phone number" ; 
           }
       
       if(empty($name_error) && empty($phn_error)){

        $sql = "DELETE FROM seat_info WHERE id='$bookid'";

        mysqli_query($db, $sql);

        $seatquery = "select * from seat_info where bus_id = '$data'";
        $query7 = mysqli_query($db , $seatquery);
        $seatcount = mysqli_num_rows($query7); // 9
        $query = "SELECT * FROM bus_sch where id = $data";
        $result = mysqli_query($db, $query);
     
        while($row = mysqli_fetch_assoc($result)){
            $cnt_seat = $row['seat'];
            $seat_cost = $row['seat_cost'];
        } 
    
        $sold = $cnt_seat - $seatcount ; 
        $avail = $cnt_seat - $sold;
       // $sold = 0; 
   
        mysqli_query($db, "update seat_info set sold_seat = '$sold' where bus_id = '$data'");
        mysqli_query($db, "update seat_info set available_seat = '$avail' where bus_id = '$data'");
        mysqli_query($db, "update bus_sch set sold_seat = '$sold' where id = '$data'");
        mysqli_query($db, "update bus_sch set available_seat='$avail' where id = '$data'");
   
    
        
            $sql = "INSERT INTO  pending (bus_id,user_name , fullname , seat_name , seat_cost , transaction_no,status) values('$data','$data1','$name','$seatname','$seat_cost','$phn','$status1')";
       

/*
            $query = "SELECT * FROM bus_sch where id = $data";
            $result = mysqli_query($db, $query);
         
            while($row = mysqli_fetch_assoc($result)){
                $cnt_seat = $row['seat'];
            } 
*/





            if (!$db) {
             die("Connection failed: " . mysqli_connect_error());
             }
     
             if (mysqli_query($db, $sql)) {


            



             
               $status = '<div class="alert alert-success">Your confirmation is now in pending process.You will have a 
               
                notification within a while.</div>';

               ?>
               <script type='text/javascript'>
               window.onload = function(){
               document.getElementById("submitbtn").style.display = "none";
               document.getElementById("cancel").style.display = "none";
              
                  
               }
                 
               </script>


      
                           
            
                                    
             <?php    

             } else {
              
               $status = '<div class="alert alert-danger ">Failed Attempt !</div>' ; 
            }
            mysqli_close($db);
     }

   
 
     }
    
   

   

 
   function check_input($data){
     $data =  trim($data);
     $data =  stripcslashes($data);
     $data =  htmlspecialchars($data);      
     return $data;
 
    }
  
?>

 
<div class="container">

<div class="row">

   <div class="col-sm-4">
   
   </div>

   <div class="col-sm-4">

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
            
            <i class="fas fa-mobile-alt"></i><label for="cell">&nbsp;&nbsp; Transaction No: </label>
            <input type="text" id="cell" class="form-control" placeholder="Enter Your Transaction Number"  name="cell">
            <!--<span id="cell-cl"></span>-->
            <span class="text-danger"> <?php echo $phn_error;?></span>

     </div>

   <div class="form-group">
   <input type="submit" style = "width:50%"  name="submit" id ="submitbtn" class="form-control btn btn-success" value="Confirm Ticket"> 
   </div>

 </form>

 <div >

<a id= "cancel" href="profile1.php" class="text-success" style="font-size: 30px;">Cancel Ticket</a>
</div>



   </div>

</div>
</div>
<?php

require_once "footer.php";

?>