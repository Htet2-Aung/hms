<?php
session_start();
include_once "layouts/header.php";
include_once "controller/specializationController.php";

$spec_controller = new SpecializationController();
$result = $spec_controller->getSpecialilizations();

?>
           
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <?php
                                        if(isset($_SESSION['message']))
                                        echo '<span class="alert alert-danger">'.$_SESSION['message'].'</span>';
                                        session_destroy();
                                    ?>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-3">
                            <a href="create_specialization.php" class="btn btn-dark ms-auto">Add New Specialization</a>
                            </div>
                          
                        </div>
                        

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Specialization</th>
                                            <th>Parent</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for ($row=0; $row < count($result) ; $row++) { 
                                               echo "<tr>";
                                               echo "<td>".($row+1)."</td>";
                                               echo "<td>".$result[$row]['specialization']."</td>";
                                               if($result[$row]['parent']==0){
                                                echo "<td>-</td>";
                                               }
                                               else{
                                                for ($index=0; $index <count($result) ; $index++) { 
                                                   if($result[$row]['parent']==$result[$index]['id']){
                                                    echo "<td>".$result[$index]['specialization']."</td>";
                                                   }
                                                }
                                               }
                                               echo "<td><a href='edit_specialization.php?id=".$result[$row]['id']."' class='btn btn-warning mx-3'>Edit</a>";
                                               echo "<a href='delete_specialization.php?id=".$result[$row]['id']."' class='btn btn-danger'>Delete</a></td>";
                                               echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                      
                    </div>
                </main>
<?php
    include_once 'layouts/footer.php';
?>
                