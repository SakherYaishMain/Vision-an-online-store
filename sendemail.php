<?php

require_once'./connections/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "	smtp.sendgrid.net";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "apikey";
$mail->Password = "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";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 25;

$mail->From = "sokoyiyi@gmail.com";
$mail->FromName = "Vision";

$mail->addAddress("yaish.sakher@gmail.com");

$mail->isHTML(true);

$mail->Subject = "Thanks for ordering from Vision!";
$mail->Body = "<strong>Thank you for ordering from Vision! We hope to see you again.</strong>";
$mail->AltBody = "Thank you for ordering from Vision! We hope to see you again.";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}catch (phpmailerException $e){
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
}
?>
