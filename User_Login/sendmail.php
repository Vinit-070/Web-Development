<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST['send'])){
print_r($_FILES);


$email = $_POST['femail'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$femail = $_POST['femail'];

    try {
       
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp-relay.sendinblue.com';                    
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'api01.vinitpatel@gmail.com';                     
        $mail->Password   = 'H2c5TjnZXVGd63Rs';                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          
        $mail->Port       = 587;                                     
    
        
        $mail->setFrom($femail);
           
        $mail->addAddress($email);               
        
        if($_FILES['attachment']['name']!=null){
            if(move_uploaded_file($_FILES['attachment']['tmp_name'],"uploads/{$_FILES['attachment']['name']}")){
        $mail->addAttachment("uploads/{$_FILES['attachment']['name']}");    

            }
    
        }
           
    
        
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();   
        // echo "Message has been sent";
         echo '<script>window.location.href="email-api.php?message_sent";</script>';
     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }
