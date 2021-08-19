<?php
	session_start();

    $db = mysqli_connect('localhost', 'root', '', 'path-way services');

	
	$id = 0;
	
    $route = "";

    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $query = "SELECT * FROM seat_info where id = $id";
        $result = mysqli_query($db, $query);
     
        $SEATNAME = 0;
        $soldseat = $avseat  = $BUSID = 0;


        while($row = mysqli_fetch_assoc($result)){
            $BUSID = $row['bus_id'];
            $SEATNAME = $row['seat_name'];
            $soldseat = $row['sold_seat'];
            $avseat= $row['available_seat'];
        } 

       // echo $soldseat;

       
        $avseat = $avseat + 1;
        $soldseat =$soldseat - 1;


        mysqli_query($db, "update seat_info set sold_seat = '$soldseat' where bus_id = '$BUSID'");
        mysqli_query($db, "update seat_info set available_seat = '$avseat' where bus_id = '$BUSID'");
        mysqli_query($db, "update bus_sch set sold_seat = '$soldseat' where id = '$BUSID'");
        mysqli_query($db, "update bus_sch set available_seat='$avseat' where id = '$BUSID'");
   

        $sql = "INSERT INTO  seat_info (bus_id,seat_name,available_seat) values('$BUSID','$SEATNAME',' $soldseat','$avseat')";
       
      
 
        mysqli_query($db, $sql);
         
    
        mysqli_query($db, "DELETE FROM pending WHERE id=$id");
        $_SESSION['message1'] = "Ticket Ignored!"; 
        header('location: pending.php');
    }


    if (isset($_GET['accept'])) {
        $id = $_GET['accept'];

        $status = "approved";
        mysqli_query($db, "update pending set status = '$status' where id = '$id'");

        $_SESSION['message1'] = "Ticket Approved!"; 
        header('location: pending.php');

    }


?>