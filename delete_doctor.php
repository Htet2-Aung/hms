<?php
    ob_start();
    
    include_once "controller/doctorController.php";

    $doc_controller = new DoctorController();
    $id = $_POST['id'];
    $result = $doc_controller->deletedoctor($id);
    if($result){
        echo "success";
    }else{
        echo "unsuccess";
    }
?>