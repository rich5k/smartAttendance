<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Lecturer.php';
    session_start();
    $duration= $_POST["duration"];
    $checks= (int)$_POST["checks"];
    $lectID= $_SESSION["sessionId"];
    $courseID= $_SESSION["courseID"];

    
    //Instantiate Lecturer
    $lecturer= new Lecturer();

    //if fields are empty
    if (empty($duration) || empty($checks) ){
        echo '<script>alert("Some fields are empty)</script>';
        // echo '<script>window.location.href = "../view/lecturer_sclass.php";</script>';
        exit();
    }
   
    
    else{
        $realDuration=0.0;
        if ($duration=="30 mins"){
            $realDuration=0.5;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
        elseif ($duration=="1 hour"){
            $realDuration=1.0;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
        elseif ($duration=="1 hour 30 mins"){
            $realDuration=1.5;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
        elseif ($duration=="2 hour"){
            $realDuration=2.0;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
        elseif ($duration=="2 hour 30 mins"){
            $realDuration=2.5;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
        else{
            $realDuration=3.0;
            //classTimer Data
            $classTimerData=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'duration'=>$realDuration,
                'checknum'=>$checks
            ];
    
            
            //Add class timer To Do
            if($lecturer->addClassTimer($classTimerData)){
                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                exit();
    
            }
            else{
                header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                exit();
            }
        }
    }
}

?>