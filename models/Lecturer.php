<?php
    class Lecturer{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Lecturers
        public function addLecturer($data){
            //Prepare Query
            $this->db->query('insert into Lecturers(LecturerName, industry, pDescription, totalInflow, totalOutflow) values(:LecturerName, :industry, :pDescription, :totalInflow, :totalOutflow)');

            // Bind Values
            $this->db->bind(':LecturerName', $data['LecturerName']);
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

        //gets last inserted Lecturer
        public function getLastLecturerID($pName){
            //Prepare Query
            $this->db->query('select LecturerID from Lecturers where LecturerName="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets Lecturers
        public function getLecturers(){
            //Prepare Query
            $this->db->query('select * from Lecturers');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets some Lecturers
        public function getSomeLecturers($pID){
            //Prepare Query
            $this->db->query('select * from Lecturers where LecturerID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Lecturer duration
        public function addLecturerDuration($data){
            //Prepare Query
            $this->db->query('insert into Lecturer_duration(startTime, endTime, duration) values(:startTime, :endTime, :duration)');

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

        //gets LecturerDurationID
        public function getLecturerDuration($projID){
            //Prepare Query
            $this->db->query('select * from Lecturer_duration where projDurationID='.$projID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>