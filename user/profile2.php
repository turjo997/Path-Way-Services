
<?php

require_once "header.php";

$data = "";

$data= $_SESSION['bus_id'];

// echo $data;

$db = mysqli_connect('localhost', 'root', '', 'path-way services');
$results = mysqli_query($db, "SELECT * FROM bus_sch where id = '$data'");




require_once '../config.php';
$name="";
$date ="";

$seat = $route =$date=$time=$status="";
$seat_err=$route_err  =$date_err=$time_err =$error ="";

if(isset($_POST['submit'])){

 if(empty($_POST['route'])){
   $route_err  = "Please enter the route" ; 
 }else{
   $route = check_input($_POST['route']);
}
       
if(empty($_POST['date'])){
$date_err  = "Please enter the date" ; 
}else{
$date = check_input($_POST['date']);
}
     

         
 if(empty($route_err) && empty($date_err)){
  
   $sql = "select * from bus_sch where route = '$route' && date='$date'";
   $query = mysqli_query($link , $sql);
 
   $count = mysqli_num_rows($query);

   if($count > 0){
    session_start();   

    $_SESSION['route_name'] = $route;
    $_SESSION['date'] = $date;
    header('location: view1.php');
   }
    else {
      
       $status = '<div class="alert alert-danger ">No record found</div>' ; 
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


 <div class="container">

 <div class="row">


 <div class="col-lg-4"></div>
     

       <div class="col-lg-6">
       <span class="text-danger"> <?php echo $status;?></span>
        <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   
   <h3 style="color: orange;">Check Buses</h3>
   <br>
   <?php  




        function showAllData(){
          $connection = mysqli_connect("localhost","root","","path-way services");
          $query = "SELECT route FROM bus_sch";
          $result = mysqli_query($connection, $query);

          if(!$result){
              die('Query Failed'.mysqli_connect_error());
          }
          while($row = mysqli_fetch_assoc($result)){
              $name = $row['route'];
              echo $name;
              echo "<option name='$name'>$name</option>";
          } 
        }
                      
                        
      ?>
      <select name="route"> <?php showAllData();?> </select> 
      <span class="text-danger"> <?php echo $route_err ;?></span>
      
   </div>
   <div class="form-group">

    <input type="date" name="date"  min="2015-01-01" max="2022-01-01"> 
    <span class="text-danger"> <?php echo $date_err ;?></span>
   
    </div>


    <div class="form-group">

       <input type="submit" name="submit" id ="submitbtn1" class="form-control btn-success" value="Check Now"> 
      </div>
 

    
      </form>
         
  

        </div>






 </div>




      </div>
    
      </div>
      </div>
    
    

     </div>



<?php

require_once "footer.php";

?>