<?php

//index.php

include('class/Appointment.php');

$object = new Appointment;

if(isset($_SESSION['patient_id']))
{
	header('location:dashboard.php');
}

$object->query = "
SELECT * FROM doctor_schedule_table 
INNER JOIN doctor_table 
ON doctor_table.doctor_id = doctor_schedule_table.doctor_id
WHERE doctor_schedule_table.doctor_schedule_date >= '".date('Y-m-d')."' 
AND doctor_schedule_table.doctor_schedule_status = 'Active' 
AND doctor_table.doctor_status = 'Active' 
ORDER BY doctor_schedule_table.doctor_schedule_date ASC
";

$result = $object->get_result();

include('header.php');

?>
<!-- <style>
	.card-header {background-color: rgb(0, 100, 0, 0.8);}
	.card-body {background-color: rgb(173, 243, 173, 0.5);}
	.card-header {text-align: center; color: white; font-size: 20px; text-shadow: 0 0 4px black, 0 0 6px darkgreen;}
</style>
		      	<div class="card">
		      		<form method="post" action="result.php">
			      		<div class="card-header"><h3><b>Doctor Schedule List</b></h3></div>
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
		      							<th>Doctor Name</th>
		      							
		      							<th>Speciality</th>
		      							<th>Appointment Date</th>
		      							<th>Appointment Day</th>
		      							<th>Available Time</th>
		      							<th>Action</th>
		      						</tr>
		      						<?php
		      						foreach($result as $row)
		      						{
		      							echo '
		      							<tr>
		      								<td>'.$row["doctor_name"].'</td>
		      								
		      								<td>'.$row["doctor_expert_in"].'</td>
		      								<td>'.$row["doctor_schedule_date"].'</td>
		      								<td>'.$row["doctor_schedule_day"].'</td>
		      								<td>'.$row["doctor_schedule_start_time"].' - '.$row["doctor_schedule_end_time"].'</td>
		      								<td><button type="button" name="get_appointment" class="btn btn-primary btn-sm get_appointment" data-id="'.$row["doctor_schedule_id"].'">Get Appointment</button></td>
		      							</tr>
		      							';
		      						}
		      						?>
		      					</table>
		      				</div>
		      			</div>
		      		</form>
		      	</div> -->
