<?php
    include_once __DIR__."/../model/patients.php";
    
    class PatientsController extends Patients{
        public function getPatients(){
            $patient_info = $this->getPatientInfo();
            return $patient_info;
        }

    }
 ?>