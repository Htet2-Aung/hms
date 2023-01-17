<?php
    include_once  __DIR__."/../includes/db.php";

    class Doctors{
        private $cont;

        public function getDoctors(){

            //connection
            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //$sql
            $sql = "select * from doctors";

            //prepare statement
            $statement = $this->cont->prepare($sql);

            //execute()
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);//key:column name
            return $result;
        }

        public function addDoctor($name,$email,$address,$phone,$special){

            $this->cont = Database::connect();
            $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "insert into doctors(specialization_id,name,address,email,phone) values(:special,:name,:address,:email,:phone)";

            $statement = $this->cont->prepare($sql);
            $statement->bindParam(":special",$special);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":address",$address);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":phone",$phone);

           if($statement->execute()) {
            return true;
           }
           else{
            return false;
           }


        }
        public function deleteDoctorInfo($id){
            try{
                //1.Connection
             $this->cont = Database::connect();
             $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
             //sql
             $sql = "delete from doctors where id=:id ";
 
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