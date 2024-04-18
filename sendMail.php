<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($email,$verificationCode){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.elasticemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'capstone02pdh@gmail.com'; // Your Gmail address
        $mail->Password = 'BF577B8099794262AF85EAF6111B8D35FC6F'; // Your Gmail password
        $mail->SMTPSecure = '';
        $mail->Port = 2525;

        $mail->setFrom('capstone02pdh@gmail.com', 'PDH'); // Your name
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Your verification code is: ' . $verificationCode;

        $mail->send();
        echo 'Verification email sent successfully!';
        return true;
    } catch (Exception $e) {
        echo 'Verification email could not be sent. Error: ', $mail->ErrorInfo;
        return false;
    }
}

// Check if email and verification code are provided via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["verificationCode"])) {
    $email = $_POST["email"];
    $verificationCode = $_POST["verificationCode"];

    // Send verification email
    if (sendEmail($email, $verificationCode)) {
        echo 'Verification email sent successfully!';
         // Store verification code in session
    session_start();
    $_SESSION['verification_code'] = $verificationCode;
    $_SESSION['email'] = $email;
    } else {
        echo 'Verification email could not be sent.';
    }
}

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from form
    // $email = 'rjgreg46@gmail.com';

    // // Generate verification code
    // $verificationCode = uniqid();

    // // Send verification email
    // $mail = new PHPMailer(true);
    // try {
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.elasticemail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'rjgreg46@gmail.com'; // Your Gmail address
    //     $mail->Password = '66395C61B8CBFC215353CC688333327B477B'; // Your Gmail password
    //     $mail->SMTPSecure = '';
    //     $mail->Port = 2525;

    //     $mail->setFrom('rjgreg46@gmail.com', 'PDH'); // Your name
    //     $mail->addAddress($email);

    //     $mail->isHTML(true);
    //     $mail->Subject = 'Email Verification';
    //     $mail->Body = 'Your verification code is: ' . $verificationCode;

    //     $mail->send();
    //     echo 'Verification email sent successfully!';
    // } catch (Exception $e) {
    //     echo 'Verification email could not be sent. Error: ', $mail->ErrorInfo;
    // }

    // // Store verification code in session
    // session_start();
    // $_SESSION['verification_code'] = $verificationCode;
    // $_SESSION['email'] = $email;
// }
?>
