<?php

require_once "header1.php";

       session_start();
       $data1 = $_SESSION['route_name'];

       $data2 = $_SESSION['date'];


      // echo $data1;
      // echo $data2;


$db = mysqli_connect('localhost', 'root', '', 'path-way services');

$sql = "SELECT * FROM bus_sch where route = '$data1' AND date='$data2'";
$results = mysqli_query($db, $sql);

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
				<a href="login.php?login=<?php echo $row['id']; ?>" class="edit_btn" >Login to reserve seats</a>
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

	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		<br><br><br><br><br>



<?php
   require_once 'footer.php';
?>