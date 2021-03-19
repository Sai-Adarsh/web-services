<?php
require_once('class.smtp.php');
require_once('class.phpmailer.php');

function sendmail($to,$nameto,$subject,$message,$altmess)  {

  $from  = "1731037mss@cit.edu.in";
  $namefrom = "Sai Adarsh";
  $mail = new PHPMailer();  
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();   // by SMTP
  $mail->SMTPAuth   = true;   // user and password
  $mail->Host       = "localhost";
  $mail->Port       = 25;
  $mail->Username   = $from;  
  $mail->Password   = "20201";
  $mail->SMTPSecure = "";    // options: 'ssl', 'tls' , ''  
  $mail->setFrom($from,$namefrom);   // From (origin)
  $mail->addCC($from,$namefrom);      // There is also addBCC
  $mail->Subject  = $subject;
  $mail->AltBody  = $altmess;
  $mail->Body = $message;
  $mail->isHTML();   // Set HTML type
//$mail->addAttachment("attachment");  
  $mail->addAddress($to, $nameto);
  return $mail->send();
}
sendmail("saiadarshsivakumar@gmail.com", "Sai", "Hello", "Hello", "Hello");
?>