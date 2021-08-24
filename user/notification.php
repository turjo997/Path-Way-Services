<?php
 require_once "header.php";

 require_once '../config.php';

 $data1 = $_SESSION['user_name'];
   
   $results = mysqli_query($link, "SELECT * FROM pending where user_name = '$data1' and status ='approved'");
   $results1 = mysqli_query($link, "SELECT * FROM pending where user_name = '$data1' and status ='pending'");
?>


<div class="container">
   
   <div class="row">

   
      <div class="col-lg-2">

     
      </div>
      
      
      <div class="col-lg-10">

      <h1 class="font-weight-bolder">Pending Tickets</h1>
      <table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>User Name</th>
      <th>Full Name</th>
      <th>Seat Name</th>
      <th>Seat Cost</th>
      <th>Transaction No</th>
      <th>Status</th>
      
      
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results1)) { ?>
    <tr>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['seat_name']; ?></td>
            <td><?php echo $row['seat_cost']; ?></td>
            <td><?php echo $row['transaction_no']; ?></td>
            <td><?php echo $row['status']; ?></td>             
    </tr>
  <?php }?>
</table>


<h1 class="font-weight-bolder">Approved Tickets</h1>
<table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>User Name</th>
      <th>Full Name</th>
      <th>Seat Name</th>
      <th>Seat Cost</th>
      <th>Transaction No</th>
      <th>Status</th>
      <th colspan="3">Action</th>
      
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['seat_name']; ?></td>
            <td><?php echo $row['seat_cost']; ?></td>
            <td><?php echo $row['transaction_no']; ?></td>
            <td><?php echo $row['status']; ?></td>

          
         
            <td> <a href="checkout.php?id=<?php 
            
            //session_start();
            //$_SESSION['id'] = $row['id'];
            //header('location : success.php');
            
            echo $row['id'];?>" class="edit_btn">Check Out</a></td>&nbsp;    
    </tr>
  <?php }?>
</table>


     

      </div>
   

      
      
    
   </div>         
   

   
</div>

<?php
 require_once "footer.php";
?>