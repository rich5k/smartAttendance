<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Lecturer.php';

    $cLecturer= $_POST["cLecturer"];
   

    //Instantiate Lecturer
    $lecturer= new Lecturer();

    //if fields are empty
    if (empty($cLecturer) ){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/course_faculty.php";</script>';
        exit();
    }
   
    
    else{
        list($fname, $lname)= split(" ", $cLecturer,2);
        //Lecturer Data
        $lecturerData=[
            'fname'=>$fname,
            'lname'=>$lname
        ];
        $lectDetails = $lecturer->getLecturerDetails2($lecturerData);
        
        //Lecturer Course Data
        $lectCourseData=[
            'lecturerID'=> $lectDetails->lecturerID,
            'courseID'=> $courseID
        ];
        
        //Add lecturer To Do
        if($lecturer->addLecturerCourse($lectCourseData)){
            echo '<script>alert("Well Done. You added a lecturer to the course successfully")</script>';
            echo '<script>window.location.href = "../view/cfaculty_inquiry.php";</script>';
            exit();

        }
        else{
            header("Location: ../view/course_faculty.php?error=sqlerror1");
            exit();
        }
        
    }
}

?>