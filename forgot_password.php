<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>PDH</title>
  <!--<link rel="stylesheet" href="css/background.css" >  -->
  <style>
    body{
      background-image: url(./img/pdhback.jpg);
      max-height: 100vh;
      height: 100vh;
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
    }
    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color:rgb(255, 255, 255, 0.5);
    }
    input[type="email"], input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: darkgreen;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: lightseagreen;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 style="text-align: center; color: black; font-size: 30px; text-shadow: 0 0 4px white, 0 0 6px darkgreen;">Forgot Password</h2>
    <p>Please enter your registered email address. <br>We'll send you a verification code to reset your password.</p>
    <form id="forgotPasswordForm">
      <input type="email" id="email" name="email" placeholder="Please Enter Your Registered Email" required>
      <input type="submit" value="Send Verification Code">
    </form>
  </div>

  <script>
    document.getElementById("forgotPasswordForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      var email = document.getElementById("email").value;
      var verificationCode = Math.random().toString(36).substr(2, 6); // Generate random verification code
      
      // Make AJAX request to send_email.php
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "sendMail.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText); // Log server response
          alert(xhr.responseText); // Show response message
      
          // Redirect to OTP verification page if email was sent successfully
          if (xhr.responseText.includes("Verification email sent successfully!")) {
            window.location.href = "otp_verification.php"; // Replace with your OTP verification page URL
          }
        }
      };
      xhr.send("email=" + email + "&verificationCode=" + verificationCode);
    });
</script>

</body>
</html>
