<?php
if(isset($_POST['submit'])){
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Lecturer.php';
    require_once '../models/Registry.php';
    session_start();
    $duration= $_POST["duration"];
    $checks= (int)$_POST["checks"];
    $lectID= $_SESSION["sessionId"];
    $courseID= $_SESSION["courseID"];
    date_default_timezone_set('Europe/London');


    $classDate = date('Y-m-d ', time());
    $nTime= date('H:i:s', time());
    echo $classDate;
    echo $nTime;
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

            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
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
    
            
            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
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
    
            
            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
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
    
            
            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
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
    
            
            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
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
    
            
            $classHistory=[
                'lecturerID'=>$lectID,
                'courseID'=>$courseID,
                'classDate'=>$classDate,
                'sTime'=>$nTime
            ];
    
            // Instantiate Registry
            $registry= new Registry();
            $cSchedules= $registry->getSomeSchedule($courseID);
            $count= 0;
            foreach($cSchedules as $cSchedule){
                if(date('l')==$cSchedule->cDay){
                    if($nTime>=$cSchedule->cStartTime && $nTime<=$cSchedule->cEndTime){
                        //Add class timer To Do
                        if($lecturer->addClassTimer($classTimerData)){
                            if($lecturer->addLecturerHistory($classHistory)){
                                echo '<script>alert("Well Done. You have set a timer for the course successfully")</script>';
                                echo '<script>window.location.href = "../view/lecturer_cclass.php";</script>';
                                exit();

                            }
                
                        }
                        else{
                            header("Location: ../view/lecturer_sclass.php?error=sqlerror1");
                            exit();
                        }
                    }
                    else{
                        echo '<script>alert("Not Time for class. Pls see Registry")</script>';
                        echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                        exit();
                    }
                }
                $count++;
            }
            if($count>3){
                echo '<script>alert("No class today. Pls see Registry")</script>';
                echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                exit();
            }
        }
    }
}

?>