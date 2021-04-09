<?php
require_once '../controller/database.php';
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
    <title>Ongoing Classes</title>
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
   <div class="container jumbotron cheading">
        <div class="row">
            <div class="col-lg-11">
            <h1>Ongoing Courses</h1>
            </div>
            <div class="col-lg-1">
                <a href="./reg_new_course.php" style="text-decorations:none; color:green;"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
            
            </div>
        </div>
        <?php
            // Instantiate Registry
            $registry= new Registry();

            $courses= $registry->getCourses();
            //display courses
            foreach($courses as $course){
                echo '<div class="container jumbotron course">';
                    echo '<form>';
                        echo '<input type="hidden" name="cID" value="'.$course->courseID.'"></input>';
                        echo '<h3>';
                            echo $course->cCode. " - ". $course->cName;
                        echo '</h3>';
                        echo '<button type="button" class="btn bg-light border  add-button" onclick="addCID(this)">Add Course Essentials</button>';
                    echo '</form>';
                echo '</div>';
            }

        ?>
        
        
   </div>
	<script>
        function addCID(e){
            console.log('I was clicked');
            var cID=parseInt(e.parentNode.children[0].value);
            console.log(cID);
            $.ajax({
                type:"post",
                url:"../controller/storeCID.php",
                data: 
                {  
                  'courseID' : cID
                  
                },
                cache:false,
                success: function (html) 
                {
                  window.location.href= "./reg_course_essen.php";
                }
                });
                return false;
        }
    </script>
    <?php echo $courseID;?>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>