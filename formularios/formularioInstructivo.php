<?php include("../db.php"); ?>

<?php

$cntr_number = $_GET['cntr_number'];
$id_cntr = $_GET['id_cntr'];

if($cntr_number == "" ){

    $_SESSION['message'] = 'para ir a Instrcutivo de carga debe informar número de Contenedor.';
    $_SESSION['message_type'] = 'danger';

    header('location:../formularios/formularioderetiro.php?id_cntr='. $id_cntr);

    
}else{

$query = "SELECT * FROM cntr INNER JOIN carga INNER JOIN `asign` ON cntr.booking = carga.booking AND asign.cntr_number = cntr.cntr_number WHERE cntr.cntr_number = '$cntr_number'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    $query_id= "SELECT id FROM carga INNER JOIN CNTR ON carga.booking = cntr.booking WHERE cntr.cntr_number = '$cntr_number'";
    $result_id = mysqli_query($conn, $query_id);

    if (mysqli_num_rows($result_id) == 1) {
      $row = mysqli_fetch_array($result_id);
      $id = $row['id'];}
    
        $_SESSION['message'] = 'Primero hay que asignar unidad a '. $cntr_number;
        $_SESSION['message_type'] = 'danger';
        header('Location:' . getenv('HTTP_REFERER')); // volver  
    }
    
    if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $booking = $row['booking'];
    $shipper = $row['shipper'];
    $cntr_number = $row['cntr_number'];
    $cntr_type = $row['cntr_type'];
    $retiro_place = $row['retiro_place'];
    $net_weight = $row['net_weight'];
    $load_date = $row['load_date'];
    $load_place = $row['load_place'];
    $direccion_de_carga = 'Corredor de las Aguilas.';
    $document_invoice = $row['document_invoice'];
    $document_packing = $row['document_packing'];
    $custom_place = $row['custom_place'];
    $custom_agent = $row ['custom_agent'];
    $vessel = $row['vessel'];
    $cut_off_fis = $row ['cut_off_fis'];
    $oceans_line = $row['oceans_line'];
    $unload_place = $row['unload_place'];
    $final_point = $row['final_point'];
    $commodity = $row['commodity'];
    $transport = $row['transport'];
    $transport_agent = $row['transport_agent'];
    $voyage = $row['voyage'];
    $type = $row['type'];


    ?>

<?php include('../fijos/header.php'); ?>

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php include('../includes/user_basic/head_view_user_basic.php'); ?>
    
<?php } 
}?>
    
