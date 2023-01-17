<?php
    include_once __DIR__."/../model/user.php";

    class UserController extends User{
        public function getPatientInfo(){
            $result = $this->getuser();
            return $result;
        }
    }
?>