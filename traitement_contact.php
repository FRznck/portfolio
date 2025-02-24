<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Import PHPMailer classes into the global namespace



require __DIR__ . '/PHPMailer/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['message'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: contact.html?error=invalidemail');
        exit;
    }

    if (empty($name) || empty($email) || empty($message)) {
        header('Location: contact.html?error=emptyfields');
        exit;
    }

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'franckkouassi4038@gmail.com';          // SMTP username
        $mail->Password   = 'brpqzparszbdpctu';                    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('franckkouassi4038@gmail.com');           // Add a recipient

        // Content
        $mail->isHTML(true);                                       // Set email format to HTML
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body    = "Nom: $name <br> Email: $email <br> Message: $message";

        $mail->send();
        header('Location: contact.html?success');
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header('Location: contact.html?error');
        exit;
    }
}