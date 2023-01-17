<?php
include_once "layouts/header.php";
include_once "controller/patientsController.php";

$patients_controller = new PatientsController();
$result = $patients_controller->getPatients();
var_dump($result);
?>
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        
                        
                    </div>
                </main>
<?php
    include_once 'layouts/footer.php';
?>