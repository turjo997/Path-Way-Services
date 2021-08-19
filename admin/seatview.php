<?php
  
include('server1.php'); 
?>

<?php  

?>



<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="editstyle.css">
	<title>admin</title>

 
 
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


<?php 
$id = "";
    if (isset($_GET['seat_view'])) {
        $id = $_GET['seat_view'];
    }

   $results = mysqli_query($db, "SELECT * FROM bus_sch where id=$id");

?>

<div class="container">
   <div class="row">

 


     <div class="col-lg-2"></div>
 
     <div class="col-lg-10">
         <br><br><br>

     <div class="title text-center mb-3">
      <h3 class="font-weight-bolder">Seat View</h3>
     
    </div>
     


     <table class="table table-striped table-bordered table-hover table-success text-center">
	<thead>
		<tr>
			<th>Bus_Id</th>
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


                                    <a class = "btn btn-outline-primary mb-3" href="#">A1</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">A2</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">A3</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">A4</a> &nbsp;&nbsp;&nbsp;

                                    <br><br>
                                    <a class = "btn btn-outline-primary mb-3" href="#">B1</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">B2</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">B3</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">B4</a> &nbsp;&nbsp;&nbsp;
                                    
                                    <br><br>


                                    <a class = "btn btn-outline-primary mb-3" href="#">C1</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">C2</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">C3</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">C4</a> &nbsp;&nbsp;&nbsp;
                                    
     
                                    <br><br>
                                    <a class = "btn btn-outline-primary mb-3" href="#">D1</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">D2</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">D3</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">D4</a> &nbsp;&nbsp;&nbsp;
                                    <br><br>
                                    <a class = "btn btn-outline-primary mb-3" href="#">E1</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">E2</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">E3</a> &nbsp;&nbsp;&nbsp;
                                    <a class = "btn btn-outline-primary mb-3" href="#">E4</a> &nbsp;&nbsp;&nbsp;
                              



     </div>


                            
   </div>
</div>




	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
			
		<br><br><br><br><br>
<?php
   require_once 'footer.php';
?>