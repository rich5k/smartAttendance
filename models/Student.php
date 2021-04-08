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
            $this->db->bind(':duration', $data['duration']);
            

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
            $this->db->query('select * from stud_course where stud_courseID='.$scID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>