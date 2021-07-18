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


<div class="container mt-3">


<div class="login-section text-white bg-dark p-5" id="login">


<div class="title text-center mb-3">
  <h3 class="font-weight-bolder">Admin Login Panel</h3>
  <span class="text-danger"> <?php echo $error;?></span>
</div>


<form method = "post" action="" class="w-50 m-auto">

  <div class="from-group">
     
    <label for="username">User Name</label>
    <input type="text" class="form-control" name="username">
    <span class="text-danger"> <?php echo $username_err;?></span>

   

  </div>

  <div class="from-group">

    <label for="password">password</label>
    <input type="password" class="form-control" name="password">
    <span class="text-danger"> <?php echo $password_err;?></span>

    
  </div>



  <div class="form-group mt-3">

   <input type="submit" name="submit" class= "btn btn-secondary" value="Login">
   
                  
  </div>
   
</form>



</div>
</div>

<?php
   require_once 'footer.php';
?>