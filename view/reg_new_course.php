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
    <title>Create Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/sdashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
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
		            <a class="nav-link" href="reg_welcome.php">Dashboard</a>
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
        <h1>Create new Course</h1>
        <form action="../controller/add_course.php" method="post">
        <div class="form-group">
            <label for="cCode">Course Code</label>
            <input type="text" class="form-control" name="cCode">
            
        </div>
        <div class="form-group">
            <label for="cName">Course Name</label>
            <input type="text" class="form-control" name="cName">
            
        </div>
        
        
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
        </form>
        
   </div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>