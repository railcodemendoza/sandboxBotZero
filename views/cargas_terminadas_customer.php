
<?php include('../db.php'); ?>

<?php include("../fijos/headerdirect.php") ?>

<?php include("../includes/customer/pannel_left_customer.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php

    
?>

<br>
<div class="container">
    
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Cargas Terminadas.
        </div>
        <div class="card-body card-block"> 

        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align:center;">
                    <tr>
                        <th>ID</th>
                        <th>Referencia</th>
                        <th>Booking</th>
                        <th>Shipper</th>
                        <th>Commodity</th>
                        <th>Customer</th>
                        <th>Detalle</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        $company = $_SESSION['company'];
                        $usuario = $_SESSION['user'];
                            $query = "SELECT * FROM carga WHERE empresa = '$company' AND status = 'TERMINADA'";
                            $result_tasks = mysqli_query($conn, $query);    

                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['ref_customer']; ?></td>
                                    <td><?php echo $row['booking']; ?></td>
                                    <td><?php echo $row['shipper']; ?></td>
                                    <td><?php echo $row['commodity']; ?></td>
                                    <td><?php echo $row['user']; ?></td>

                                <td  style="text-align:center;">
                                    <a title="Ver Carga" href="../includes/view_carga.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            } ?>
                    </tbody>
            </table>
        </div>
        <form action="../Report_Customer/misCargasTerminadas.php" method="POST">
        <div class="row">
            
                <div class="col-sm-5"></div>
                <div class="col-sm-2">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button> 
                </div>
                <div class="col-sm-5"></div>  
        </div> 
        </form> 
        <br> 
    </div>
</div>
<br>



<?php include('../fijos/footerdirect.php');?>

            