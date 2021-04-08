<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Registry.php';

    $cName= $_POST["cName"];
    $cCode= $_POST["cCode"];

    //Instantiate Registry
    $registry= new Registry();

    //if fields are empty
    if (empty($cName) ||empty($cCode) ){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/reg_new_course.php";</script>';
        exit();
    }
    // elseif(!preg_match("/^\[[0-9]{2}[-]{1}[0-9]{2}[_A-Za-z0-9_]{4,}[A-Za-z0-9_]{4,}[A-Z]{1}\][-]{1}[A-Za-z]{3,}[A-Za-z]{3,}$/",$email)){
    //     echo '<script>alert("Invalid course code ")</script>';
    //     echo '<script>window.location.href = "../view/reg_new_course.php";</script>';
    //     exit();
    
    else{
        //Course Code
        $courseCode=[
            'cCode'=>$cCode
        ];
        if($registry->getCourseCode($courseCode)){
            echo '<script>alert("Course Code Taken")</script>';
            echo '<script>window.location.href = "../view/reg_new_course.php";</script>';
            exit();
        }
        else{
            
            

            //course Data
            $courseData =[
                'cName'=> $cName,
                'cCode'=> $cCode
                
            ];
            
            //Add course To Do
            if($registry->addCourse($courseData)){
                echo '<script>alert("Well Done. You created a course successfully")</script>';
                echo '<script>window.location.href = "../view/reg_welcome.php";</script>';
                exit();

            }
            else{
                header("Location: ../view/reg_new_course.php?error=sqlerror1");
                exit();
            }
        }
        
    }
}

?>