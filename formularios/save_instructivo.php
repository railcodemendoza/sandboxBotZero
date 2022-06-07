<?php include("../db.php") ?>

<?php include("../fijos/header.php") ?>

<?php include("../includes/user_basic/pannel_left_user_basic.php")  ?>

<?php include("../fijos/Pannel_right_header.php") ?>


<?php include('../includes/user_basic/head_view_user_basic.php'); ?>


<?php

// me traigo la Info General de la Carga que no está en el fomulario.

$cntr_number = $_GET['cntr_number'];
$user = $_SESSION['user'];


if (isset($_POST['save_instruction'])){

    foreach ($_POST['agent_port'] as $agent_port);
    foreach ($_POST['modo_pago_out'] as $modo_pago_out); //cntr
    foreach ($_POST['plazo_de_pago_out'] as $plazo_de_pago_out); //cntr
    $observation_load = $_POST['observation_load']; // asign
    $out_usd = $_POST['out_usd']; // cntr
    $out_razon_social = $_POST['transporte'];
    
    // Actualizamos la asignacion. 
    $query = "UPDATE `asign` SET `agent_port`='$agent_port',`observation_load`='$observation_load' WHERE cntr_number = '$cntr_number'";
    mysqli_query($conn, $query);

    // Actualizamos el cntr

    // Cuanto tenemos en IN USD

    $query_in_usd = " SELECT SUM(in_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_in_usd = mysqli_query($conn, $query_in_usd);
    
      if (mysqli_num_rows($result_in_usd) == 1) {
          $row = mysqli_fetch_array($result_in_usd);
          $in_usd = $row['0'];
        }else{
          $in_usd = '0';
        }

    // Cuanto tenemos en OUT USD

    $query_out_usd = " SELECT SUM(out_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
    $result_out_usd = mysqli_query($conn, $query_out_usd);
    
        if (mysqli_num_rows($result_out_usd) == 1) {
            $row = mysqli_fetch_array($result_out_usd);
            $out_usd_pf = $row['0'];
        }else{
            $out_usd_pf = '0';
        }
        foreach ($_POST['company_invoice_out'] as $company_invoice_out); //asgin
        //asgin
    
    $profit = $in_usd - $out_usd_pf;

    $query_cntr = "UPDATE `cntr` SET `profit`='$profit',`out_usd`='$out_usd', `modo_pago_out`='$modo_pago_out',`plazo_de_pago_out`='$plazo_de_pago_out', `company_invoice_out` = '$company_invoice_out' WHERE cntr_number = '$cntr_number'";
    mysqli_query($conn, $query_cntr);

    $query_profit = "INSERT profit (`out_usd`, `cntr_number`, `out_razon_social`,`user`,`out_detalle`) VALUE ('$out_usd', '$cntr_number','$out_razon_social','$user','Flete Terrestre')";
    mysqli_query($conn, $query_cntr);

}

$query = "SELECT agencias.observation_gral, asign.id, carga.custom_place, carga.load_date, carga.booking, carga.shipper, carga.commodity, carga.load_place, carga.unload_place, carga.cut_off_fis, carga.oceans_line, carga.vessel, carga.voyage, carga.final_point, carga.custom_agent, carga.ref_customer, cntr.cntr_number, cntr.cntr_seal, cntr.cntr_type, cntr.net_weight, cntr.retiro_place, cntr.out_usd, cntr.modo_pago_out, cntr.plazo_de_pago_out, asign.transport, asign.transport_agent, asign.observation_load, asign.agent_port, agencias.contact_name, agencias.contact_phone, agencias.contact_mail FROM carga INNER JOIN cntr INNER JOIN asign INNER JOIN agencias ON carga.booking = cntr.booking AND cntr.cntr_number = asign.cntr_number AND asign.agent_port = agencias.description WHERE cntr.cntr_number = '$cntr_number' ";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_array($result);
  
  $id_asgin = $row['id'];
  $booking = $row['booking'];
  $shipper = $row['shipper'];
  $commodity = $row['commodity'];
  $load_place = $row['load_place'];
  $unload_place = $row['unload_place'];
  $cut_off_fis = $row['cut_off_fis'];
  $oceans_line = $row['oceans_line'];
  $vessel = $row['vessel'];
  $voyage = $row['voyage'];
  $final_point = $row['final_point'];
  $custom_agent = $row['custom_agent'];
  $custom_place = $row['custom_place'];
  $ref_customer = $row['ref_customer'];
  $cntr_number = $row['cntr_number'];
  $cntr_seal = $row['cntr_seal'];
  $cntr_type = $row['cntr_type'];
  $net_weight = $row['net_weight'];
  $retiro_place = $row['retiro_place'];
  $transport = $row['transport'];
  $transport_agent = $row['transport_agent'];
  $observation_load = $row['observation_load'];
  $agent_port = $row['agent_port'];
  $out_usd = $row['out_usd'];
  $modo_pago_out = $row['modo_pago_out'];
  $plazo_de_pago_out = $row['plazo_de_pago_out'];
  $load_date = $row['load_date'];
  $contact_name = $row['contact_name'];
  $contact_phone = $row['contact_phone'];
  $contact_mail= $row['contact_mail'];
  $observation_gral= $row['observation_gral'];
}

?>

