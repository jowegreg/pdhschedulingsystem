<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Pinamalayan Doctors' Hospital</title>

	    <!-- Custom styles for this page -->
		<link rel="stylesheet" href="css/background.css" >  
	    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

	    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	    <link rel="stylesheet" type="text/css" href="vendor/parsley/parsley.css"/>

	    <link rel="stylesheet" type="text/css" href="vendor/datepicker/bootstrap-datepicker.css"/>

	    <!-- Custom styles for this page -->
    	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	    <style>
			.my-0 { color: white; font-size: 25px; text-shadow: 0 0 3px black, 0 0 5px lightgreen;}
	    	.border-top { border-top: 1px solid #e5e5e5; }
			.border-bottom { border-bottom: 1px solid #e5e5e5; }
			.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
	    </style>
	</head>
	
	<body style="background-image: url(./img/pdhback.jpg); background-attachment: fixed; max-height: 100vh;
    height: 100vh; background-repeat: no-repeat; background-attachment: fixed; background-size: cover; height: 100%;">
		<div class="d-flex flex-column flex-md-row p-3 px-md-4 mb-3 border-bottom box-shadow" style="background-color: darkgreen;" >
			<div class="col">	
		    	<h5 class="my-0 mr-md-auto font-weight-normal"><img src="./img/pdh logo.png" alt="image" style="max-height: 30px;">Pinamalayan Doctors' Hospital</h5>
		    </div>
			
		    <?php
		    if(!isset($_SESSION['patient_id']))
		    {
		    ?>
		    <div class="col text-right">
				<a href="index.php" style="color: white;">Home</a>
				<a href="" style="color: darkgreen;">Home</a>
				<a href="login.php" style="color: white;">Login</a></div>
		   	<?php
		   	}
		   	?>
		    
	    </div>

	    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	      	<h1 class="display-4" style="text-align: center; color: white; font-size: 50px; text-shadow: 0 0 4px black, 0 0 6px darkgreen; font-style: italic;">"Your Quality Health Care with a HEART"</h1>
	    </div>
	    <div class="container-fluid">