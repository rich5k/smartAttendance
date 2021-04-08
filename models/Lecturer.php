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
            $this->db->query('select * from lecturer where email= :email');

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

        //gets some lecturers
        public function getSomeLecturers($pID){
            //Prepare Query
            $this->db->query('select * from lecturers where lecturerID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
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

        //gets LecturerCourseID
        public function getLecturerCourse($lcID){
            //Prepare Query
            $this->db->query('select * from Lecturer_course where lect_courseID='.$lcID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>