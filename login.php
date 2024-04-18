<?php

//login.php

include('header.php');

include('class/Appointment.php');

$object = new Appointment;

?>
<style>
	.card { background-color:   rgb(255, 255, 255, 0.8);}
	.card-header {font-weight: 700; text-align: center; color:darkgreen; font-size: 20px; text-shadow: 0 0 4px white, 0 0 6px black;}
	.form-group {font-weight: 500; color: black;}
	a { color: black;}
</style>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-4">
			<?php
			if(isset($_SESSION["success_message"]))
			{
				echo $_SESSION["success_message"];
				unset($_SESSION["success_message"]);
			}
			?>
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Patient Login Form</div>
				<div class="card-body">
					<form method="post" id="patient_login_form">
						<div class="form-group">
							<label>Email Address</label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_login" />
							<input type="submit" name="patient_login_button" id="patient_login_button" class="btn btn-primary" value="Login" />
						</div>

						<div class="form-group text-center">
							<a href="register.php" style="background-color: transparent;">Register</a>
						</div>
						<a href="forgot_password.php" style="background-color: transparent;">Forgot Password?</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

include('footer.php');

?>


<script>

$(document).ready(function(){

	$('#patient_login_form').parsley();

	$('#patient_login_form').on('submit', function(event){

		event.preventDefault();

		if($('#patient_login_form').parsley().isValid())
		{
			$.ajax({

				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function()
				{
					$('#patient_login_button').attr('disabled', 'disabled');
				},
				success:function(data)
				{
					$('#patient_login_button').attr('disabled', false);

					if(data.error != '')
					{
						$('#message').html(data.error);
					}
					else
					{
						window.location.href="dashboard.php";
					}
				}
			});
		}

	});

});



</script>