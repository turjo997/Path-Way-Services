<?php
 //  require_once '../config.php';
   
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
     <h5 class="text-success">Path-Way E-Ticketing Services</h5>
    

<!--    <span id ="validationMessage"></span>-->
   <span><?php echo $error;?></span>

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

   
  
   <br><br>

   <div class="form-group">
   <input type="submit" style = "width:100%"  name="submit" id ="submitbtn" class="form-control btn btn-success" value="Login"> 
   </div>

   <a style="font-size:30px;" href="forgotpasss.php"><b>Forgot Your Password ?</b></a>
  

 </form>
   
   </div>

   <div class="col-sm-4"></div>
    

</div>


</div>

<?php
   require_once 'footer.php';
?>