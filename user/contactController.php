<?php

require_once '../config.php';

/*
use PHPMailer\PHPMailer\PHPMailer;
require_once "class.phpmailer.php";
require_once "class.smtp.php";
require_once "class.exception.php";
require_once "class.POP3.php";
require_once "class.OAuth.php";
//require_once "autoload.php";



$mail=new PHPMailer(true);

$result="";
  if(isset($_POST['submit']))
  {
  
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $name=$_POST['fullname'];
    $mail->isSMTP();
    $mail->Debugoutput = 'html';
    $mail->Host='smtp.gmail.com';
    $mail->Port= 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure='tls';
    $mail->Username="turjouser98@gmail.com";
    $mail->Password='abcCoders987';

    $mail->addAddress('turjouser98@gmail.com');
    $mail->isHTML(true);
    $mail->subject=$subject;
    $mail->Body = "<h3> <br>Email : $email <br> <h3> <br>Name : $name <br> Subject : $subject <br> Message : $message</h3>";

    if(!empty($email))
    {
     
      $mail->setFrom("$email","$name");
      if($mail->send()){
      $email=null;

      $result = '<div class="alert alert-success">
                 <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
               </div>';
           }
    }
    else {
        $result = '<div class="alert alert-danger">
        <h5>Message not send. Try again.</h5>
       </div>';
    }


  }
  */





$name = $mail =$sub=$msg=$status="";
$name_err=$mail_err =$sub_err=$msg_err =$error ="";
   
   if(isset($_POST['submit'])){
 
    if(empty($_POST['fullname'])){
      $name_err  = "Please enter your name" ; 
    }else{
      $name = check_input($_POST['fullname']);
   }
   if(empty($_POST['email'])){
    $mail_err  = "Please enter your mail" ; 
  }else{
    $mail = check_input($_POST['email']);
 }
          
 if(empty($_POST['subject'])){
  $sub_err  = "Please enter the subject" ; 
}else{
  $sub = check_input($_POST['subject']);
}
        
if(empty($_POST['message'])){
  $msg_err  = "Please type the message" ; 
}else{
  $msg = check_input($_POST['message']);
}
        
            
    if(empty($name_err) && empty($mail_err) && empty($sub_err) && empty($msg_err)){
     
      $sql = "INSERT INTO  contact (fullname,email,subject,message)   values('$name','$mail','$sub','$msg')";
       
       if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($link, $sql)) {
        
          $status = '<div class="alert alert-success ">Thankyou! for contacting us, We\'ll get back to you soon!</div>';
        } else {
         
          $status = '<div class="alert alert-danger ">Message not send. Try again.</div>' ; 
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