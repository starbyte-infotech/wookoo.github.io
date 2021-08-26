<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor1/autoload.php';
session_start();  
// $e = '16selja@gmail.com';
$mail = new PHPMailer(true);
if(isset($_POST['email']))
// if(isset($e))
{
    echo $email=$_POST['email'];
    // echo $email=$e;

    try 
    {
        $rndno = rand(100000, 999999); //OTP generate
        //$_SESSION['check_otp'] = 555555;
        $_SESSION['session_otp'] = $rndno;
        
        $mail->SMTPDebug = 1;                                       
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'allenbrenid@gmail.com';                     
        $mail->Password   = 'yatquufxhyqpewkr';                        
        $mail->SMTPSecure = 'tls';                              
        $mail->Port       = 587;  
    
        $mail->setFrom('allenbrenid@gmail.com', 'WooKoo');           
        // $mail->addAddress('hemangigajera.starbyte@gmail.com');
        $mail->addAddress("$email");
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Forgot your password?';
       
        $mail->Body    = "WOOKOO One Time Password (OTP) is $rndno";
        // $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        // $_SESSION['otp'] = $rndno;
        
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
// header("location:../auth-forgot-password.php");
  
?>