<?php
    if(isset($_POST['statusCheck'])){
        require_once '../controller/database.php';
        require_once '../models/Student.php';
        require_once '../models/Registry.php';
        require_once '../models/Database.php';
        session_start();
        $output ='';
        $status=$_POST["statusCheck"];

        date_default_timezone_set('Europe/London');
        $date = date('Y-m-d', time());
        // Instantiate Student
        $student= new Student();
        $courseID= $_SESSION['courseID'];
        $studID= $_SESSION['sessionId'];
        $courses= $student->getSomeCourses($courseID);
        // Instantiate Registry
        $registry= new Registry();
        $cSchedules= $registry->getSomeSchedule($courseID);
        $sTime=0;
        foreach($cSchedules as $cSchedule){
            if(date('l')==$cSchedule->cDay){
                $sTime=$cSchedule->cStartTime;
                break;
            }
            
        }

        if($status=="class ended"){
            $attendChecks= $student->getAttendCheck($studID, $courseID);
            $present=0;
            $studHistoryData=[];
            $AttendCheckData=[];
            foreach($attendChecks as $attendCheck){
                if($attendCheck->attendStatus=="present"){
                    $present++;

                }
            }
            if($present<2){
                $studHistoryData=[
                    "studentID"=>$studID,
                    "courseID"=>$courseID,
                    "classDate"=> $date,
                    "sTime"=> $sTime,
                    "attendStatus"=> 'absent'
                ];
            }
            else{
                $studHistoryData=[
                    "studentID"=>$studID,
                    "courseID"=>$courseID,
                    "classDate"=> $date,
                    "sTime"=> $sTime,
                    "attendStatus"=> 'present'
                ];
            }
            if($student->addStudentHistory($studHistoryData)){
                $AttendCheckData=[
                    "studentID"=>$studID,
                    "courseID"=>$courseID
                    
                ];
                if($student->deleteAttendCheck($AttendCheckData)){
                    $attendChecks= $student->getAttendCheck($studID, $courseID);
                    $output.='
                    <h3>'.$courses->cName.'</h3>
                    <p>
                        <div class="row">
                            <div class="col-lg-4">
                                Time
                            </div>
                            <div class="col-lg-4">
                                Status
                            </div>
                            <div class="col-lg-4">
                                Action
                            </div>
                        </div>
                    ';
                    $count=1;
                        
                    foreach($attendChecks as $attendCheck){
                        $output.='
                        <div class="row">
                            <div class="col-lg-4">
                            '.$count.'. '.$attendCheck->cTime.'
                            </div>';
                            if($attendCheck->attendStatus=="present"){
                                $output.='
                                    <div class="col-lg-4">
                                    <span class="present-status">'.$attendCheck->attendStatus.'</span>
                                </div>
                                <div class="col-lg-4">
                                ';
                            }else{
                                $output.='
                                <div class="col-lg-4">
                                    <span class="absent-status">'.$attendCheck->attendStatus.'</span>
                                </div>
                                <div class="col-lg-4">
                                ';
                            }
                            
                            if($attendCheck->attendStatus=="present" || $attendCheck->attendStatus=="absent"){
                                $output.='
                                <button type="button" class="btn btn-primary check" data-toggle="modal" data-target="#staticBackdrop" disabled>
                                    Check attendance
                                    </button>
                                </div>
                            </div>
                            ';
                            }
                            else{
                                $output.='
                                <button type="button" class="btn btn-primary check" data-toggle="modal" data-target="#staticBackdrop">
                                    Check attendance
                                    </button>
                                </div>
                            </div>
                            ';
                            }
                        $count++;
                    }
                }
            }
        }

        
        

        echo $output;
    }
?>