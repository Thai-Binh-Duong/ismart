<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


function send_email($send_to_email,$send_to_fullname,$subject,$content,$option=array()){
    global $config;
    $config_email = $config['email'];
    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $config_email['smtp_host'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $config_email['smtp_user'];                     //SMTP username
    $mail->Password   = $config_email[ 'smtp_pass' ];                             //SMTP password
    $mail->SMTPSecure = $config_email['smtp_secure'];            //Enable implicit TLS encryption
    $mail->Port       = $config_email['smtp_port'];    
    $mail->CharSet = $config_email['charset'];                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom( $config_email['smtp_user'],  $config_email['smtp_fullname']);
    $mail->addAddress($send_to_email, $send_to_fullname);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo( $config_email['smtp_user'],  $config_email['smtp_fullname']);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('test.jpg');         //Add attachments
    //$mail->addAttachment('test.jpg', 'next.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $content;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Da gui thanh cong';
} catch (Exception $e) {
    echo "Email ko dc gui. Mailer Error: {$mail->ErrorInfo}";
}

}
