<?php
    class Student{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Students
        public function addStudent($data){
            //Prepare Query
            $this->db->query('insert into Students(StudentName, industry, pDescription, totalInflow, totalOutflow) values(:StudentName, :industry, :pDescription, :totalInflow, :totalOutflow)');

            // Bind Values
            $this->db->bind(':StudentName', $data['StudentName']);
            $this->db->bind(':industry', $data['industry']);
            $this->db->bind(':pDescription', $data['pDescription']);
            $this->db->bind(':totalInflow', $data['totalInflow']);
            $this->db->bind(':totalOutflow', $data['totalOutflow']);
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
            $this->db->query('select StudentID from Students where StudentName="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets Students
        public function getStudents(){
            //Prepare Query
            $this->db->query('select * from Students');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets some Students
        public function getSomeStudents($pID){
            //Prepare Query
            $this->db->query('select * from Students where StudentID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Student duration
        public function addStudentDuration($data){
            //Prepare Query
            $this->db->query('insert into Student_duration(startTime, endTime, duration) values(:startTime, :endTime, :duration)');

            // Bind Values
            $this->db->bind(':startTime', $data['startTime']);
            $this->db->bind(':endTime', $data['endTime']);
            $this->db->bind(':duration', $data['duration']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets StudentDurationID
        public function getStudentDuration($projID){
            //Prepare Query
            $this->db->query('select * from Student_duration where projDurationID='.$projID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>