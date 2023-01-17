<?php
    ob_start();
    session_start();
    include_once "controller/specializationController.php";

    $special_controller = new SpecializationController();
    $id = $_GET['id'];
    $result = $special_controller->deleteSpecialization($id);

    if($result){
        header("location:specializations.php");
    }else{
        $_SESSION['message']="You can't delete";
        header("location:specializations.php");
    }
?>