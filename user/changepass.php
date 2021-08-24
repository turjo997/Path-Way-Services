
<?php
   require_once 'header.php';
   //require_once 'logincontroller.php';
   //require_once 'login.php';
   require_once '../config.php';

   $pass_error = $email_error=$username_err = $old_pass_error = $conpass_error =  "";
   $old_pass = $username = $email = $pass = $confirmpass = $status =  $verifypass = "" ;

   $ok = false;
   if(isset($_POST['submit'])){

    $pass = check_input($_POST['password']);
    $confirmpass = check_input($_POST['confirmPassword']);
    $old_pass = check_input($_POST['old_password']);

    if(empty($_POST['username'])){
        $username_err  = "Please Enter Username" ; 
      }else{
       // $username = check_input($_POST['username']);
        $username = mysqli_real_escape_string($link , $_POST['username']);
      }


    if(empty($_POST['old_password'])){
        $old_pass_error  = "Please enter the password" ; 
    }else{
        $old_pass = check_input($_POST['old_password']);
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

    if(empty($email_error) && empty($old_pass_error ) && empty($pass_error) && empty($conpass_error)){
      
        $sql = "SELECT * FROM login where user_name = '$username'";
        $result = mysqli_query($link , $sql);

        while($row = mysqli_fetch_array($result)){           
         if(password_verify($old_pass , $row['user_password'])){
             $ok = true;
         }
        }

     
        if($ok == false){
            $old_pass_error  = "password not matched" ; 
        }
        if($pass != $confirmpass){
            $conpass_error = "password not matched";
        }


        if(empty($old_pass_error ) && empty($conpass_error)){
          $insertpass = password_hash($pass , PASSWORD_DEFAULT);
          $sql1 = "update login set user_password = '$insertpass' where user_name = '$username'";
          $res2 = mysqli_query($link , $sql1);


          if($res2){
            $status = '<div class="alert alert-success ">Password changed successfully</div>';
          }else{

            $status = '<div class="alert alert-danger ">Failed Attempt</div>' ; 
          }            
        } //else{
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
            
            <i class="fas fa-unlock-alt"></i><label for="password">&nbsp;&nbsp; Old Password</label>
            <input type="password" id="" class="form-control" placeholder="Enter Your Old Password"  name="old_password" required>
          
            <span class="text-danger"> <?php echo $old_pass_error;?></span>
          
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
            <input type="submit" style = "width:100%"  name="submit" id ="submitbtn" class="form-control btn btn-success" value="Change Password"> 
            </div>
         

          </form>
            
            </div>

            <div class="col-sm-4"></div>
             
         
         </div>
       
    
        </div>
<?php
        require_once 'footer.php';
?>