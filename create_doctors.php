<?php
ob_start();
include_once "layouts/header.php";
include_once "controller/doctorController.php";
include_once "controller/specializationController.php";

$spec_controller = new SpecializationController();
$specialization = $spec_controller->getSpecialilizations();

$doctors = new DoctorController();


if(isset($_POST['add'])){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
    }
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
    }
    if(!empty($_POST['address'])){
        $address = $_POST['address'];
    }
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    $special = $_POST['special'];
    $result = $doctors->addDoctorInfo($name,$email,$address,$phone,$special);

    if( $result){
        header("location:doctors.php");
    }


}


?>
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                         <form action="" method="post">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" id="" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Specialization</label>
                                <select name="special" id="" class="form-select">
                                    <?php
                                        for ($i=0; $i < count($specialization); $i++) { 
                                           echo "<option value='".$specialization[$i]['id']."'>".$specialization[$i]['specialization']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mt-3">
                                    <button type="submit" name="add"  class="btn btn-dark">Add</button>
                            </div>
                            </div>
                         </form>
                        </div>
                        
                        
                    </div>
                </main>
<?php
    include_once 'layouts/footer.php';
?>