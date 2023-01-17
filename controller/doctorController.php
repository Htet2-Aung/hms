<?php
    include_once __DIR__.'/../model/doctors.php';

    class DoctorController extends Doctors{

        public function getDoctorInfo(){
            $doctors = $this->getDoctors();
            return $doctors;
        }

        public function addDoctorInfo($name,$email,$address,$phone,$special){
            $add_doctor = $this->addDoctor($name,$email,$address,$phone,$special);
            return $add_doctor;
        }
        public function deletedoctor($id){
            $delete_doctor = $this->deleteDoctorInfo($id);
            return $delete_doctor;
        }
    }
?>