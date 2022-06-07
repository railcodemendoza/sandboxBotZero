
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>


<?php include("../includes/user_basic/pannel_left_user_basic.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php

$query_detalles_activas = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking WHERE cntr.main_status != 'NO ASIGNADA' AND cntr.main_status != 'ON BOARD' AND cntr.main_status != 'TERMINADA' ORDER BY cntr.created_at DESC";
$result_detalles_activas= mysqli_query($conn, $query_detalles_activas);
    
?>

<br>

<div class="container-fluid"> 
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Todas las Activas
        </div>
        <div class="card-body card-block"> 
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Booking</th>
                            <th>Cntr</th>
                            <th>Transporte</th>
                            <th>Commodity</th>
                            <th>Shipper</th>
                            <th>Cliente</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php while($row = mysqli_fetch_assoc($result_detalles_activas)) { ?>
                        <tr>
                        
                            <td><?php echo $row['booking']; ?></td>
                            <td><?php echo $row['cntr_number']; ?></td>
                            <td><?php echo $row['transport']; ?></td>
                            <td><?php echo $row['commodity']; ?></td>
                            <td><?php echo $row['shipper']; ?></td>
                            <td><?php echo $row['Empresa']; ?></td>
                            <td><?php echo $row['main_status']; }?></td>
                            
                        </tr>
                    </tbody>
                </table>   
         
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <form action="../report_cargas_activas.php" method="post">
                            <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button> 
                        </form>
                    </div>
                    <div class="col-sm-5"></div>
                </div>   
            </div>
        </div>
    </div>

<br>
<br>
<br>
<br>



<?php include('../fijos/footerdirect.php');?>
