<?php

include("../db.php"); // aca me traigo la base de datos. 


if  (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  $id = $_GET['id'];
  $query = "SELECT * FROM instruction INNER JOIN carga ON instruction.booking = carga.booking INNER JOIN cntr ON instruction.cntr_number = cntr.cntr_number WHERE instruction.id = $id;";
  $result = mysqli_query($conn, $query);
  
    $row = mysqli_fetch_array($result);

    $shipper = $row['shipper'];
    $booking = $row['booking'];
    $commodity = $row['commodity'];
    $load_place = $row['load_place'];
    $load_date = $row['load_date'];
    $unload_place = $row['unload_place'];
    $cut_off_fis = $row['cut_off_fis'];
    $oceans_line = $row['oceans_line'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $ETA = $row['ETA'];
    $ETD = $row['ETD'];
    $final_point = $row['final_point'];
    $custom_place = $row['custom_place'];
    $custom_agent = $row['custom_agent'];
    $ref_customer = $row['ref_customer'];
    $observation_customer = $row['observation_customer'];
    $cntr_number = $row['cntr_number'];
    $cntr_seal = $row['cntr_seal'];
    $cntr_type = $row['cntr_type'];
    $net_weight = $row['net_weight'];
    $retiro_place = $row['retiro_place'];
    $type_instruction = $row['type_instruction'];
    $invoice_number = $row['invoice_number'];
    $packing_number = $row['packing_number'];
    $transport = $row['transport'];
    $transport_agent = $row['transport_agent'];
    $port_agent = $row['port_agent'];
    $transport_driver = $row['transport_driver'];
    $mic_dta = $row['mic_dta'];
    $doc_mic_dta = $row['doc_mic_dta'];
    $crt = $row['crt'];
    $doc_crt = $row['doc_crt'];
    $out_usd = $row['out_usd'];
    $rs_invoice_out = $row['rs_invoice_out'];
    $modo_de_pago_out = $row['modo_de_pago_out'];
    $plazo_de_pago_out = $row['plazo_de_pago_out'];
    $observation_payment_out = $row['observation_payment_out'];
    $user_instruction = $row['user_instruction'];

        
    }



    include('../fijos/header.php'); ?>
        
    
            <div style="background: linear-gradient(to left, #17A589, #2E303E ); text-align:center" class="content">
                <div style="display:inline-block;" class="row m-0">
                        <h1 style="color: white; text-align:center;">Vista Previa Instructivo</h1>     
                            
                </div>
                <div style="max-width: 1190px; max-height: 1684px; margin-left: 5%;" id=instructivo class="animated fadeIn">
                    <div class="row">              
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="container">
                                    <div class="row">
                                        <div style="padding: 5%;" class="col-md-3">
                                            <img style="height: 100px;" src="../images/favicon.png" alt="">
                                        </div>
                                        <div style="padding:10%; " class="col-md-9">
                                                <h3><?php echo $type_instruction; ?></h3>
                                        </div>
                                    </div>                            
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="company" class=" form-control-label">Shipper: </label>
                                            <p style="margin-left: 3px;" class="form-control-static"> <?php echo $shipper; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label for="company" class=" form-control-label">Booking: </label>
                                            <p style="margin-left: 3px;" class="form-control-static"><?php echo $booking; ?></p>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Commodity: </label>
                                        <p style="margin-left: 3px;" class="form-control-static"><?php echo $commodity; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">DATOS DEL CONTENEDOR</label>
                                        <p style="margin-left: 3px;" class="form-control-static"><?php echo $cntr_type; ?></p>
                                    </div>
                                </div>
                                
                            <div style="padding-left:15px;"class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Numero: </label>
                                        <p><?php echo ': ' . $cntr_number; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p ><?php echo 'PRECINTO:' . $cntr_seal . " - TYPE:" . $cntr_type . " - PESO NETO:" . $net_weight . " TONS" ;?></p>
                                </div>
                            </div>

                            <hr>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Lugar de Carga: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $load_place; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Dia de Carga: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $load_date; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Lugar de Entrega: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $unload_place; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Cut Off Fisico: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $cut_off_fis; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Armador: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $oceans_line; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Vessel: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $vessel . ' - V:' . $voyage; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Destino Final:</label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $final_point; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">ETA: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $ETA; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">ETD: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $ETD; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Lugar de Aduana:  </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $custom_place; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Despachante: </label>
                                        <p style="margin-left: 5px;" class="form-control-static"><?php echo $custom_agent; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Factura:  </label>
                                        <p style="margin-left: 5px; padding-right:5px;" class="form-control-static"><?php echo $invoice_number; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Packing </label>
                                        <p style="margin-left: 5px; padding-right:5px;" class="form-control-static"><?php echo $packing_number;?></p>
                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Transporte:  </label>                                          
                                        <p> <?php echo $transport; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">ATA: </label>
                                        <p> <?php echo $transport_agent; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="padding-left:15px;" class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label">Agencia de Ingreso a puerto:  </label>                                          
                                        <p> <?php echo $port_agent; ?> </p>
                                    </div>
                                </div>
                            </div>
                        
                    <br>
                    <h4 style="background:gray; color: white; text-align:center; padding:3px;">Tarifa Acordada:</h4>
                    <br>
                    <div style="padding-left:15px;" class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label" style="padding:5px;">Tarifa Acordada:  </label>                                          
                                        <strong style="padding:5px;" >USD </strong><p style="padding:5px; font-size: 20px;"><?php echo $out_usd ;?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="company" class=" form-control-label" style="padding:5px;">Modo de Pago:</label>
                                        <p style="padding:5px;"> <?php echo " " . $modo_de_pago_out . ' (' . $plazo_de_pago_out. ")"; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="padding-left:15px;" class="row">
                            Observaciones:
                            </div>
                            <p style="padding:5px;"><?php echo $observation_payment_out ; ?> </p>
                            <p style="color:#03989e;">Instructivo creado por <strong style="color:blue; text-transform: capitalize;"><?php echo $user_instruction; ?></strong></p>
                            </div>   
                            
                        </div>
                        <div  style="margin-left: 40%; margin-right: 40%;">
                            <input class="btn btn-outline-primary" type="button" name="imprimir" value="Imprimir" onclick="window.print();">
                            <input class="btn btn-outline-primary" type="button" name="imprimir" value="E-mail">
                            <button class="btn btn-outline-primary"> <a href="https://api.whatsapp.com/send?phone=5492612128105&text=Me%20gustaría%20saber%20el%20precio%20del%20sitio%20web"> whatsapp</a></button>
                        </div>
           
        </div><!-- .animated -->
    </div><!-- .content -->
    </form>
