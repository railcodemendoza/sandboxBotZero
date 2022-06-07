
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include("../includes/super_user/pannel_left_super_user.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php

    
?>

<br>
<div class="container">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Clientes
        </div>
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Razon Social</th>
                        <th>TaxID</th>
                        <th>Administración</th>
                        <th>Logistica</th>
                        <th>Provincia</th>
                        <th>Pais</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $empresa = $_SESSION['company'];
                $query = "SELECT * FROM `empresas`" ;
                $result_tasks = mysqli_query($conn, $query);      
                    
                    while($row = mysqli_fetch_assoc($result_tasks)) { 
                        
                        $id =$row['id']; 
                        $razon_social =$row['razon_social']; 
                        $cuit = $row['CUIT'];
                        $iibb = $row['IIBB'];
                        $mail_admin = $row['mail_admin'];
                        $mail_logistic = $row['mail_logistic'];
                        $name_admin = $row['name_admin'];
                        $name_logistic = $row['name_logistic'];
                        $cel_admin = $row['cel_admin'];
                        $cel_logistic = $row['cel_logistic'];
                        $direccion = $row['direccion'];
                        $ciudad = $row['Provincia'];
                        $country = $row['pais'];
                        $created_at = $row['created_at'];
                    
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $razon_social; ?></td>
                            <td><?php echo $cuit; ?></td>
                            <td><?php echo $name_admin; ?></td>
                            <td><?php echo $name_logistic; ?></td>
                            <td><?php echo $ciudad; ?></td>
                            <td><?php echo $country; ?></td>
                            
                            <td  style="text-align:center;">
                            <a title="Editar Cnee" data-toggle="modal" data-target="#editar<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Ver Cnee" data-toggle="modal" data-target="#ver<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a title="Eliminar" href="../includes/delete_cliente.php?id=<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-trash"></i>
                            </a>
                            
                            
                            </td>
                        </tr>
                <!-- Modal Editar -->
                <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Cliente <strong><?php echo $razon_social; ?></strong></h4>
                            </div>
                            <div class="modal-body">   
                                <form action="../formularios/edit_cliente.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label" for="">Razon Social:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="razon_social" value="<?php echo $razon_social; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">  
                                                <label class="form-control-label"  for="">CUIT:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="number" name="cuit" value="<?php echo $cuit; ?>">
                                                <p>(sin guiones)</p>
                                            </div>
                                            <div class="col-sm-2 pt-2">  
                                                <label class="form-control-label"  for="">IIBB:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="number" name="iibb" value="<?php echo $iibb; ?>">
                                                <p>(sin guiones)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                                <label class="form-control-label">Dirección:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; " type="text" name="direccion" value="<?php echo $direccion; ?>">
                                        </div>
                                        <div class="col-sm-1 pt-2">
                                            <label class="form-control-label">Ciudad:</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="text" name="ciudad" value="<?php echo $ciudad; ?>">
                                        </div>
                                        <div class="col-sm-1 pt-2">
                                            <label class="form-control-label">País:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="text" name="country" value="<?php echo $country; ?>">
                                        </div>
                                    </div>                
                                    <hr>
                                    <div class="form-group">
                                        <h4 style="text-align: center;">Contacto Logistica:</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                    <label class="form-control-label">Nombre:</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" style="margin-right: 1%; " type="text" name="name_logistic" value="<?php echo $name_logistic; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label">Celular:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="text" name="cel_logistic" value="<?php echo $cel_logistic; ?>">
                                                <p> Número plano ej: 542612128105</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label">Mail:</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="text" name="mail_logistic" value="<?php echo $mail_logistic; ?>">
                                            </div>
                                        </div>
                                    </div>   
                                    <hr>
                                    <div class="form-group">
                                        <h4 style="text-align: center;">Contacto Administración:</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                    <label class="form-control-label">Nombre:</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" style="margin-right: 1%; " type="text" name="name_admin" value="<?php echo $name_admin; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label">Celular:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="text" name="cel_admin" value="<?php echo $cel_admin; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label">Mail:</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="text" name="mail_admin" value="<?php echo $mail_admin; ?>">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="editar_cliente" class="btn btn-primary">Editar</button> 
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Modal Editar -->
                <!-- Modal Ver-->
                <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel"><strong><?php echo $razon_social; ?></strong></h4>
                            </div>
                            <div class="modal-body">   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3 pt-2">
                                                <h4>Razon Social:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                                <p><?php echo $razon_social; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-2">  
                                               <h4>CUIT:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                            <p><?php echo $cuit; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-2">  
                                               <h4>IIBB:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                            <p><?php echo $iibb; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-2">
                                                    <h4>Dirección:</h4>
                                            </div>
                                            <div class="col-sm-8">
                                                <p><?php echo $direccion .' - '. $ciudad .', '. $country; ?></p>
                                            </div>
                                        </div>
                                    </div>                
                                    <hr>
                                    <div class="form-group">
                                        <h4 style="text-align: center;">Contacto Logistica:</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                    <h4>Nombre:</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><?php echo $name_logistic; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <h4>Celular:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                                <p><?php echo $cel_logistic; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                               <h4>Mail:</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><?php echo $mail_logistic; ?></p>
                                            </div>
                                        </div>
                                    </div>   
                                    <hr>
                                    <div class="form-group">
                                        <h4 style="text-align: center;">Contacto Administración:</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                    <h4>Nombre:</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><?php echo $name_admin; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <h4>Celular:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                                <p><?php echo $cel_admin; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                               <h4>Mail:</h4>
                                            </div>
                                            <div class="col-sm-6">
                                               <p><?php echo $mail_admin; ?></p>
                                            </div>
                                        </div>
                                    </div>   

                                    <div class="row form-group">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                        </div>
                                        <div class="col-sm-5"></div>
                                    </div>            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Modal Editar -->
                <?php }   ?>
            </table>  
        </div>
        <form action="../Reporte_super_user/report_clientes.php" method="POST">
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
<div class="container">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Agregar Cliente
        </div>

        <div class="card-body card-block">   
            <form action="../formularios/edit_cliente.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Razon Social:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="razon_social" placeholder="Transportes de Fantasia SA">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">  
                            <label class="form-control-label"  for="">CUIT:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="cuit" placeholder="30710000000">
                            <p>(sin guiones)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">  
                            <label class="form-control-label"  for="">IIBB:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="iibb" placeholder="000008778965">
                            <p>(sin guiones)</p>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Dirección:</label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control" style="margin-right: 1%; " type="text" name="direccion" placeholder="Calle ##">
                    </div>
                    <div class="col-sm-1 pt-2">
                        <label class="form-control-label">City:</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="text" name="ciudad" placeholder="Mendoza">
                    </div>
                    <div class="col-sm-1 pt-2">
                        <label class="form-control-label">Country:</label>
                    </div>
                    <div class="col-sm-3">
                        <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="text" name="country" placeholder="Argentina">
                    </div>
                </div>                
                <hr>
                <div class="form-group">
                    <h4 style="text-align: center;">Contacto Logistica:</h4>
                    <br>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Nombre:</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="name_logistic" placeholder="Juan Perez">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Celular:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="phone" name="cel_logistic" placeholder="542612128105">
                            <p> Número plano ej: 542612128105</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Mail:</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="email" name="mail_logistic" placeholder="juanperez@transporte.com.ar">
                        </div>
                    </div>
                </div>   
                <hr>
                <div class="form-group">
                    <h4 style="text-align: center;">Contacto Administración:</h4>
                    <br>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Nombre:</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="name_admin" placeholder="Otro Juan Perez">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Celular:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="text" name="cel_admin" placeholder="542612128105">
                            <p> Número plano ej: 542612128105</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Mail:</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="text" name="mail_admin"  placeholder="otrojuanperez@transporte.com.ar">
                        </div>
                    </div>
                </div>   

                <div class="row form-group">
                    <div class="col-sm-5"></div>
                    <div style="text-align:center;" class="col-sm-2">
                        <button type="submit" name="agregar_cliente" class="btn btn-primary">Agregar Cliente</button> 
                    </div>
                    <div class="col-sm-5"></div>
                </div>            
            </form>
        </div>
    </div>
</div>
<br>


<?php include('../fijos/footer.php');?>

            