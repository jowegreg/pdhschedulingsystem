<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification</title>
  <link rel="stylesheet" href="css/background.css" > 
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
      background-color: rgb(255, 255, 255, 0.5);
    }
    input[type="text"], input[type="submit"] {
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
    <h2 style="text-align: center; color: black; font-size: 30px; text-shadow: 0 0 4px white, 0 0 6px darkgreen;">OTP Verification</h2>
    <p>Please enter the verification code sent to your email address.</p>
    <form id="otpVerificationForm">
      <input type="text" id="otp" name="otp" placeholder="Verification Code" required>
      <input type="submit" value="Verify">
    </form>
  </div>


  <script>
        document.getElementById("otpVerificationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            var otp = document.getElementById("otp").value;

            // Make AJAX request to verify OTP
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "verify_otp.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); // Log server response
                    alert(xhr.responseText); // Show response message
                    // Redirect to success page if OTP is verified successfully
                    if (xhr.responseText.includes("OTP verified successfully!")) {
                        window.location.href = "change_password.php"; 
                    }
                }
            };
            xhr.send("otp=" + otp);
        });
    </script>
</body>
</html>
