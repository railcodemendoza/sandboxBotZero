<?php

include("../db.php"); // aca me traigo la base de datos. 


if  (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  $id = $_GET['id'];
 
  $query_carga = "SELECT shiiper,  FROM `carga` inner join cntr where id = $id";
  $datos_carga = mysqli_query($conn, $query_carga);
  if (mysqli_num_rows($datos_carga) == 1) {
    $row = mysqli_fetch_array($datos_carga);
        $shipper = $row['shipper'];
        $booking = $row['booking'];
        $commodity = $row['commodity'];
        $Cliente = $row['Cliente'];
        $load_place = $row['load_place'];
        $load_date = $row['load_date'];
        $unload_place = $row['unload_place'];
        $cut_off_fis = $row['cut_off_fis'];
        $oceans_line = $row['oceans_line'];
        $vessel = $row['vessel'];
        $voyage = $row['voyage'];
        $final_point = $row['final_point'];
        $ETA = $row['ETA'];
        $ETD = $row['ETD'];
        $consignee = $row['consignee'];
        $notify = $row['notify'];
        $custom_place = $row['custom_place'];
        $custom_agent = $row['custom_agent'];
        $ref_customer = $row['ref_customer'];
        $observation_customer = $row['observation_customer'];
        $retiro_place =$row ['retiro_place'];
    }


  $query = "SELECT * FROM cntr where 'booking'='$booking'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    
    
    $document_invoice = $row['document_invoice'];
    $document_packing = $row['document_packing'];  }
  }

  setcookie("booking",$booking);
  

   
?>

<?php include('../fijos/header.php'); ?>

<?php include('../includes/pannel_left_customer.php'); ?>

<?php include('../includes/Pannel_right_header.php'); ?>

<?php include('../includes/header_formularios.php'); ?>
    
    <form action="../formularios/generar_instructivo.php" method="POST">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">              
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Formulario para Retiro de Vacios</strong></div>
                              <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img style="height: 100px;" src="../images/favicon.png" alt="">
                                    </div>
                                    <div style="padding:50px; "class="row form-group">
                                        <h1>Instruccion GATE OUT</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col">
                            <div style="padding: 2% 5%; max-width: 50%; margin:0 25%;" class="card">
                                <div class="card-body text-primary">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Booking: </label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $booking; ?></p>
                                    </div> 
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Tomador de Reserva:</label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $Cliente; ?></p>
                                    </div> 
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Vesel:</label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $vessel; ?></p>
                                    </div> 
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Puerto de Carga: </label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $unload_place; ?></p>
                                    </div> <div class="row">
                                        <label for="company" class=" form-control-label">Puerto de Descarga:</label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $final_point; ?></p>
                                    </div> <div class="row">
                                        <label for="company" class=" form-control-label">Cantidad: </label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo 'Cantidad'; ?></p>
                                    </div> <div class="row">
                                        <label for="company" class=" form-control-label">Commodity:</label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $commodity; ?></p>
                                    </div> <div class="row">
                                        <label for="company" class=" form-control-label">Lugar de Retiro: </label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $retiro_place; ?></p>
                                    </div> <div class="row">
                                        <label for="company" class=" form-control-label">Armador: </label>
                                        <p style="margin-left: 5%;" class="form-control-static"> <?php echo $oceans_line; ?></p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>                          
    </form>
<?php 

   

    ?>
  