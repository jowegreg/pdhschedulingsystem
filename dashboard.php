<?php

//dashboard.php



include('class/Appointment.php');

$object = new Appointment;

include('header.php');

?>
<style>
	.card-header {background-color: rgb(173, 243, 173, 0.5);}
	/* .card-body {background-color:rgb(173, 243, 173, 0.5);} */
	.card-header {text-align: center; color: darkgreen; font-size: 20px; text-shadow: 0 0 4px white, 0 0 6px darkgreen;}
</style>
<div class="container-fluid">
	<?php
	include('navbar.php');
	?>
	<br />
	<div class="card">
		<div class="card-header"><h4>Doctor Schedule List</h4></div>
		<div class="card-header py-3">
                        	<div class="row">
                            	<div class="col-sm-6">
                            		<!-- <h6 class="m-0 font-weight-bold text-primary">Doctor Schedule List</h6> -->
                            	</div>
                            	<div class="col-sm-6" align="left">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row input-daterange">
												<p>Select your Preferred Date:</p>
                                                <div class="col-md-6">
                                                   <input type="date" name="start_date" id="start_date" class="form-control form-control-sm"  />
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                 <!-- error here -->
                                                <button type="button" name="doctor_name" id="search" value="Search" class="btn btn-info btn-sm"><i class="fas fa-search"></i></button>
                                                &nbsp;<button type="button" name="refresh" id="refresh" class="btn btn-secondary btn-sm"><i class="fas fa-sync-alt"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            	</div>
                            </div>
                        </div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
			      				<th>Doctor Name</th>
			      				<th></th>
			      				<th>Speciality</th>
			      				<th>Appointment Date</th>
			      				<th>Appointment Day</th>
			      				<th>Available Time</th>
			      				<th>Action</th>
			      			</tr>
			      		</thead>
			      		<tbody></tbody>
			      	</table>
			    </div>
			</div>
		</div>
	</div>

</div>

<?php

include('footer.php');

?>

<div id="appointmentModal" class="modal fade">
  	<div class="modal-dialog">
    	<form method="post" id="appointment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Make Appointment</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail"></div>
                    <div class="form-group">
                    	<label><b>Reason for Appointment</b></label>
                    	<textarea name="reason_for_appointment" id="reason_for_appointment" class="form-control" required rows="5"></textarea>
                    </div>
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_doctor_id" id="hidden_doctor_id" />
          			<input type="hidden" name="hidden_doctor_schedule_id" id="hidden_doctor_schedule_id" />
					<input type="hidden" name="hidden_doctor_schedule_date" id="hidden_doctor_schedule_date" />
          			<input type="hidden" name="action" id="action" value="book_appointment" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Book" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>


<script>
	

$(document).ready(function(){

	fetch_data();

	// var dataTable = $('#appointment_list_table').DataTable({
	// 	"processing" : true,
	// 	"serverSide" : true,
	// 	"order" : [],
	// 	"ajax" : {
	// 		url:"action.php",
	// 		type:"POST",
	// 		data:{action:'fetch_schedule'}
	// 	},
	// 	"columnDefs":[
	// 		{
    //             "targets":[5],				
	// 			"orderable":false,
	// 		},
	// 	],
	// });

	$(document).on('click', '.get_appointment', function(){

		var doctor_schedule_id = $(this).data('doctor_schedule_id');
		var doctor_id = $(this).data('doctor_id');
		var doctor_schedule_date = $(this).data('doctor_schedule_date');
		

		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:'make_appointment', doctor_schedule_id:doctor_schedule_id},
			success:function(data)
			{
				$('#appointmentModal').modal('show');
				$('#hidden_doctor_id').val(doctor_id);
				$('#hidden_doctor_schedule_id').val(doctor_schedule_id);
				$('#hidden_doctor_schedule_date').val(doctor_schedule_date);
				$('#appointment_detail').html(data);
			}
		});

	});

	$('#appointment_form').parsley();

	$('#appointment_form').on('submit', function(event){

		event.preventDefault();

		if($('#appointment_form').parsley().isValid())
		{

			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function(){
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					$('#submit_button').val('Book');
					if(data.error != '')
					{
						$('#form_message').html(data.error);
					}
					else
					{	
						window.location.href="appointment.php";
					}
				}
			})

		}

	})

	function fetch_data( start_date='', end_date=''){
		var dataTable = $('#appointment_list_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"action.php",
			type:"POST",
			data:{  
                    start_date: start_date,
                    end_date: end_date,
				    action:'fetch_schedule'}
		},
		"columnDefs":[
			{
                "targets":[5],				
				"orderable":false,
			},
		],
	});
	}

	$('#search').click(function(){
        var start_date = $('#start_date').val();
        var start_date = $('#start_date').val();
        if(start_date != '' && start_date !='')
        {
            $('#appointment_list_table').DataTable().destroy();
            fetch_data( start_date, start_date);
        }
        else
        {
            alert("Both Date is Required");
        }
    });

	$('#refresh').click(function(){
		$('#appointment_list_table').DataTable().destroy();
        fetch_data('','');
    });

});

</script>