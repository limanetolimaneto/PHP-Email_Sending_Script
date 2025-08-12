<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    // Sets PHPMailer to use SMTP protocol for sending emails instead of the default mail() function.
    $mail->isSMTP();
    // Sets the Gmail SMTP server
    $mail->Host = 'smtp.gmail.com';          
    // Enables SMTP authentication to securely log in to the SMTP server using provided credentials.
    $mail->SMTPAuth = true;
    // Credentials: username and password.
    $mail->Username = 'emailaddress@gmail.com';      
    $mail->Password = 'password';    
    // Specifies the encryption protocol (TLS) to secure the connection between PHPMailer and the SMTP server.
    $mail->SMTPSecure = 'tls';
    // Sets SMTP Server Port 
    $mail->Port = 587;
    // Set the sender's email address and name
    $mail->setFrom('sender@gmail.com', 'Sender');
    // Set the recipient's email address and name
    $mail->addAddress('recipient@gmail.com', 'Recipient');
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
