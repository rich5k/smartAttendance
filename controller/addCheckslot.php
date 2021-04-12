<?php
    if(isset($_POST['now_date'])){
        require_once '../controller/database.php';
        require_once '../models/Student.php';
        require_once '../models/Registry.php';
        require_once '../models/Database.php';
        session_start();
        $output ='';
        $nTime=$_POST["now_date"];

        // Instantiate Student
        $student= new Student();
        $courseID= $_SESSION['courseID'];
        $studID= $_SESSION['sessionId'];
        $courses= $student->getSomeCourses($courseID);

        // AttendCheck Data
        $AttendCheckData= [
            "studentID"=> $studID,
            "courseID"=> $courseID,
            "cTime"=> $nTime,
            "attendStatus"=> 'process'
        ];
        if($student->addAttendCheck($AttendCheckData)){
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
                    </div>
                    <div class="col-lg-4">
                        <span class="absent-status">'.$attendCheck->attendStatus.'</span>
                    </div>
                    <div class="col-lg-4">
                    ';
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

        echo $output;
    }
?>