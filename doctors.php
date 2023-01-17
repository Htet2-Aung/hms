<?php
include_once "layouts/header.php";
include_once "controller/doctorController.php";
include_once "controller/specializationController.php";

$spec_controller = new SpecializationController();
$special = $spec_controller->getSpecialilizations();

$doctors = new DoctorController();
$result = $doctors->getDoctorInfo();


?>
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <a href="create_doctors.php" class="btn btn-dark ms-auto">Add New Doctor</a>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Specialization Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                       <?php
                                            for ($row=0; $row <count($result) ; $row++) { 
                                                echo "<tr>";
                                                echo "<td>".($row+1)."</td>";
                                                for ($i=0; $i <count($special) ; $i++) { 
                                                    if($result[$row]['specialization_id']==$special[$i]['id']){
                                                        echo "<td>".$special[$i]['specialization']."</td>";
                                                    }
                                                }
                                                
                                                echo "<td>".$result[$row]['name']."</td>";
                                                echo "<td>".$result[$row]['email']."</td>";
                                                echo "<td>".$result[$row]['address']."</td>";
                                                echo "<td>".$result[$row]['phone']."</td>";
                                                echo "<td id=".$result[$row]['id']."><a href='' class='btn btn-warning mx-3'>Edit</a>";
                                                echo "<a class='btn btn-danger delete'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                       ?>                 
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </main>
<?php
    include_once 'layouts/footer.php';
?>
                