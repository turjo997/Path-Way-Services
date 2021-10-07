
<?php
require_once "header.php";
$id="";
$name1="";
$results="";
$results1="";

if (isset($_GET['reserve'])) {
 $id = $_GET['reserve'];
}

if($id > 0){
    
    $db = mysqli_connect('localhost', 'root', '', 'path-way services');
    $results = mysqli_query($db, "SELECT * FROM bus_sch where id = '$id'");
    $results1 = mysqli_query($db, "SELECT * FROM seat_info where bus_id = '$id'");
    
}else{
    $data = "";
    $data= $_SESSION['bus_id'];
    
    // echo $data;
    
    $db = mysqli_connect('localhost', 'root', '', 'path-way services');
    $results = mysqli_query($db, "SELECT * FROM bus_sch where id = '$data'");
    
    $results1 = mysqli_query($db, "SELECT * FROM seat_info where bus_id = '$data'");
 
}


?>

<div class="container">
 <div class="row">




   <div class="col-lg-2"></div>


            <div class="col-lg-10">
            <br><br><br>
   
     
   
   
        <table class="table table-striped table-bordered table-hover table-dark text-center">
     <thead>
       <tr>
               <th>BusId</th>
               <th>Route</th>
               <th>Total seat</th>
               <th>Date</th>
               <th>Time</th>
           
       </tr>
     </thead>
     
     <?php while ($row = mysqli_fetch_array($results)) { ?>
       <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['route']; ?></td>
               <td><?php echo $row['seat']; ?></td>
               <td><?php echo $row['date']; ?></td>
               <td><?php echo $row['time']; ?></td>
               
       
       </tr>
     <?php } ?>
   </table>
   
   
   
        </div>
   
   
     </div>
   </div>
   

   <br><br><br>
   
   <div class="title text-center mb-3">
         <h3 class="font-weight-bolder">Available Seats For Your Selected Bus</h3>     
   </div>
   
   
   <div class="container">
   
   <div class="row">
      <div class="col-lg-2"></div>
   
   
      <div class="col-lg-10">
      <table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>BusId</th>
      <th>seat</th>
      <th>Sold Seat</th>
      <th>Available Seat</th>
      <th colspan="4">Action</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results1)) { ?>
    <tr>
            <td><?php echo $row['bus_id']; ?></td>
            <td><?php echo $row['seat_name']; ?></td>
            <td><?php echo $row['sold_seat']; ?></td>
            <td><?php echo $row['available_seat']; ?></td>
            <td>
          
			    	<a href="server.php?book=<?php      

            //session_start();
           $_SESSION['busid'] = $row['bus_id'];
           
            //echo $row['seat_name'];
            echo $row['id'];?>" class="edit_btn" >Book seat</a>
    
			</td>
		
            
    </tr>
  <?php }?>
</table>

     

      </div>
   

      
      
    
   </div>         
   

   
</div>






<?php

require_once "footer.php";

?>