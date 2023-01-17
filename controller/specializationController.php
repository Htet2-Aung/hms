<?php
    include_once __DIR__."/../model/specializations.php";

    class SpecializationController extends Specialization{

            public function getSpecialilizations(){
                $specialities = $this->getSpecialities();//$this from extend //$result from Specialization
                return $specialities;
            }
            
            public function addSpecialization($name,$parent){
                $special = $this->addSpecial($name,$parent);
                return $special;
            }
            public function getSpeciality($id){
                $speciality = $this->getSpecialityInfo($id);
                return $speciality;
            }
            public function updateSpecialization($id,$name,$parent){
                $speciality = $this->updateSpecialityInfo($id,$name,$parent);
                return $speciality;
            }
            public function deleteSpecialization($id){
                $special = $this->deleteSpeciality($id);
                return $special;
            }
    }
?>