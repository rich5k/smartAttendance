<?php
require_once '../controller/database.php';
require_once '../models/Student.php';
require_once '../models/Registry.php';
require_once '../models/Database.php';
session_start();
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Class</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sdashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
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
           <a href="./student_chistory.php" style="text-decorations:none; color:white;"><i class="fa fa-arrow-left" aria-hidden="true"></i>(Back)</a>
           </div>
           <?php
                echo '<div class="col-lg-7">';
                // Instantiate Student
                $student= new Student();
                $courseID= $_SESSION['courseID'];
                $studID= $_SESSION['sessionId'];
                $courses= $student->getSomeCourses($courseID);
                    echo '<h3>'.$courses->cName.'</h3>';
                    echo '<h5>Started: <span id="cTime"></span></h5>';
                    echo '<div class="row">';
                        echo '<div class="col-lg-8">';
                        echo '</div>';
                        echo '<div class="col-lg-4">';
                        echo '<button onclick="location.href = \'./student_ctimer.php\';" class="btn btn-success" type="button" id="jClass">Join Class</button>';
                        echo '</div>';
                        
                    echo '</div>';
                    echo '</div>';
                
           ?>
           
           <div class="col-lg-2">
               <h3 id="page-time"></h3>
           </div>
       </div> 
   </div>
	<script>
        var ctime= document.getElementById("cTime");
        // var now = new Date();
        <?php
            
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count=0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    echo 'ctime.innerHTML="'.$cSchedule->cStartTime.'";';
                }
                else{
                    $count++;
                }
            }
            if($count>=3){
                echo 'ctime.innerHTML="No class today";';
            }
        ?>
        
    </script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>