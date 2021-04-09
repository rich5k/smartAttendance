<?php
    class Registry{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Registry
        public function addRegistry($data){
            //Prepare Query
            $this->db->query('insert into registry(fname, lname, email, password) values(:fname, :lname, :email, :password)');

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

        //gets last inserted Registry
        public function getLastRegistryID($pName){
            //Prepare Query
            $this->db->query('select registryID from registry where fname="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets registry
        public function getRegistry(){
            //Prepare Query
            $this->db->query('select * from registry');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Course
        public function addCourse($data){
            //Prepare Query
            $this->db->query('insert into courses(cName, cCode) values(:cName, :cCode)');

            // Bind Values
            $this->db->bind(':cName', $data['cName']);
            $this->db->bind(':cCode', $data['cCode']);

            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        // gets Courses
        public function getCourses(){
            //Prepare Query
            $this->db->query('select * from courses ');

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
        }

        //gets Course Code
        public function getCourseCode($data){
            //Prepare Query
            $this->db->query('select * from courses where cCode= :cCode');

           // Bind Values
           $this->db->bind(':cCode', $data['cCode']);
           

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


        //gets Registry email
        public function getRegistryEmail($data){
            //Prepare Query
            $this->db->query('select * from registry where email= :email');

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

        //gets the Registry details
        public function getRegistryDetails($data){
            //Prepare Query
            $this->db->query('select * from registry where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets some registry
        public function getSomeRegistry($pID){
            //Prepare Query
            $this->db->query('select * from registry where registryID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Registry Course
        public function addRegistryCourse($data){
            //Prepare Query
            $this->db->query('insert into reg_course(registryID, courseID) values(:registryID, :courseID)');

            // Bind Values
            $this->db->bind(':registryID', $data['registryID']);
            $this->db->bind(':courseID', $data['courseID']);
            
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets RegistryCourseID
        public function getRegistryCourse($rcID){
            //Prepare Query
            $this->db->query('select * from reg_course where reg_courseID='.$rcID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>