<div class="container">
    <div style="border-radius: 10px;" class="card border border-secondary">
        <div style="text-align:center;"class="card-header">
            Instructivo de Carga Operacion n° <?php echo $id_asgin;?>
        </div>
        <div  styele="text-align:center;"class="card-body">
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div style="text-align: center;" class="col-sm-4" >Datos de la Carga</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong>Booking:</strong> <?php echo $booking;?></h5>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                   <h5><strong>Commodity:</strong>  <?php echo $commodity; ?></h5> 
                   </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong> Shipper: </strong> <?php echo $shipper; ?></h5>
                    </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                  <h5> <strong> Número de CNTR:</strong> <?php echo $cntr_number; ?></h5>
                  </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
            <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                  <h5> <strong> Precinto:</strong> <?php echo $cntr_seal; ?></h5>
                  </div>
                <div class="col-sm-4"></div>
            <div class="row mb-2">
            </div>
            <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                   <h5> <strong> Tipo:</strong> <?php echo $cntr_type; ?> | <strong> PN de Carga: </strong> <?php echo $net_weight; ?>TONS</h5>
                   </div>
                <div class="col-sm-4"></div>
            </div> 
            
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                   <h5> <strong> Lugar de Retiro: </strong> <?php echo $retiro_place; ?></h5>
                   </div>
                <div class="col-sm-4"></div>
            </div> 
            <div class="row mb-2">
                <div class="col-sm-3"></div>
                    <div style="text-align: center;" class="col-sm-6 mb-2">
                        <h5> <strong> Lugar de Carga: </strong> <?php echo $load_place; ?> | <strong> Dia de Carga:</strong> <?php echo $load_date; ?></h5>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div style="text-align: center;" class="col-sm-4" >Aduana:</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row mb-2">
                <div class="col-sm-3"></div>
                <div style="text-align: center;" class="col-sm-6 mb-2">
                    <h5> <strong> Aduana: </strong> <?php echo $custom_place; ?> | <strong> Despachante:</strong> <?php echo $custom_agent; ?></h5>
                </div>
                <div class="col-sm-3"></div>
            </div> 
            <br> 
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div style="text-align: center;" class="col-sm-4" >Descarga:</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row mb-2">
                <div class="col-sm-3"></div>
                <div style="text-align: center;" class="col-sm-6 mb-2">
                        <h5> <strong> Puerto de Carga: </strong> <?php echo $unload_place; ?> | <strong>Cut Off Fisico: </strong><?php echo $cut_off_fis; ?></h5>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                        <h5<h5> <strong>Vessel: </strong> <?php echo $vessel . ' - ' . $voyage; ?></h5>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                    <div style="text-align: center;" class="col-sm-4 mb-2">
                        <h5> <strong> Destino Final: </strong> <?php echo $final_point; ?></h5>
                    </div>
                    <div class="col-sm-4"></div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                    <div style="text-align: center;" class="col-sm-4 mb-2">
                        <h5> <strong>Linea (Armador): </strong> <?php echo $oceans_line; ?> </h5>
                    </div>
                    <div class="col-sm-4"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div class="col-sm-4" style="text-align: center;" >Transporte Asignado</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                    <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong>Transporte: </strong> <?php echo $transport; ?></h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                    <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong>ATA: </strong><?php echo $transport_agent; ?></h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div class="col-sm-4" style="text-align: center;" >Ingreso a Puerto</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                    <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong> Agencia de Ingreso: </strong><?php echo $agent_port; ?></h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3"></div>
                    <div style="text-align: center;" class="col-sm-6 mb-2">
                    <h5> <strong> Contacto: </strong> <?php echo $contact_name; ?> | ph: <?php echo $contact_phone; ?> | mail: <?php echo $contact_mail; ?></h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div class="col-sm-4" style="text-align: center;" >Acuerdo Comercial:</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <br>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong>Tarifa: </strong><?php echo $out_usd; ?> </h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                   <h5> <strong> Modo de Pago: </strong> <?php echo $modo_pago_out; ?> </h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    <h5> <strong>Plazo:</strong> <?php echo $plazo_de_pago_out; ?></h5>
                </div>
            </div>
        
            <div class="row">
                <div class="col-sm-4"><hr></div>
                <div class="col-sm-4" style="text-align: center;" >Observaciones:</div>
                <div class="col-sm-4"><hr></div>
            </div>
            <div class="row">
            <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    Generales: 
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-2"></div>
                <div style="text-align: center;" class="col-sm-8 mb-2">
                    <p><?php echo $observation_load; ?></p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-4"></div>
                <div style="text-align: center;" class="col-sm-4 mb-2">
                    Para el Ingreso: 
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-2"></div>
                <div style="text-align: center;" class="col-sm-8 mb-2">
                    <p><?php echo $observation_gral; ?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3"></div>
                <div style="text-align: center;" class="col-sm-6">
                    Adjuntar el instructivo al momento de facturar. 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="text-align: center;" >
                    <!--a href="../formularios/enviar_whatsApp.php?cntr_number=<?php echo $cntr_number?>" target="_blank" class="btn btn-info">WhatsApp</a-->
                    <a href="http://botzero.ar/api/imprimirCarga?cntr_number=<?php echo $cntr_number?>" class="btn btn-info">Generar</a>
                    <a href="../views/view_instructivos.php"  class="btn btn-secondary">Instrucciones</a>
                    <!--a href="../formularios/enviar_mail.php?cntr_number=<?php echo $cntr_number?>" class="btn btn-info">E-mail</a-->
                </div>
                <div class="col-sm-3"></div>

            </div>
        
        </div>
    </div>
</div>

<?php include('../fijos/footerdirect.php'); ?>