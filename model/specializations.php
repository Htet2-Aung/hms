<?php

include_once __DIR__."/../includes/db.php";

    class Specialization{
        private $cont;
        public function getSpecialities(){
            //1.Connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //sql
            $sql = "select * from specialization";

            //prepare sql -> statement
            $statement = $this->cont->prepare($sql);

            //execute
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC); //key:column name
            return $result;
        }

        public function addSpecial($name,$parent){
             //1.Connection
             $this->cont = Database::connect();
             $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
             //sql
             $sql = "insert into specialization(specialization,parent) values(:name,:special)";
 
             //prepare sql -> statement
             $statement = $this->cont->prepare($sql);
              $statement->bindParam(":name",$name);
              $statement->bindParam(":special",$parent); 


             //execute
            if( $statement->execute()){
                return true;
            }
            else{
                return false;
            }
 
             
        }

        public function getSpecialityInfo($id){
             //1.Connection
             $this->cont = Database::connect();
             $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
             //sql
             $sql = "select * from specialization where id=:id";
 
             //prepare sql -> statement
             $statement = $this->cont->prepare($sql);
              $statement->bindParam(":id",$id);
              


             //execute
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC); //key:column name
            return $result;
        }
        
        public function updateSpecialityInfo($id,$name,$parent){
            //1.Connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //sql
            $sql = "update specialization set specialization=:name,parent=:parent where id=:id ";

            //prepare sql -> statement
            $statement = $this->cont->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":parent",$parent); 


            //execute
            return $statement->execute();
            

        }
        public function deleteSpeciality($id){

            try{
                //1.Connection
             $this->cont = Database::connect();
             $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
             //sql
             $sql = "delete from specialization where id=:id ";
 
             //prepare sql -> statement
             $statement = $this->cont->prepare($sql);
             $statement->bindParam(":id",$id);
             
             //execute
             return $statement->execute();
            }
            catch(PDOEXception $e){
                return false;
            }
        }
             
    }
?>