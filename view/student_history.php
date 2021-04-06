<?php
require_once '../controller/database.php';
require_once '../models/Student.php';
require_once '../models/Database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance History</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sdashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
	<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #264C69;">
		<div class="container">
			<a class="navbar-brand" href="../index.php"><img src="../assets/logo1.jpg" alt=""></a>
			<!-- Hamburger -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- Collapses navbar items into Hamburger -->
		  <div class="collapse navbar-collapse" id="navbarNav">
		    
			<ul class="navbar-nav my-2 my-lg-0 ml-auto">
                <li class="nav-item active" >
		            <a class="nav-link" href="student_dashboard.php">Dashboard</a>
		        </li>
                <li class="nav-item " >
		            <a class="nav-link" href="#">My Courses</a>
		        </li>
                <li class="nav-item" >
		            <a class="nav-link" href="#">Timetable</a>
		        </li>
                
                <li class="nav-item" >
		            <a class="nav-link" href="settings.php"><i class="fa fa-cog" aria-hidden="true"></i></a>
		        </li>
		      

			  
			</ul>
			</div>

 		</div>
    </nav>
    <br>
    
	
	<!-- Dashboard -->
   <div class="container jumbotron course">
       <div class="row">
           <div class="col-lg-3">
           <i class="fa fa-arrow-left" aria-hidden="true"></i>(Back)
           </div>
           <div class="col-lg-9">
               <h3>Software Engineering</h3>
                <p>
                    Number of classes: x% present
                    <br>
                    Number of missed: y%
                    <div class="row">
                        <div class="col-lg-4">
                            Date
                        </div>
                        <div class="col-lg-4">
                            Start Time
                        </div>
                        <div class="col-lg-4">
                            Status
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            1.
                        </div>
                        <div class="col-lg-4">
                            8:00 AM
                        </div>
                        <div class="col-lg-4">
                            <span class="present-status">present</span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            2.
                        </div>
                        <div class="col-lg-4">
                            8:00 AM
                        </div>
                        <div class="col-lg-4">
                            <span class="absent-status">absent</span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            3.
                        </div>
                        <div class="col-lg-4">
                            8:00 AM
                        </div>
                        <div class="col-lg-4">
                            <span class="present-status">present</span>
                            
                        </div>
                    </div>
                </p>
           </div>
       </div> 
   </div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>