<link rel="stylesheet" href="css/custom.css" > 
<link rel="stylesheet" href="css/background.css" >     
<section id="departments" class="departments">
        <div class="container">
  
          <div class="section-title">
            <br>
            <h2 style="text-align: center; color: white; font-size: 50px; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">OUR SERVICES</h2><br>
          </div>
         
          <div class="row gy-4">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column" >
              <li class="nav-item" role="presentation">
                  <a class="nav-link show active" data-toggle="tab" href="#tab0" aria-selected="true" role="tab">Doctors Monthly Schedule</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-toggle="tab" href="#tab1" aria-selected="false" role="tab" tabindex="-1">Regular OPD</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-toggle="tab" href="#tab2" aria-selected="false" role="tab" tabindex="-1">Laboratory & Pharmacy</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-toggle="tab" href="#tab4" aria-selected="false" role="tab" tabindex="-1">X-ray & Ultrasound</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-toggle="tab" href="#tab5" aria-selected="false" role="tab" tabindex="-1">Ob-Gyne & ENT Clinic</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-toggle="tab" href="#tab6" aria-selected="false" role="tab" tabindex="-1">Endocrinology, Gastroenterology, Nephrology</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="tab-content">
                <div class="tab-pane active show" id="tab0">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1" style="align-items: center;">
                      <img src="img/april sched.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab1">
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Regular OPD</h3>
                      <p style=" color: black;  background-color: rgb(255, 255, 255, 0.5);">General Medicine <br>Family Medicine <br> Occupational Medicine Specialized Clinics Internal Medicine - Adult Diseases General Pediatrics General Surgery Ancillary Service Radiology - Ultrasound</p>
                      </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="img/services/opd.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab2" >
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Laboratory</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">You may reach PDH Lab through the following for questions on lab services. facebook: 𝗳𝗮𝗰𝗲𝗯𝗼𝗼𝗸.𝗰𝗼𝗺/𝗣𝗗𝗛.𝗹𝗮𝗯 mobile: 𝟬𝟵𝟲𝟯-𝟮𝟱𝟱 𝟭𝟯𝟰𝟵</p> <br>
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Pharmacy</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">You can reach PDH pharmacy through the following: facebook: 𝗳𝗮𝗰𝗲𝗯𝗼𝗼𝗸.𝗰𝗼𝗺/𝗲𝗕𝗼𝘁𝗶𝗸𝗮.𝗣𝗗𝗛 mobile: 𝟬𝟵𝟮𝟴-𝟱𝟵𝟮 𝟯𝟭𝟰𝟲 We accept walk-in, pick-up, and delivery of ordered prescriptions.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="img/services/lab.jpg" alt="" class="img-fluid"> <p></p>
                      <img src="img/services/pharmacy.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab4" >
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">X-ray</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">𝗫-𝗥𝗔𝗬 Monday to Friday: 6am to 10 pm Weekends: 6am to 4pm; on-call after 4pm </p> <br><br>
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Ultrasound</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">𝗨𝗟𝗧𝗥𝗔𝗦𝗢𝗨𝗡𝗗 Monday to Saturday: 9am to 4pm Sunday: 9am to 12nn</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="img/services/ultrasound.jpg" alt="" class="img-fluid"> <p></p>
                      <img src="img/services/ultrasound.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab5" >
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Ob-Gyne</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">Pre-natal and post-natal check-up High risk pregnancy consult Transvaginal/transrectal and OB pelvic ultrasound Normal and caesarean delivery Pelvic laparotomy, TAHBSO, and dilation and curettage (D&C) Infertility evaluation Family planning Reproductive and women's health consult</p>
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">ENT Clinic</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">𝙀𝙖𝙧 Ear Surgery Video Otoscopy 𝙉𝙤𝙨𝙚/𝙋𝙖𝙧𝙖𝙣𝙖𝙨𝙖𝙡 𝙎𝙞𝙣𝙪𝙨 Rigid/Flexible Endoscopy (Nasal/Nasopharyngeal) Nasal Surgery Paranasal Surgery Endoscopic Sinus Surgery 𝙏𝙝𝙧𝙤𝙖𝙩 Rigid/Flexible Laryngoscopy Microlaryngeal Surgery 𝙃𝙚𝙖𝙙 𝙖𝙣𝙙 𝙉𝙚𝙘𝙠 𝙎𝙪𝙧𝙜𝙚𝙧𝙮 Thyroid Surgery Screening for Head & Neck Malignancies 𝙁𝙖𝙘𝙞𝙖𝙡, 𝙋𝙡𝙖𝙨𝙩𝙞𝙘, & 𝙍𝙚𝙘𝙤𝙣𝙨𝙩𝙧𝙪𝙘𝙩𝙞𝙫𝙚 𝙎𝙪𝙧𝙜𝙚𝙧𝙮 Maxillofacial Trauma Surgery Cleft Lip and Palate Surgery</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="img/services/obgyne.jpg" alt="" class="img-fluid"> <p></p>
                      <img src="img/services/ent.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab6" >
                  <div class="row gy-4">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Endocrinology</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">Thyroid, diabetes, and other hormone diseases.</p> <br><br><br>
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Gastroenterology</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">Gastroenterology Liver Clinic Diagnostic and Therapeutic Endoscopy-Colonoscopy.</p> <br><br><br>
                      <h3 style="color: white; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">Nephrology</h3>
                      <p style="color: black;  background-color: rgb(255, 255, 255, 0.5);">Acute Kidney Failure Chronic Kidney Diseases Urinary Tract Infections Kidney Stones.</p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img src="img/services/endocrinology.jpg" alt="" class="img-fluid"> <p></p>
                      <img src="img/services/gastroenerology.jpg" alt="" class="img-fluid"> <p></p>
                      <img src="img/services/nephrology.jpg" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </section>
      <hr class="rounded">
