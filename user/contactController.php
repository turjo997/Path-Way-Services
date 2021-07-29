<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once "class.phpmailer.php";
require_once "class.smtp.php";
require_once "class.exception.php";



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
    $mail->Password='98turjouser98';

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


 ?>