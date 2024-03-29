<?php
require_once '../controller/database.php';
require_once '../models/Lecturer.php';
require_once '../models/Registry.php';
require_once '../models/Database.php';
session_start();
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
    <!-- <script type="text/javascript" src="../js/timer.js"></script> -->
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script type="text/javascript" src="../js/watch.js"></script>
	<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #264C69;">
		<div class="container">
			<a class="navbar-brand" href="../index.php"><img src="../assets/logo1.png" alt=""></a>
			<!-- Hamburger -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- Collapses navbar items into Hamburger -->
		  <div class="collapse navbar-collapse" id="navbarNav">
		    
			<ul class="navbar-nav my-2 my-lg-0 ml-auto">
                <li class="nav-item active" >
		            <a class="nav-link" href="lecturer_dashboard.php">Dashboard</a>
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
                <a href="./lecturer_sclass.php" style="text-decorations:none; color:white;"><i class="fa fa-arrow-left" aria-hidden="true"></i>(Back)</a>
           </div>
           <?php
                echo '<div class="col-lg-7">';
                // Instantiate Lecturer
                $lecturer= new Lecturer();
                $courseID= $_SESSION['courseID'];
                $lectID= $_SESSION['sessionId'];
                $courses= $lecturer->getSomeCourses($courseID);
                echo '<h3>'.$courses->cName.'</h3>';
                    echo '<p>';
                    echo '<h5>Countdown Timer</h5>';
                        
                    
            ?>
            <p id="timer"></p>
            
            </p>
            </div>
           <div class="col-lg-2">
                <h3 id="page-time"></h3>
           </div>
       </div> 
   </div>
   <script>
        var item =document.getElementById("timer");
        // item.innerHTML="Yay! Js is working."
        var months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];
        var now = new Date();
        console.log(now.getDay());
        //get class days
        
        <?php
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count=0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    echo <<<_TIMERCALC
                    var time1 = "$cSchedule->cStartTime";//start time
                    var date = months[now.getMonth()]+" "+ now.getDate()+", "+now.getFullYear();
                    var start= new Date(date+" " +time1);
                    
                    //Get ending time of class
                    var time2= "$cSchedule->cEndTime";//end time
                    console.log(new Date().getTime());
                    
                    var countDownDate = new Date(date + " " +time2).getTime();
                    var x = setInterval(function() {
                        if(new Date().getTime()>=start.getTime() ){
                            var now = new Date().getTime();
                            var distance = countDownDate - now;
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            document.getElementById("timer").innerHTML = hours + ":"
                            + minutes + ":" + seconds;
                            if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("timer").innerHTML = "LOCKED: Time for class has passed see Registry";
                            }
                        }
                        else{
                            document.getElementById("timer").innerHTML = "Not time for class";
                        }
                    }, 1000);
                    
                    _TIMERCALC;
                }
                else{
                    $count++;
                }
            }
            if($count>=3){
                echo 'item.innerHTML="No class today";';
            }
        ?>
        
    </script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>