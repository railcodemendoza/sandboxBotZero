<?php include('../db.php'); ?>

<?php include('../fijos/headerdirect.php'); ?>

<?php include('../fijos/Pannel_right_header.php'); ?> <!-- estas son las que se modifican -->

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<?php include('../includes/user_basic/head_view_user_basic.php'); ?> <!-- estas son las que se modifican -->

<?php 

$id_cntr = $_GET['id_cntr'];
$query = "SELECT carga.id, carga.booking, carga.cliente, carga.vessel, carga.voyage, carga.unload_place, carga.final_point, carga.commodity, cntr.retiro_place, carga.oceans_line, cntr.cntr_type FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE cntr.id_cntr = '$id_cntr'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    $booking = $row['booking'];
    $cliente = $row['cliente'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $unload_place = $row['unload_place'];
    $final_point = $row['final_point'];
    $commodity = $row['commodity'];
    $retiro_place = $row['retiro_place'];
    $oceans_line = $row['oceans_line'];
    $cntr_type = $row['cntr_type'];
    $id = $row['id'];   
}

?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark p-3">
                    <h4 style="color:white; text-align:center;">Instructivo de Retiro</h4>
                                
                </div>   
                <div class="container">
                    <br>
                    <div class="row" >
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <br>
                            <h5>Booking: <strong><?php echo $booking; ?></strong> </h5>
                            <hr>
                            <h5>Tomadro de Reseva: <strong><?php echo $cliente; ?></strong> </h5>
                            <hr>
                            <h5>Buque: <strong><?php echo $vessel . ' - ' . $voyage; ?></strong> </h5>
                            <hr>
                            <h5>Puerto de Carga: <strong><?php echo $unload_place; ?></strong> </h5>
                            <hr>
                            <h5>Puerto de descarga: <strong><?php echo $final_point; ?></strong> </h5>
                            <hr>
                            <h5>Tipo de Contenedor: <strong><?php echo $cntr_type; ?></strong> </h5>
                            <hr>
                            <h5>commodity: <strong><?php echo $commodity; ?></strong> </h5>
                            <hr>
                            <h5>Deposito de Retiro:  <strong><?php echo $retiro_place; ?></strong> </h5>
                            <hr>
                            <h5>Armador:  <strong><?php echo $oceans_line; ?></strong> </h5>
                            <hr>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <br>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
            
                    </div>
                    <div class="col-sm-3">
                        <a href="https://botzero.ar/api/imprimirVacio?id_cntr=<?php echo $id_cntr ;?>" class="btn btn-outline-primary">
                            Descargar en PDF
                        </a>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">
            
                    </div>
                    <div class="col-sm-3">
                       
                        <a href="../includes/view_carga_user.php?id=<?php echo $id ;?>#detallecntr" class="btn btn-outline-secondary">
                            Volver
                        </a>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
            </section>
        </aside>
    </div>
    <div class="col-md-2"></div>
</div>
<br>
<br>

<?php include('../fijos/footerdirect.php'); ?>