<br>
      <section id="doctors" class="doctors" style="background-color: transparent;">
        <div class="container">
    
          <div class="section-title">
            <br>
            <h2 style="text-align: center; color: white; font-size: 50px; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">OUR DOCTORS</h2><br>
            </div>
    
          <div class="row">
    
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>DR. ELOISA NG-MAMBIL</h4>
                  <span>General Medicine</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
    
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>DR. JUNE HARRIS MARINAS</h4>
                  <span>General Medicine</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
    
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-3.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Dr. Antonio Ng</h4>
                  <span>General Surgeon</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
    
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-4.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Dr. Romina Ng</h4>
                  <span>Internal Physician</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-3.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Dr. Antonio Ng</h4>
                  <span>General Surgeon</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
    
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/doctor/doctors-4.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>Dr. Romina Ng</h4>
                  <span>Internal Physician</span>
                  <p>Monday to Saturday 9:00am to 4:00pm</p>
                  <!--<div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                  </div> -->
                </div>
              </div>
            </div>
    
          </div>
    
        </div>
      </section>
      <hr class="rounded">
	  <br>
        <h2 style="text-align: center; color: white; font-size: 50px; text-shadow: 0 0 4px black, 0 0 6px darkgreen;">ABOUT  PDH</h2>
        <div class="container mt-5">
          <div class="row">
              <div class="col-lg-6" >
                  <div class="jumbotron">
                      <h1 class="display-4">Mission</h1>
                        <p class="lead">PDH is na institution committed to provide the highest quality healthcare service that is affordable accessible and reasonable through efficient and compassionate caregivers, serving all people from all walks of life in the whole of Mindoro as well as the nearby islands.</p>
                  </div>
              </div>
              <div class="col-lg-6">
                <div class="jumbotron">
                  
                      <h1 class="display-4">Vision</h1>
                      <p class="lead">PDH will be a par with the best medical facilities in the region, armed with the lastest technology and
                         the optimum in health care service where people would want to receive their care.
                      </p><br><br>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="jumbotron">
                      <h1 class="display-4">Objectives</h1>
                      <p class="lead">General Objective: </p><br>
                        <p class="lead">Pinamalayan Doctors’ Hospital aims to give the best and affordable care to the sick regardless of race, nationality, religion, gender, or socioeconomic status through a concerted effort of all involved in health care.
                        </p> <br> <p class="lead">Specific Objective:</p><br>
                        <p class="lead">1.	To provide quality health care for both in-patient services.</p>
                        <p class="lead">2.	To help in the education and training of health care personnel from affiliate schools.</p>
                        <p class="lead">3.	To render community service through annual Medical Missions.</p>
                        
                </div>
            </div>
            <div class="col-lg-6">
              <div class="jumbotron">
                    <h1 class="display-4">Values</h1>
                    <p class="lead">In line with its vision and mission, PDH has recognized the cultivation of core C.A.R.E.S values to guide the interrelationships of caregivers and employees with the hospital and their relationship with the patients, colleagues, and within the community </p>
                       <br> 
                      <p class="lead">C -	COMMITMENT to the organizational vision and mission.COMPASSION through sensitivity and mission.COMPETENCE in the health care needs of patients.CONSISTENCY and CONTINOUS improvement.</p>
                      <p class="lead">A -	ACTIVE and dynamic teamwork of healthcare professionals with a common goal for excellent health care service.</p>
                      <p class="lead">R -	RESPECT and RECOGNITION of each individual and corporate roles.</p>
                      <p class="lead">E -	EXCELLENCE in service, both in the individual and corporate roles.ENTHUSIASM of each individual to their assigned responsibilities.</p>
                      <p class="lead">S -	SERVICE to the organization, the community and external agencies.</p>
                      
              </div>
          </div>
        </div>
        <hr class="rounded">
      <footer class="mt-6">
          <div class="py-4 px-6  text-center md:text-start md:flex justify-between">
              <div class="text-sm">
                  Copyright © 2023 PDH. All Rights Reserved.
              </div>
          </div>
      </footer>

<?php

include('footer.php');

?>

<script>

$(document).ready(function(){
	$(document).on('click', '.get_appointment', function(){
		var action = 'check_login';
		var doctor_schedule_id = $(this).data('id');
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action, doctor_schedule_id:doctor_schedule_id},
			success:function(data)
			{
				window.location.href=data;
			}
		})
	});
});

</script>