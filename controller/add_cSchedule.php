<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Registry.php';
    session_start();
    $mon= $_POST["mon"];
    $tues= $_POST["tues"];
    $wed= $_POST["wed"];
    $thurs= $_POST["thurs"];
    $fri= $_POST["fri"];
    $sTime= $_POST["sTime"];
    $eTime= $_POST["eTime"];
    $courseID= $_SESSION["courseID"];
    echo $courseID;
    //Instantiate Registry
    $registry= new Registry();

    //if fields are empty
    if (empty($sTime) && empty($eTime) && empty($mon) && empty($tues) && empty($wed) && empty($thurs) && empty($fri)){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/course_schedule.php";</script>';
        exit();
    }
    
    else{
        $numClassUpdates=0;
        for($i=0; $i<5;$i++){
            if($i==0 && $mon!="No"){
                //Course Schedule Data
                $cScheduleData=[
                    'courseID'=>$courseID,
                    'cDay'=> $mon,
                    'cStartTime'=>$sTime,
                    'cEndTime'=>$eTime
                ];
                //Add course To Do
                if($registry->addSchedule($cScheduleData)){
                    $numClassUpdates++;

                }
                else{
                    header("Location: ../view/course_schedule.php?error=sqlerror1");
                    exit();
                }
            }

            if($i==1 && $tues!="No"){
                //Course Schedule Data
                $cScheduleData=[
                    'courseID'=>$courseID,
                    'cDay'=> $tues,
                    'cStartTime'=>$sTime,
                    'cEndTime'=>$eTime
                ];
                //Add course To Do
                if($registry->addSchedule($cScheduleData)){
                    $numClassUpdates++;

                }
                else{
                    header("Location: ../view/course_schedule.php?error=sqlerror1");
                    exit();
                }
            }

            if($i==2 && $wed!="No"){
                //Course Schedule Data
                $cScheduleData=[
                    'courseID'=>$courseID,
                    'cDay'=> $wed,
                    'cStartTime'=>$sTime,
                    'cEndTime'=>$eTime
                ];
                //Add course To Do
                if($registry->addSchedule($cScheduleData)){
                    $numClassUpdates++;

                }
                else{
                    header("Location: ../view/course_schedule.php?error=sqlerror1");
                    exit();
                }
            }

            if($i==3 && $thurs!="No"){
                //Course Schedule Data
                $cScheduleData=[
                    'courseID'=>$courseID,
                    'cDay'=> $thurs,
                    'cStartTime'=>$sTime,
                    'cEndTime'=>$eTime
                ];
                //Add course To Do
                if($registry->addSchedule($cScheduleData)){
                    $numClassUpdates++;

                }
                else{
                    header("Location: ../view/course_schedule.php?error=sqlerror1");
                    exit();
                }
            }

            if($i==4 && $fri!="No"){
                //Course Schedule Data
                $cScheduleData=[
                    'courseID'=>$courseID,
                    'cDay'=> $fri,
                    'cStartTime'=>$sTime,
                    'cEndTime'=>$eTime
                ];
                //Add course To Do
                if($registry->addSchedule($cScheduleData)){
                   
                    $numClassUpdates++;
                }
                else{
                    header("Location: ../view/course_schedule.php?error=sqlerror1");
                    exit();
                }
            }
        }
        if($numClassUpdates>0){
            echo '<script>alert("Well Done. You added a schedule to this course successfully")</script>';
            echo '<script>window.location.href = "../view/cschedule_inquiry.php";</script>';
            exit();

        }
        else{
            header("Location: ../view/course_schedule.php?error=sqlerror1");
            exit();
        }
        
        
    }
}

?>