<form action="../formularios/save_instructivo.php?cntr_number=<?php echo $cntr_number; ?>" method="POST" id="form_insert">
         
        <div class="content" style="background: linear-gradient(to left, #17A589, #2E303E );" >
            <div class="animated fadeIn">
                <div class="row">              
                    <div class="col-lg-12">
                        <div class="card">
                            <div style="text-align:center;" class="card-header">
                                Datos que contendrá el Instructivo | <?php echo $type; ?> </div>
                                <div style="padding-bottom: 0.25rem; background: #EFF2F3;" class="card-body card-block">
                                <div class="row pb-2">
                                       <div class="col-lg-2"></div>
                                       <div class="col-lg-4">
                                           <h4><strong>Booking </strong> | <?php echo $booking ?></h4>
                                           <hr style="margin: 0.5rem;">
                                        </div>
                                        <div class="col-lg-4">
                                           <h4><strong>Contenedor: </strong> | <?php echo $cntr_number ?></h4>
                                           <hr style="margin: 0.5rem;">
                                        </div>
                                        <hr>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-3">
                                        <h4><strong>Tipo de Contenedor </strong> | <?php echo $cntr_type; ?></h4>
                                        
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>Peso Neto</strong> | <?php echo $net_weight; ?> TONS</h4>
                                    </div>
                                </div>
                                <hr style="margin: 0rem 0 1.5rem 11.5rem; width:40%;">
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Lugar de Retiro </strong> | <?php echo $retiro_place; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-3">
                                        <h4><strong>Día de Carga </strong>| <?php echo $load_date; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>Lugar de Carga </strong>| <?php echo $load_place; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-7">
                                        <h4><strong>Direccion de Carga </strong>| <?php echo $direccion_de_carga; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Shipper </strong>| <?php echo $shipper; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Numero de factura </strong>| <?php echo $document_invoice; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-2">
                                        <h4><strong>Aduana </strong>| <?php echo $custom_place; ?></h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>Despachante </strong>| <?php echo $custom_agent; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Vessel </strong> | <?php echo $vessel . " - " . $voyage; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                        </div>
                                        <div class="col-lg-4">
                                        <h4><strong>Armador  </strong> | <?php echo $oceans_line; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                    
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Cut-off-físico </strong>| <?php echo $cut_off_fis; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>Puerto de Carga </strong> | <?php echo $unload_place; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-3">
                                        <h4><strong>Destino Final </strong> | <?php echo $final_point; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>Commodity </strong> | <?php echo $commodity; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                </div>
                                <div class="row pb-2">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4">
                                        <h4><strong>Transporte </strong> |<?php echo $transport; ?></h4>
                                        <hr style="margin: 0.5rem;">
                                    </div>
                                    <div class="col-lg-4">
                                        <h4><strong>ATA </strong>| <?php echo $transport_agent; ?></h4>
                                    </div>
                                </div>
                                <br> 
                            </div>
                        </div>
                    <div class="col-lg-12">
                        <form action="'../formularios/save_instructivo.php?cntr_number='<?php echo $cntr_number;?>" method="POST">
                        <div style=" background: #EFF2F3;" class="card">
                        <div style="text-align:center;" class="card-header">
                                Instrucciones de Tráfico:
                        </div>
                            <div style=" background: #EFF2F3;" class="card-body card-block">
                                <div action="#" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Agencia de Ingreso:</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="agent_port[]" id="selectSm" class="form-control-sm form-control" >
                                                    <option value="">.-Seleccionar agencia.-</option>     
                                                    <?php
                                                                
                                                        

                                                        $query_agent_port = $conn -> query ("SELECT * FROM `agencias`");
                                                            while ($agent_port= mysqli_fetch_array($query_agent_port)) {                                           
                                                                echo '<option value="'.$agent_port['description'].'">'.$agent_port['description'].'</option>';
                                                            }  
                                                    ?>
                                                </select>
                                                <input type="hidden" name="transporte" value="<?php echo $transport; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2">
                                            <label for="textarea-input" class=" form-control-label">Observaciones:</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                           <textarea name="observation_load" id="" class=" form-control" placeholder="Comentarios" cols="100" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div style=" background: #EFF2F3;" class="card">
                        <div style="text-align:center;" class="card-header">
                               Acuerdo Comercial:
                            </div>
                            <div style=" background: #EFF2F3;" class="card-body card-block">
                            <br>
                                <div action="#" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <label for="city" class=" form-control-label">Facturar a:</label>
                                        </div>
                                        <div class="col-4">
                                            <select name="company_invoice_out[]" id="selectSm" class="form-control-sm form-control" >
                                                <option value="">.-Seleccionar Razon Social.-</option>     
                                                <?php
                                                    $query_rz = $conn -> query ("SELECT * FROM `razon_social`");
                                                        while ($rz= mysqli_fetch_array($query_rz)) {                                           
                                                            echo '<option value="'.$rz['title'].'">'.$rz['title'].'</option>';
                                                        }  
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="transporte" value="<?php echo $transport; ?>">    
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Tarifa:</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="text" placeholder="1500.00" name="out_usd" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="city" class="form-control-label">Modo de Pago:</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                            <select name="modo_pago_out[]" id="selectSm" class="form-control-sm form-control"  required>
                                                    <option value="">.-Seleccionar modo.-</option>     
                                                    <?php
                                                        $query_modos = $conn -> query ("SELECT * FROM `modos_de_pago`");
                                                            while ($modos= mysqli_fetch_array($query_modos)) {                                           
                                                                echo '<option value="'.$modos['title'].'">'.$modos['title'].'</option>';
                                                            }  
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="city" class=" form-control-label">Plazo:</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="plazo_de_pago_out[]" id="selectSm" class="form-control-sm form-control" required>
                                                    <option value="">.-Seleccionar plazo.-</option>     
                                                    <?php
                                                                
                                                        

                                                        $query_plazos = $conn -> query ("SELECT * FROM `plazos_de_pago`");
                                                            while ($plazos= mysqli_fetch_array($query_plazos)) {                                           
                                                                echo '<option value="'.$plazos['title'].'">'.$plazos['title'].'</option>';
                                                            }  
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div></div>
                                </div>
                            <div style=" background: #EFF2F3;">
                            <p style="text-align:center;"> Formulario realizado ingresado <span style="color:blue; text-transform: capitalize;" name='user'><?php echo $_SESSION['user'];?></span></p>
                            </div>  
                            <div style=" background: #EFF2F3; margin:20px;"  class="row">
                            <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit" name="save_instruction" class="btn btn-lg btn-info">
                                Instructivo
                            </button>
                            </form>
                            </div>        
                            <br>
                       
                    </div>
                 </div>
                           
                        </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    </form>

   <?php include('../fijos/footer.php')?>