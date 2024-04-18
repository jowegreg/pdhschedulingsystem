<?php
session_start();

// Check if the OTP sent by the user matches the stored verification code
if (isset($_POST["otp"]) && isset($_SESSION["verification_code"])) {
    $enteredOTP = $_POST["otp"];
    $storedOTP = $_SESSION["verification_code"];
    if ($enteredOTP == $storedOTP) {
        echo "OTP verified successfully!";
        // You can clear the session variable here if needed
         unset($_SESSION["verification_code"]);
         
         
    } else {
        echo "Invalid OTP. Please try again.";
    }
} else {
    echo "OTP verification failed. Please try again.";
}
?>
