
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card"></div>
                    <div style="text-align: center;" class="card-header">
                        <strong class="card-title">Instrucciones</strong>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered"> 
                            <thead style="text-align: center;">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Booking</th>
                                    <th>Contenedor</th>
                                    <th>Commodity</th>
                                    <th>Transporte</th>
                                    <th>Chofer</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                                
                            <tbody>
                            <?php

                            $empresa = $_SESSION['company'];
                            $query = "SELECT asign.file_instruction, asign.id, carga.shipper, carga.booking, carga.commodity, cntr.cntr_number, cntr.company_invoice_out,  asign.transport, asign.driver, asign.created_at FROM `asign` INNER JOIN carga INNER JOIN cntr ON carga.booking = cntr.booking AND cntr.cntr_number = asign.cntr_number ORDER BY `asign`.`created_at` DESC" ;
                            $result_tasks = mysqli_query($conn, $query);      
                                while($row = mysqli_fetch_assoc($result_tasks)) { 
                                    
                                    $id =$row['id']; 
                                    $shipper =$row['shipper']; 
                                    $booking = $row['booking'];
                                    $coummodity = $row['commodity'];
                                    $cntr_number = $row['cntr_number'];
                                    $transport = $row['transport'];
                                    $driver = $row['driver'];
                                    $file_instruction = $row['file_instruction'];
                                    $company_invoice = $row['company_invoice_out'];

                                   

                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $shipper; ?></td>
                                        <td><?php echo $booking; ?></td>
                                        <td><?php echo $cntr_number; ?></td>
                                        <td><?php echo $coummodity; ?></td>
                                        <td><?php echo $transport; ?></td>
                                        <td><?php echo $driver; ?></td>
                                        
                                        <td  style="text-align:center; width:20%;">
                                        <a class="btn btn-primary" title="Enviar por correo" href="../formularios/enviar_mail.php?cntr_number=<?php echo $cntr_number;?>" >
                                            <i class="ri-mail-line"></i>
                                        </a>
                                        <a class="btn btn-secondary" title="Ver Instrucción" href="../formularios/save_instructivo.php?cntr_number=<?php echo $cntr_number;?>" style="color: white;">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-success" target="_blank" title="Whats App" href="../formularios/enviar_whatsApp.php?cntr_number=<?php echo $cntr_number;?>">
                                            <i class="ri-whatsapp-line"></i>
                                        </a>
                                        <a class="btn btn-danger" target="_blank" title="<?php echo $file_instruction;?>" href="http://botzero.ar/public/instructivos/<?php echo $booking?>/<?php echo $cntr_number?>/instructivo_<?php echo $booking?>_<?php echo $cntr_number?>.pdf"  class="btn btn-info">
                                        <i class="ri-file-download-line"></i>
                                        </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
