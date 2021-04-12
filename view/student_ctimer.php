<?php
require_once '../controller/database.php';
require_once '../models/Student.php';
require_once '../models/Registry.php';
require_once '../models/Lecturer.php';
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
                <p id="timer"></p>
           </div>
           <?php
                echo '<div class="col-lg-7" id="attendChecker">';
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
                            echo $count.'. '.$attendCheck->cTime;
                        echo '</div>';
                        if($attendCheck->attendStatus=="present"){
                            echo '<div class="col-lg-4">';
                                echo '<span class="present-status">'.$attendCheck->attendStatus.'</span>';
                            echo '</div>';
                        }else{
                            echo '<div class="col-lg-4">';
                                echo '<span class="absent-status">'.$attendCheck->attendStatus.'</span>';
                            echo '</div>';
                        }
                        if($attendCheck->attendStatus=="present" || $attendCheck->attendStatus=="absent"){
                            echo '<div class="col-lg-4">';
                                echo '<button type="button" class="btn btn-primary check" data-toggle="modal" data-target="#staticBackdrop" disabled>';
                                echo 'Check attendance';
                                echo '</button>';
                            echo '</div>';
                        }
                        else{
                            echo '<div class="col-lg-4">';
                                echo '<button type="button" class="btn btn-primary check" data-toggle="modal" data-target="#staticBackdrop">';
                                echo 'Check attendance';
                                echo '</button>';
                            echo '</div>';
                        }

                        
                    echo '</div>';
                    $count++;
                }
                echo '</p>';
                echo '</div>';
                
           ?>

           
           <div class="col-lg-2">
               <h3 id="page-time"></h3>
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

    <script>
        $(document).ready(function(){
            $('#save-photo').click(function(){
                let status1 = "present";
                $.ajax({
                    url:'../controller/updateCheckslot.php',
                    method: 'POST',
                    data: {statusCheck: status1},
                        success:function(data){
                            $('#attendChecker').html(data) ;
                        }
                });
                        
            });
        });

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
            // Instantiate Lecturer
            $lecturer= new Lecturer();
            $lecturers = $lecturer->getLecturers();
            $classLecturer=0;
            foreach($lecturers as $lects){
                $classTimer=$lecturer->getClassTimer($lects->lecturerID, $courseID);
                if($classTimer==1){
                    $classLecturer=$lects->lecturerID;
                    break;
                }
            }
            $classTimer=$lecturer->getClassTimer($classlecturer, $courseID);

            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    echo <<<_TIMERCALC
                    var time1 = "$cSchedule->cStartTime";//start time
                    var date = months[now.getMonth()]+" "+ now.getDate()+", "+now.getFullYear();
                    var start= new Date(date+" " +time1);
                    
                    //Get ending time of class
                    var time2= "$cSchedule->cEndTime";//end time
                    console.log(time1);
                    
                    var countDownDate = new Date(date + " " +time2).getTime();
                    const randomTimes= [];
                    var sTimeMins = (Math.floor((start.getTime() % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((start.getTime() % (1000 * 60 * 60)) / (1000 * 60))
                    var nTimeMins = (Math.floor((new Date().getTime() % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((new Date().getTime() % (1000 * 60 * 60)) / (1000 * 60))
                    var eTimeMins = (Math.floor((countDownDate % (1000 * 60* 60 * 24))/(1000*60 *60) )+1)*60 + Math.floor((countDownDate % (1000 * 60 * 60)) / (1000 * 60))
                    
                    var diff1 =nTimeMins - sTimeMins;
                    var startCheck = sTimeMins+5;
                    var endCheck = eTimeMins-5;
                    var middleInterval= endCheck-startCheck;
                    console.log(sTimeMins);
                    console.log(startCheck);
                    console.log(eTimeMins);
                    console.log(endCheck);
                    var openPeriod1 = nTimeMins-diff1;
                    var diff2 =eTimeMins-nTimeMins;
                    var openPeriod2 = nTimeMins-diff2;
                    var numChecks= $classTimer->checknum;
                    var numRandomChecks= numChecks-2;
                    if(randomTimes.length<numRandomChecks){
                        for(let i = 1; i<=numRandomChecks; i++){
                            randomTimes.push(Math.round(Math.random()*middleInterval));
                        }
                        console.log(randomTimes);
                        randomTimes.sort(function(a,b){return a-b})
                        console.log(randomTimes);
                        
                    }

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
                                document.getElementById("timer").innerHTML = "LOCKED";
                            }
                        }
                        else{
                            document.getElementById("timer").innerHTML = "Not time for class";
                        }
                        if(diff1==5){
                            $(document).ready(function(){
                                var now= new Date().getTime();
                                var hours = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((now % (1000 * 60)) / 1000);
                                var nowTime = hours + ":"
                                + minutes + ":" + seconds;
                                console.log("This is now time "+ nowTime);
                                $.ajax({
                                    url:'../controller/addCheckslot.php',
                                    method: 'POST',
                                    data: {now_date: nowTime},
                                    success:function(data){
                                        $('#attendChecker').html(data) ;
                                    }
                               });
                           });
                        }
                        else if(openPeriod1==4){
                            $(document).ready(function(){
                                var status= "time up";
                                
                                $.ajax({
                                    url:'../controller/updateCheckslot.php',
                                    method: 'POST',
                                    data: {statusCheck: status},
                                    success:function(data){
                                        $('#attendChecker').html(data) ;
                                    }
                               });
                           });
                        }
                        else if(diff2<=5){
                            $(document).ready(function(){
                                var now= new Date().getTime();
                                var hours = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((now % (1000 * 60)) / 1000);
                                var nowTime = hours + ":"
                                + minutes + ":" + seconds;
                                console.log("This is now time "+ nowTime);
                                $.ajax({
                                    url:'../controller/addCheckslot.php',
                                    method: 'POST',
                                    data: {now_date: nowTime},
                                    success:function(data){
                                        $('#attendChecker').html(data) ;
                                    }
                               });
                           });
                        }
                        else if(openPeriod2==4){
                            $(document).ready(function(){
                                var status= "time up";
                                
                                $.ajax({
                                    url:'../controller/updateCheckslot.php',
                                    method: 'POST',
                                    data: {statusCheck: status},
                                    success:function(data){
                                        $('#attendChecker').html(data) ;
                                    }
                               });
                           });
                        }
                        else if(diff2<=0){
                            $(document).ready(function(){
                                var status2="class ended"
                                $.ajax({
                                    url:'../controller/deleteCheckslot.php',
                                    method: 'POST',
                                    data: {statusCheck: status2},
                                    success:function(data){
                                        $('#attendChecker').html(data) ;
                                    }
                               });
                           });
                        }
                        for(let i = 1; i<=numRandomChecks; i++){
                            if(nTimeMins>=(randomTimes[i]+sTimeMins) && nTimeMins<=(randomTimes[i]+sTimeMins+3)){
                                $(document).ready(function(){
                                    var now= new Date().getTime();
                                    var hours = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((now % (1000 * 60)) / 1000);
                                    var nowTime = hours + ":"
                                    + minutes + ":" + seconds;
                                    console.log("This is now time "+ nowTime);
                                    $.ajax({
                                        url:'../controller/addCheckslot.php',
                                        method: 'POST',
                                        data: {now_date: nowTime},
                                        success:function(data){
                                            $('#attendChecker').html(data) ;
                                        }
                                   });
                               });
                            }
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