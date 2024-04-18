<style>
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<?php

//profile.php



include('class/Appointment.php');

$object = new Appointment;

$object->query = "
SELECT * FROM patient_table 
WHERE patient_id = '".$_SESSION["patient_id"]."'
";

$result = $object->get_result();

include('header.php');

?>
<style>
	.card-header {background-color: rgb(173, 243, 173, 0.5);}
	/* .card-body {background-color:rgb(173, 243, 173, 0.5);} */
	.card-header {text-align: center; color: darkgreen; font-size: 20px; text-shadow: 0 0 4px white, 0 0 6px darkgreen;}
</style>
<div class="container-fluid">
	<?php include('navbar.php'); ?>

	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<br />
			<?php
			if(isset($_GET['action']) && $_GET['action'] == 'edit')
			{
			?>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Edit Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php" class="btn btn-secondary btn-sm">View</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="edit_profile_form">
						<div class="form-group">
							<label>Email Address<span class="text-danger">*</span></label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" readonly />
						</div>
						<div class="form-group">
							<label>Password<span class="text-danger">*</span></label>
                            <input id="patient_password" type="password" class="form-control" name="patient_password" value="secret" required  data-parsley-trigger="keyup"/>
                            <span toggle="#patient_password" class="fa fa-fw fa-eye field-icon toggle-patient_password"></span>
							<!--<input type="text" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />-->
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_first_name" id="patient_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name<span class="text-danger">*</span></label>
									<input type="text" name="patient_last_name" id="patient_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Middle Name<span ></span></label>
									<input type="text" name="patient_mid_name" id="patient_mid_name" class="form-control" data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Suffix<span ></span></label>
									<input placeholder="If any" type="text" name="patient_suffix" id="patient_suffix" class="form-control"   data-parsley-trigger="keyup" />
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Date of Birth<span class="text-danger">*</span></label>
									<input type="text" name="patient_date_of_birth" id="patient_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Gender<span class="text-danger">*</span></label>
									<select name="patient_gender" id="patient_gender" class="form-control">
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
									<input value="+63" type="text" name="patient_phone_no" id="patient_phone_no" class="form-control" required  data-parsley-trigger="keyup" maxlength="13"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Maritial Status<span class="text-danger">*</span></label>
									<select name="patient_maritial_status" id="patient_maritial_status" class="form-control">
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
							<textarea name="patient_address" id="patient_address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="edit_profile" />
							<input type="submit" name="edit_profile_button" id="edit_profile_button" class="btn btn-primary" value="Save" />
						</div>
					</form>
				</div>
			</div>

			<br />
			<br />
			

			<?php
			}
			else
			{

				if(isset($_SESSION['success_message']))
				{
					echo $_SESSION['success_message'];
					unset($_SESSION['success_message']);
				}
			?>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php?action=edit" class="btn btn-secondary btn-sm">Edit</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<?php
						foreach($result as $row)
						{
						?>
						<tr>
							<th class="text-right" width="40%">Name</th>
							<td><?php echo $row["patient_first_name"] . ' ' . $row["patient_mid_name"]. ' ' . $row["patient_last_name"]. ' ' . $row["patient_suffix"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Email Address</th>
							<td><?php echo $row["patient_email_address"]; ?></td>
						</tr>
						<!-- <tr>
							<th class="text-right" width="40%">Password</th>
							<td ><?php //echo $row["patient_password"] ; ?></td>
						</tr> -->
						<tr>
							<th class="text-right" width="40%">Address</th>
							<td><?php echo $row["patient_address"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Contact No.</th>
							<td><?php echo $row["patient_phone_no"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Date of Birth</th>
							<td><?php echo $row["patient_date_of_birth"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Gender</th>
							<td><?php echo $row["patient_gender"]; ?></td>
						</tr>
						
						<tr>
							<th class="text-right" width="40%">Maritial Status</th>
							<td><?php echo $row["patient_maritial_status"]; ?></td>
						</tr>
						<?php
						}
						?>	
					</table>					
				</div>
			</div>
			<br />
			<br />
			<?php
			}
			?>
		</div>
	</div>
</div>

<?php

include('footer.php');


?>

<script>
$(".toggle-patient_password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});


$(document).ready(function(){
	$('#patient_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

<?php
	foreach($result as $row)
	{

?>
$('#patient_email_address').val("<?php echo $row['patient_email_address']; ?>");
$('#patient_password').val("<?php echo $row['patient_password']; ?>");
$('#patient_first_name').val("<?php echo $row['patient_first_name']; ?>");
$('#patient_last_name').val("<?php echo $row['patient_last_name']; ?>");
$('#patient_mid_name').val("<?php echo $row['patient_mid_name']; ?>");
$('#patient_suffix').val("<?php echo $row['patient_suffix']; ?>");
$('#patient_date_of_birth').val("<?php echo $row['patient_date_of_birth']; ?>");
$('#patient_gender').val("<?php echo $row['patient_gender']; ?>");
$('#patient_phone_no').val("<?php echo $row['patient_phone_no']; ?>");
$('#patient_maritial_status').val("<?php echo $row['patient_maritial_status']; ?>");
$('#patient_address').val("<?php echo $row['patient_address']; ?>");

<?php

	}

?>

	$('#edit_profile_form').parsley();

	$('#edit_profile_form').on('submit', function(event){

		event.preventDefault();

		if($('#edit_profile_form').parsley().isValid())
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				beforeSend:function()
				{
					$('#edit_profile_button').attr('disabled', 'disabled');
					$('#edit_profile_button').val('wait...');
				},
				success:function(data)
				{
					window.location.href = "profile.php";
				}
			})
		}

	});

});

</script>