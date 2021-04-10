<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Lecturer.php';
    session_start();
    $duration= $_POST["duration"];
    $checks= $_SESSION["checks"];
    $lectID= $_SESSION["sessionId"];
    $courseID= $_SESSION["courseID"];

    //Instantiate Lecturer
    $lecturer= new Lecturer();

    //if fields are empty
    if (empty($duration) || empty($checks) ){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/lecturer_sclass.php";</script>';
        exit();
    }
   
    
    else{
        
        //classTimer Data
        $classTimerData=[
            'lecturer'=>$lectID,
            'courseID'=>$courseID,
            'duration'=>$duration,
            'checknum'=>$checks
        ];

        
        //Add lecturer To Do
        if($lecturer->addClassTimer($classTimerData)){
            echo '<script>alert("Well Done. You added a lecturer to the course successfully")</script>';
            echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
            exit();

        }
        else{
            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
            exit();
        }
        
    }
}

?>