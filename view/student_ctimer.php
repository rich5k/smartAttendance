<?php
require_once '../controller/database.php';
require_once '../models/Student.php';
require_once '../models/Database.php';
session_start();
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Timer</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sdashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/watch.js"></script>
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
                
                <li class="nav-item signIn">
                    <?php
                    //if session variable has been created, put first name and last name in navbar
                            if(isset($_SESSION['sessionFname'])&&isset($_SESSION['sessionLname'])){
                                printf('Akwaaba, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
                                echo <<<_SIGNOUTITEM
                                    <a id="sign-in" class="nav-link" href="../controller/logout.php">
                                        Sign Out 
                                    <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                
                                _SIGNOUTITEM;

                            }else{
                                //if not, put the default navitem
                                echo <<<_SIGNINITEM
                                <a id="sign-in" class="nav-link" href="./sign_in.php">
                                    Sign In 
                                <i class="fa fa-user" aria-hidden="true"></i></a>
                                
                                _SIGNINITEM;

                                
                            }
                        ?> 
                   
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
                <a href="./student_sclass.php" style="text-decorations:none; color:white;"><i class="fa fa-arrow-left" aria-hidden="true"></i>(Back)</a>
           </div>
           <?php
                echo '<div class="col-lg-7">';
                // Instantiate Student
                $student= new Student();
                $courseID= $_SESSION['courseID'];
                $studID= $_SESSION['sessionId'];
                $courses= $student->getSomeCourses($courseID);
                $attendChecks= $student->getAttendCheck($studID, $courseID);
                
                
                    echo '<h3>'.$courses->cName.'</h3>';
                        echo '<p>';
                        echo '<div class="row">';
                            echo '<div class="col-lg-4">';
                                echo 'Time';
                            echo '</div>';
                            echo '<div class="col-lg-4">';
                                echo 'Status';
                            echo '</div>';
                            echo '<div class="col-lg-4">';
                                echo 'Action';
                            echo '</div>';
                        echo '</div>';
                $count=1;
                
                foreach($attendChecks as $attendCheck){
                    echo '<div class="row">';
                        echo '<div class="col-lg-4">';
                            echo $count.'. '.$attendCheck->classDate;
                        echo '</div>';
                        echo '<div class="col-lg-4">';
                            echo '<span class="absent-status">'.$attendCheck->attendStatus.'</span>';
                        echo '</div>';
                        echo '<div class="col-lg-4">';
                            echo '<button type="button" class="btn btn-primary check" data-toggle="modal" data-target="#staticBackdrop">';
                            echo 'Check attendance';
                            echo '</button>';
                        echo '</div>';
                    echo '</div>';
                    $count++;
                }
                echo '</p>';
                echo '</div>';
                
           ?>

           
           <div class="col-lg-2">
               <h3 id="page-time">8:07 AM</h3>
           </div>
       </div> 
   </div>

	<!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Attendace check</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="cam-group1">
                <div id="camera" class="border border-secondary" style="width:350px;height:350px;"></div>
                <button class="btn btn-primary" id="pic-snap">Take photo</button>
            </div>
            <div style="display:none;" class="cam-group2">
                    <button id="retake-photo" class="btn btn-primary">Retake</button>
                    <button id="save-photo" class="btn btn-primary">Done</button>
                </div>
            <div style="display:none;" class="cam-group1a">
            </div>
            <div style="display:none;" class="cam-group3">
                <div class="d-flex justify-content-center">
                    <i style="font-size: 4rem;" class="bi bi-check-circle-fill text-success"></i>
                </div>
                <p>Attendance marked</p>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>