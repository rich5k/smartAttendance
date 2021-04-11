<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Student.php';
    session_start();
    $cStudent= $_POST["cStudent"];
    $courseID= $_SESSION["courseID"];

    //Instantiate Student
    $student= new Student();

    //if fields are empty
    if (empty($cStudent) ){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/course_students.php";</script>';
        exit();
    }
   
    
    else{
        list($fname, $lname)= explode(" ", $cStudent,2);
        //Student Data
        $studentData=[
            'fname'=>$fname,
            'lname'=>$lname
        ];
        $studDetails = $student->getStudentDetails2($studentData);
        
        //student Course Data
        $studCourseData=[
            'studentID'=> $studDetails->studentID,
            'courseID'=> $courseID
        ];
        
        //Add student To Do
        if($student->addstudentCourse($studCourseData)){
            echo '<script>alert("Well Done. You added a student to the course successfully")</script>';
            echo '<script>window.location.href = "../view/cstudents_inquiry.php";</script>';
            exit();

        }
        else{
            header("Location: ../view/course_students.php?error=sqlerror1");
            exit();
        }
        
    }
}

?>