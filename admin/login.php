<?php
   require_once '../config.php';
   
   $username = $password ="";
   $username_err = $password_err = $error ="";
   
   if(isset($_POST['submit'])){
     
      if(empty($_POST['username'])){
        $username_err  = "Please Enter Username" ; 
      }else{
        $username = check_input($_POST['username']);
      }

      if(empty($_POST['password'])){
        $password_err  = "Please Enter Password" ; 
      }else{
        $password= check_input($_POST['password']);
      }

      if(empty($username_err) && empty($password_err)){
           
        $sql = "SELECT * FROM admin where email = '$username' and  password = '$password'";

        $result = mysqli_query($link , $sql);

        if(mysqli_num_rows($result)>0){

           session_start();
            $_SESSION['aloggedin'] = true;
            header('location: profile.php');
        }
        else{

          $error = "Invalid login credentials";
        }

      }

   }


   function check_input($data){

    $data =  trim($data);
    $data =  stripcslashes($data);
    $data =  htmlspecialchars($data);    

    return $data;


   }


   require_once 'header.php';
?>



<div class="container">

<div class="row">

   <div class="col-sm-4">
   
   </div>
 
   <div class="col-sm-4">
     <br><br>


     <div class="title text-center mb-3">
      <h3 class="font-weight-bolder">Admin Login Panel</h3>
     <span class="text-danger"> <?php echo $error;?></span>
    </div>

   <br><br><br>

   <form  id = "form" method ="post" action="">
   
   <div class="form-group">
   
   <i class="fa fa-envelope"></i><label for="email">&nbsp;&nbsp; Username</label>
   <input type="text" value=""  id ="username" class="form-control" placeholder="Enter Your User Name"  name="username" required>
   <!--<span id="email-e"> </span>-->
   <span class="text-danger"> <?php echo $username_err ;?></span>
 
   </div>

   <div class="form-group">
   
   <i class="fas fa-unlock-alt"></i><label for="password">&nbsp;&nbsp; Password</label>
   <input type="password" id="password" class="form-control" placeholder="Enter Your Password"  name="password" required>
 <!--  <span id="password-p"> </span>-->
 <span class="text-danger"> <?php echo $password_err;?></span>
 
   </div>

   <div class="form-group">

   <input type="submit" name="submit" id ="submitbtn1" class="form-control btn-success" value="Login"> 
</div>


 </form>
   
   </div>

   <div class="col-sm-4"></div>
    

</div>


</div>

<?php
   require_once 'footer.php';
?>
