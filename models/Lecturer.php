<?php
    class Lecturer{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds lecturers
        public function addLecturer($data){
            //Prepare Query
            $this->db->query('insert into lecturers(fname, lname, email, password) values(:fname, :lname, :email, :password)');

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

        //gets last inserted Lecturer
        public function getLastLecturerID($pName){
            //Prepare Query
            $this->db->query('select lecturerID from lecturers where fname="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets lecturers
        public function getLecturers(){
            //Prepare Query
            $this->db->query('select * from lecturers');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets Lecturer email
        public function getLecturerEmail($data){
            //Prepare Query
            $this->db->query('select * from lecturers where email= :email');

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

        //gets the Lecturer details
        public function getLecturerDetails($data){
            //Prepare Query
            $this->db->query('select * from lecturers where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets the Lecturer details
        public function getLecturerDetails2($data){
            //Prepare Query
            $this->db->query('select * from lecturers where fname = :fname and lname= :lname');

            // Bind Values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets some lecturers
        public function getSomeLecturers($pID){
            //Prepare Query
            $this->db->query('select * from lecturers where lecturerID='.$pID);

                     
            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets some courses
        public function getSomeCourses($pID){
            //Prepare Query
            $this->db->query('select * from courses where courseID='.$pID);

                     
            //Fetch All records
            $results=$this->db->single();
            return $results;
            
        }

        //adds Lecturer Course
        public function addLecturerCourse($data){
            //Prepare Query
            $this->db->query('insert into lect_course(lecturerID, courseID) values(:lecturerID, :courseID)');

            // Bind Values
            $this->db->bind(':lecturerID', $data['lecturerID']);
            $this->db->bind(':courseID', $data['courseID']);
            
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets LecturerCourse
        public function getLecturerCourse($lectID){
            //Prepare Query
            $this->db->query('select * from lect_course where lecturerID='.$lectID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Lecturer History
        public function addLecturerHistory($data){
            //Prepare Query
            $this->db->query('insert into lect_chistory(lecturerID, courseID, classDate, sTime) values(:lecturerID, :courseID, :classDate, :sTime)');

            // Bind Values
            $this->db->bind(':lecturerID', $data['lecturerID']);
            $this->db->bind(':courseID', $data['courseID']);
            $this->db->bind(':classDate', $data['classDate']);
            $this->db->bind(':sTime', $data['sTime']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets LecturerHistory
        public function getLecturerHistory($lectID, $courseID){
            //Prepare Query
            $this->db->query('select * from lect_chistory where lecturerID='.$lectID.' and courseID='.$courseID );

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Class Timer
        public function addClassTimer($data){
            //Prepare Query
            $this->db->query('insert into class_timer(lecturerID, courseID, duration, checknum) values(:lecturerID, :courseID, :duration, :checknum)');

            // Bind Values
            $this->db->bind(':lecturerID', $data['lecturerID']);
            $this->db->bind(':courseID', $data['courseID']);
            $this->db->bind(':duration', $data['duration']);
            $this->db->bind(':checknum', $data['checknum']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets ClassTimer
        public function getClassTimer($lectID, $courseID){
            //Prepare Query
            $this->db->query('select * from class_timer where lecturerID='.$lectID.' and courseID='.$courseID );

                     
            //Fetch All records
            $results=$this->db->single();
            return $results;
            
        }
    }
?>