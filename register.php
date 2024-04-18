<?php

//login.php

include('header.php');

?>
<style>
	.card { background-color:   rgb(255, 255, 255, 0.8);}
	.card-header {font-weight: 700; text-align: center; color:darkgreen; font-size: 20px; text-shadow: 0 0 4px white, 0 0 6px black;}
	.form-group {font-weight: 500; color: black;}
	.password_required {
		display: none;
	 }
	.password_required ul{
		padding: 0;
		margin: 0 0 15px;
		list-style: none;
	}
	.password_required ul li {
		margin-bottom: 8px;
		color: black;
		font-weight: 500;
	}
	.password_required ul li.active {
		color: black;
	}
	.password_required ul li span:before {
		content: "❌";
	}
	.password_required ul li.active span:before {
		content: "✅";
	}

</style>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card">
				<div class="card-header">Patient Registration Form</div>
				<div class="card-body">
					<form method="post" id="patient_register_form">
						<div class="form-group">
							<label>Email Address<span class="text-danger">*</span></label>
							<input placeholder="Enter your valid/working email address." type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>
						<div class="form-group">
							<label>Password<span class="text-danger">*</span></label>
							<input placeholder="Enter your password." type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" minlength="8"/>
							<input type="checkbox" onclick="myFunction()">Show Password
						</div>
						<div class="password_required">
								<ul>
									<li class="lowercase"><span></span>With Lowercase Letter</li>
									<li class="uppercase"><span></span>With Uppercase Letter</li>
									<li class="numbers"><span></span>With Numbers</li>
									<li class="special"><span></span>With Special Characters</li>
									<li class="length"><span></span>Atleast 8 Characters</li>
								</ul>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name<span class="text-danger">*</span></label>
									<input onchange="upperCase()" placeholder="Enter you First Name" type="text" name="patient_first_name" id="patient_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name<span class="text-danger">*</span></label>
									<input onchange="upperCase()" placeholder="Enter you Last Name" type="text" name="patient_last_name" id="patient_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Middle Name<span ></span></label>
									<input onchange="upperCase()" placeholder="Enter you Middle Name" type="text" name="patient_mid_name" id="patient_mid_name" class="form-control"  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Suffix<span ></span></label>
									<input onchange="upperCase()" placeholder="If any" type="text" name="patient_suffix" id="patient_suffix" class="form-control"   data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Date of Birth<span class="text-danger">*</span></label>
									<input placeholder="Y-m-d" type="text" name="patient_date_of_birth" id="patient_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Gender<span class="text-danger">*</span></label>
									<select name="patient_gender" id="patient_gender" class="form-control" required>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Contact No.<span class="text-danger">*</span></label>
									<input placeholder="+63" type="text" name="patient_phone_no" id="patient_phone_no" class="form-control" required  data-parsley-trigger="keyup" value = "+63" maxlength="13"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Maritial Status<span class="text-danger">*</span></label>
									<select name="patient_maritial_status" id="patient_maritial_status" class="form-control" required>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Seperated">Seperated</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Complete Address<span class="text-danger">*</span></label>
							<textarea placeholder="Type your full Current Address" name="patient_address" id="patient_address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<input type="submit" name="patient_register_button" id="patient_register_button" class="btn btn-primary" value="Register" />
						</div>

						<div class="form-group text-center">
							<a href="login.php" style="background-color: transparent;">Login</a>
						</div>
					</form>
				</div>
			</div>
			<br />
			<br />
		</div>
	</div>
</div>

<?php

include('footer.php');

?>

<script>
function myFunction() {
  var x = document.getElementById("patient_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function upperCase() {
  const w = document.getElementById("patient_first_name");
  const x = document.getElementById("patient_last_name");
  const y = document.getElementById("patient_mid_name");
  const z = document.getElementById("patient_suffix");
  w.value = w.value.toUpperCase();
  x.value = x.value.toUpperCase();
  y.value = y.value.toUpperCase();
  z.value = z.value.toUpperCase();
}

$('#patient_password').on('focus',function(){
	$('.password_required').slideDown();
})
$('#patient_password').on('blur',function(){
	$('.password_required').slideUp();
})
$('#patient_password').on('keyup',function(){
	passValue = $(this).val();

	if(passValue.match(/[a-z]/g)){
		$('.lowercase').addClass('active');
	}else{
		$('.lowercase').removeClass('active');
	}
	if(passValue.match(/[A-Z]/g)){
		$('.uppercase').addClass('active');
	}else{
		$('.uppercase').removeClass('active');
	}
	if(passValue.match(/[0-9]/g)){
		$('.numbers').addClass('active');
	}else{
		$('.numbers').removeClass('active');
	}
	if(passValue.match(/[!@#$%^&*]/g)){
		$('.special').addClass('active');
	}else{
		$('.special').removeClass('active');
	}
	if(passValue.length == 8 ||passValue.length > 8 ){
		$('.length').addClass('active');
	}else{
		$('.length').removeClass('active');
	}
})

$(document).ready(function(){

	$('#patient_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

	$('#patient_register_form').parsley();

	$('#patient_register_form').on('submit', function(event){

		event.preventDefault();

		if($('#patient_register_form').parsley().isValid())
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:'json',
				beforeSend:function(){
					$('#patient_register_button').attr('disabled', 'disabled');
				},
				success:function(data)
				{
					$('#patient_register_button').attr('disabled', false);
					$('#patient_register_form')[0].reset();
					if(data.error !== '')
					{
						$('#message').html(data.error);
					}
					if(data.success != '')
					{
						$('#message').html(data.success);
					}
				}
			});
		}

	});

});

</script>