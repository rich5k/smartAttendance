<?php
    class Registry{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Registrys
        public function addRegistry($data){
            //Prepare Query
            $this->db->query('insert into Registrys(RegistryName, industry, pDescription, totalInflow, totalOutflow) values(:RegistryName, :industry, :pDescription, :totalInflow, :totalOutflow)');

            // Bind Values
            $this->db->bind(':RegistryName', $data['RegistryName']);
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

        //gets last inserted Registry
        public function getLastRegistryID($pName){
            //Prepare Query
            $this->db->query('select RegistryID from Registrys where RegistryName="'.$pName.'"');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets Registrys
        public function getRegistrys(){
            //Prepare Query
            $this->db->query('select * from Registrys');

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets some Registrys
        public function getSomeRegistrys($pID){
            //Prepare Query
            $this->db->query('select * from Registrys where RegistryID='.$pID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds Registry duration
        public function addRegistryDuration($data){
            //Prepare Query
            $this->db->query('insert into Registry_duration(startTime, endTime, duration) values(:startTime, :endTime, :duration)');

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

        //gets RegistryDurationID
        public function getRegistryDuration($projID){
            //Prepare Query
            $this->db->query('select * from Registry_duration where projDurationID='.$projID);

                     
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>