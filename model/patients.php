<?php
    include_once __DIR__.'/../includes/db.php';
    class Patients{
        private $cont;
        public function getPatientInfo(){
            //1.Connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //2.sql
            $sql = "select * from patients";

            //prepare sql -> statement
            $statement = $this->cont->prepare($sql);
            
            //execute
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC); //key:column name
            return $result;

        }
    }
?>