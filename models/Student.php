<?php
    class Student{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds students
        public function addStudent($data){
            //Prepare Query
            $this->db->query('insert into students(fname, lname, email, password) values(:fname, :lname, :email, :password)');

            // Bind Values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets last inserted Student
        public function getLastStudentID($pName){
            //Prepare Query
            $this->db->query('select studentID from students where fname="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets the Student details
        public function getStudentDetails($data){
            //Prepare Query
            $this->db->query('select * from students where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets the Student details
        public function getStudentDetails2($data){
            //Prepare Query
            $this->db->query('select * from students where fname = :fname and lname= :lname');

            // Bind Values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }


        //gets students
        public function getStudents(){
            //Prepare Query
            $this->db->query('select * from students');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets some students
        public function getSomeStudents($pID){
            //Prepare Query
            $this->db->query('select * from students where studentID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets student email
        public function getStudentEmail($data){
            //Prepare Query
            $this->db->query('select * from students where email= :email');

           // Bind Values
           $this->db->bind(':email', $data['email']);
           

           //Execute
           $this->db->execute();
           

           //Fetch One record
           $numRows=$this->db->rowCount();
           if($numRows>0){
               return true;
           }
           else{
               return false;
           }
            
        }

        //adds Student duration
        public function addStudentCourse($data){
            //Prepare Query
            $this->db->query('insert into stud_course(studentID, courseID) values(:studentID, :courseID)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':courseID', $data['courseID']);
           
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets StudentCourseID
        public function getStudentCourse($scID){
            //Prepare Query
            $this->db->query('select * from stud_course where studentID='.$scID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets some students
        public function getSomeCourses($pID){
            //Prepare Query
            $this->db->query('select * from courses where courseID='.$pID);

                     
            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //adds AttendCheck
        public function addAttendCheck($data){
            //Prepare Query
            $this->db->query('insert into attendCheck(studentID, courseID, cTime, attendStatus) values(:studentID, :courseID, :cTime, :attendStatus)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':courseID', $data['courseID']);
            $this->db->bind(':cTime', $data['cTime']);
            $this->db->bind(':attendStatus', $data['attendStatus']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //update AttendCheck
        public function updateAttendCheck($data){
            //Prepare Query
            $this->db->query('update attendCheck set attendStatus=:attendStatus where studentID=:studentID and courseID=:courseID and cTime= :cTime');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':courseID', $data['courseID']);
            $this->db->bind(':cTime', $data['cTime']);
            $this->db->bind(':attendStatus', $data['attendStatus']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //delete AttendCheck
        public function deleteAttendCheck($data){
            //Prepare Query
            $this->db->query('delete from attendCheck where studentID=:studentID and courseID=:courseID ');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':courseID', $data['courseID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets AttendCheck
        public function getAttendCheck($studentID, $courseID){
            //Prepare Query
            $this->db->query('select * from attendCheck where studentID='.$studentID.' and courseID='.$courseID );

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets StudentHistory
        public function getStudentHistory($studentID, $courseID){
            //Prepare Query
            $this->db->query('select * from stud_chistory where studentID='.$studentID.' and courseID='.$courseID );

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //add StudentHistory
        public function addStudentHistory($data){
            //Prepare Query
            $this->db->query('insert into stud_chistory(studentID, courseID, classDate, sTime, attendStatus) values(:studentID, :courseID, :classDate, :sTime, :attendStatus)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':courseID', $data['courseID']);
            $this->db->bind(':classDate', $data['classDate']);
            $this->db->bind(':sTime', $data['sTime']);
            $this->db->bind(':attendStatus', $data['attendStatus']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }
        
    }
?>