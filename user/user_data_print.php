<?php
require_once "header.php";
require_once "../config.php";

//session_start();


$data1 = $_SESSION['user_name'];



//echo $data1;

$results = mysqli_query($link, "SELECT * FROM login where user_name ='$data1'");
$results1= mysqli_query($link, "SELECT * FROM transaction where id=(select max(id) from transaction)");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Panel</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Path Way Services</h2>

      <table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>Full Name</th>
	  <th>User Name</th>
     
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['user_name']; ?></td>
    </tr>
  <?php }?>
</table>

<table class="table table-striped table-bordered table-hover table-dark text-center">
  <thead>
    <tr>
      <th>Transaction Date</th>
	  <th>Transaction Id</th>
	  <th>Card Type</th>
	  <th>Status</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results1)) { ?>
    <tr>
            <td><?php echo $row['tran_date']; ?></td>
			<td><?php echo $row['tran_id']; ?></td>
			<td><?php echo $row['card_type']; ?></td>
			<td><?php echo $row['status']; ?></td>
    </tr>
  <?php }?>
</table>

 

      <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>











