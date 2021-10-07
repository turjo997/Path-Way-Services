<?php

require_once "header.php";

      // session_start();
       $data1 = $_SESSION['route_name'];

       $data2 = $_SESSION['date'];


      // echo $data1;
      // echo $data2;

?>

<?php 

$db = mysqli_connect('localhost', 'root', '', 'path-way services');
$results = mysqli_query($db, "SELECT * FROM bus_sch where route = '$data1' and date='$data2'");

?>


  

<div class="container">
   <div class="row">

 


     <div class="col-lg-2"></div>
 
     <div class="col-lg-10">
         <br><br><br>

     <div class="title text-center mb-3">
      <h3 class="font-weight-bolder">Available Buses For You</h3>
     
    </div>
     


     <table class="table table-striped table-bordered table-hover table-dark text-center">
	<thead>
		<tr>
			      <th>BusId</th>
            <th>Route</th>
            <th>Total seat</th>
            <th>Date</th>
            <th>Time</th>
            <th>Sold seat</th>
            <th>Available seat</th>
         
			     <th colspan="4">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
            <td><?php echo $row['route']; ?></td>
            <td><?php echo $row['seat']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
			      <td><?php echo $row['sold_seat']; ?></td>
            <td><?php echo $row['available_seat']; ?></td>

            <td>
				<a href="profile1.php?reserve=<?php echo $row['id']; ?>" class="edit_btn" >reserve seat</a>
			</td>
		
		
		</tr>
	<?php } ?>
</table>



     </div>


   </div>


</div>






    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	
	
		<br><br><br><br><br>



<?php
   require_once 'footer.php';
?>