<?php
ob_start();
include_once "layouts/header.php";
include_once "controller/specializationController.php";

$spec_controller = new SpecializationController();
$result = $spec_controller->getSpecialilizations();

if(isset($_POST['add'])){
    if(!empty($_POST['name']))
    {
        $name = $_POST['name'];
    }
    $parent = $_POST['parent'];
    $result = $spec_controller->addSpecialization($name,$parent);
    if($result){
        header("location:specializations.php");
    }
}

?>
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                            <a href="specializations.php" class="btn btn-dark  ms-auto">Back</a>
                            </div>
                          <div class="row">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Specialization</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Parent</label>
                                    <select name="parent" id="" class="form-select">
                                        <?php
                                                echo "<option value='0'>No Parent</option>";
                                            for ($row=0; $row <count($result) ; $row++) { 
                                                if($result[$row]['parent']==0){
                                                    echo "<option value='".$result[$row]['id']."'>".$result[$row]['specialization']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="add"  class="btn btn-dark">Add</button>
                                </div>
                            </form>
                          </div>
                        </div>
                       

                       
                    </div>
                </main>
<?php
    include_once 'layouts/footer.php';
?>
                