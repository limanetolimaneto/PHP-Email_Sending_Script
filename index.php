<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    // Sets PHPMailer to use SMTP protocol for sending emails instead of the default mail() function.
    $mail->isSMTP();
    // Sets the Gmail SMTP server
    $mail->Host = $_ENV['SMTP_HOST'];//'smtp.gmail.com';          
    // Enables SMTP authentication to securely log in to the SMTP server using provided credentials.
    $mail->SMTPAuth = true;
    // Credentials: username and password.
    $mail->Username = $_ENV['SMTP_USER'];//'emailaddress@gmail.com';      
    $mail->Password = $_ENV['SMTP_PASS'];//'password';    
    // Specifies the encryption protocol (TLS) to secure the connection between PHPMailer and the SMTP server.
    $mail->SMTPSecure = 'tls';
    // Sets SMTP Server Port 
    $mail->Port = $_ENV['SMTP_PORT'];//587;
    // Set the sender's email address and name
    $mail->setFrom($_ENV['MAIL_FROM'], 'Sender');//$mail->setFrom('sender@gmail.com', 'Sender');
    // Set the recipient's email address and name
    $mail->addAddress($_ENV['MAIL_TO'], 'Recipient');;//$mail->addAddress('recipient@gmail.com', 'Recipient');
    // Email content configuration
    $mail->isHTML(true);
    $mail->Subject = 'Test email sent with PHPMailer';
    $mail->Body    = '<h1>Hello, Neto!</h1><p>This email was sent using PHPMailer.</p>';
    $mail->AltBody = 'This email was sent using PHPMailer.';
    // Sends the email and outputs a success message if the sending process completes without errors.         
    $mail->send();
    echo 'Email sent successfully!';
} catch (\Throwable $th) {
    // Catches any errors during the email sending process and displays the error message from PHPMailer.
    echo "Error sending email: {$mail->ErrorInfo}";
}
?>
