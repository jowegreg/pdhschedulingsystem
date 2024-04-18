<?php
session_start();

//$_SESSION['email'] = 'joegreg046@gmail.com'; // You may not need to hardcode the email here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
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
    input[type="email"], button[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="password"], button[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="text"], button[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    button[type="submit"] {
      background-color: darkgreen;
      color: white;
      border: none;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: lightseagreen;
    }
</style>
<body>
    <div class="container">
    <h2 style="text-align: center; color: black; font-size: 30px; text-shadow: 0 0 4px white, 0 0 6px darkgreen;">Change Password</h2>
    <form id="patient_change_password" method="post">
        <label for="email">Email:</label><br>
        <!-- Use PHP to echo the session email value as the default value -->
        <input readonly type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required><br><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="checkbox" onclick="myFunction()">Show Password

        <button type="submit">Change Password</button>
        <input type="hidden" name="action" value="change_password">
    </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("new_password");
  var y = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}
$(document).ready(function(){
    $('#patient_change_password').submit(function(e){
        e.preventDefault();

        // Check if the confirm password matches the new password
        var newPassword = $('#new_password').val();
        var confirmPassword = $('#confirm_password').val();
        if (newPassword !== confirmPassword) {
            alert("New password and confirm password do not match.");
            return;
        }

        $.ajax({
            url: "action.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function(){
                $('button[type="submit"]').attr('disabled', 'disabled');
            },
            success: function(data){
                $('button[type="submit"]').attr('disabled', false);
                $('form')[0].reset();
                if(data.error){
                    alert(data.error);
                }
                if(data.success){
                    alert(data.success);
                    window.location.href = "login.php";
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred while processing your request.");
            }
        });
    });
});


</script>
</html>
