<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'mail/src/Exception.php'; 
require 'mail/src/PHPMailer.php'; 
require 'mail/src/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'yuvaraj.webrixtec@gmail.com';       // SMTP username 
$mail->Password = 'irmlwgtlbjzvnaki';         // app password  get gmail
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('demo@example.com', 'SenderName'); 
//$mail->addReplyTo('reply@example.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress('yuvaraj.webrixtec@gmail.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'THANKS FOR SUBSCRIBING FORTUNE COMPANY '; 
 
// Mail body content 
$bodyContent = '<h1>contact form message</h1>'; 
$bodyContent = '<h3>First Name: '.$_POST['fname'].'</h3>';
 $bodyContent = '<h3>Last Name: '.$_POST['lname'].'</h3>'; 

$bodyContent .= '<h3>email: '.$_POST['email'].' </h3>'; 
$bodyContent .= '<p>company '.$_POST['company'].' </p>';
$bodyContent .= '<p>sector '.$_POST['sector'].' </p>';
$bodyContent .= '<p>country'.$_POST['country'].' </p>';
$bodyContent .= '<p>description'.$_POST['des'].' </p>';


$mail->Body    = $bodyContent; 
 
// Send email 
if($mail->send()) { 
    echo 'Message has been sent.'; 
    echo "<script> location.href='./index.html'; </script>";
    // header("Location:./index.html");
    
} else { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}



?>