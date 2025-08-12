# Simple PHP Email Sending Script Using PHPMailer

This project demonstrates how to send emails securely in PHP using the **PHPMailer** library with SMTP authentication.  
The example uses Gmail's SMTP server, TLS encryption, and includes both HTML and plain-text message formats.

## Features
- Uses **PHPMailer** for email sending
- **SMTP Authentication** for secure login
- **TLS encryption** for secure communication
- Sends **HTML-formatted emails** with a plain-text alternative
- Customizable sender and recipient details

## Requirements
- PHP 7.4 or higher
- Composer (optional, for installing PHPMailer)
- Gmail account (or another SMTP provider)
- PHPMailer library

## Installation
1. **Clone this repository:**
   git clone https://github.com/yourusername/your-repo-name.git
2. Install PHPMailer (via Composer or manually):
   Using Composer:
   composer require phpmailer/phpmailer
   Or download it manually from PHPMailer GitHub and place it in your project folder.
3. Enable Gmail App Passwords:
  Go to your Google Account → Security
  Enable 2-Step Verification
  Create an App Password for "Mail"
4. Edit index.php:
  Replace the placeholders:
  $mail->Username   = 'your-email@gmail.com';
  $mail->Password   = 'your-app-password';
  $mail->setFrom('your-email@gmail.com', 'Your Name');
  $mail->addAddress('recipient@example.com', 'Recipient Name');
Usage
  Run the script via your local server (XAMPP, WAMP, Laragon, etc.) or upload it to your hosting server.
  Example:
  http://localhost/your-project-folder/index.php
If successful, you’ll see:
Email sent successfully!

License

This project is licensed under the MIT License - feel free to modify and use it for your own projects.
📌 Note
    If you use Gmail, you must enable "App Passwords" for PHPMailer to work with SMTP.
    For production, avoid hardcoding credentials. Use environment variables instead.

Author: Francisco Batista de Lima Neto

