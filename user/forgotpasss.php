

<?php 
   
    require_once 'header1.php';
    require_once '../config.php';

   $pass_error = $email_error=$username_err = $old_pass_error = $conpass_error =  "";
   $old_pass = $username = $email = $pass = $confirmpass = $status =  $verifypass = "" ;

   $ok = false;
   if(isset($_POST['submit'])){

    $pass = check_input($_POST['password']);
    $confirmpass = check_input($_POST['confirmPassword']);
   
    if(empty($_POST['username'])){
        $username_err  = "Please Enter Username" ; 
      }else{
       // $username = check_input($_POST['username']);
        $username = mysqli_real_escape_string($link , $_POST['username']);
      }


 
    if(empty($_POST['password'])){
        $pass_error  = "Please enter the password" ; 
    }else if(strlen($pass)< 5 ){
        $pass_error  = "Your password length must be greater than 5 character" ; 
    }else{
        $pass = check_input($_POST['password']);
    }
    
    if(empty($_POST['confirmPassword'])){
        $conpass_error  = "Please enter the confirm password" ; 
    }else{
        $confirmpass = check_input($_POST['confirmPassword']);
    }

    if($pass != $confirmpass){
        $conpass_error = "password not matched";
    }


    if(empty($email_error) && empty($pass_error) && empty($conpass_error)){
      
          $insertpass = password_hash($pass , PASSWORD_DEFAULT);
          $sql1 = "update login set user_password = '$insertpass' where user_name = '$username'";
          $res2 = mysqli_query($link , $sql1);


          if($res2){
            $status = '<div class="alert alert-success ">Password changed successfully</div>';
          }else{

            $status = '<div class="alert alert-danger ">Failed Attempt</div>' ; 
          }            
         //else{
            //$status = '<div class="alert alert-danger ">Something error occured</div>' ; 
       // }


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
         
            <div class="col-sm-4">
            
            </div>

            <div class="col-sm-4">
              <br><br>

              <h5 class="text-success">Path-Way E-Ticketing Services</h5>

        <!--    <span id ="validationMessage"></span>-->
            <span><?php echo $status;?></span>

            <br><br><br>

            <form  id = "form" method ="post" action="">

            <div class="form-group">
            
            <i class="fa fa-envelope"></i><label for="email">&nbsp;&nbsp; Username</label>
            <input type="text" value=""  id ="username" class="form-control" placeholder="Enter Your User Name"  name="username" required>
            <span class="text-danger"> <?php echo $username_err ;?></span>
          
            </div>

            <div class="form-group">
            
            <i class="fas fa-unlock-alt"></i><label for="password">&nbsp;&nbsp; New Password</label>
            <input type="password" id="password" class="form-control" placeholder="Enter Your New Password"  name="password" required>
   
            <span class="text-danger"> <?php echo $pass_error;?></span>
          
            </div>

            <div class="form-group">
            
            <i class="fas fa-key"></i> <label for="confirmPassword">&nbsp;&nbsp; Confirm New Password</label>
            <input type="password" id="confirmPass" class="form-control" placeholder="Confirm Your New Password"  name="confirmPassword" required>
           
            <span class="text-danger"> <?php echo $conpass_error;?></span>
          
            </div>


            <br><br>

            <div class="form-group">
            <input type="submit" style = "width:100%"  name="submit" id ="submitbtn" class="form-control btn btn-success" value="Update"> 
            </div>
         

          </form>
            
            </div>

            <div class="col-sm-4"></div>
             
         
         </div>
       
    
        </div>

        		  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


  <?php
   require_once 'footer.php';
?>
