<?php
    include_once __DIR__."/../includes/db.php";
    class User{
        private $cont;

        public function getuser(){
             //1.Connection
             $this->cont = Database::connect();
             $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

             //2.sql
             $sql = "select * from users";

             //3.prepare sql -> statement
             $statement = $this->cont->prepare($sql);

             //4.execute
             $statement->execute();

             $result = $statement->fetchAll(PDO::FETCH_ASSOC); //key:column name
             return $result;
        }
    }
?>