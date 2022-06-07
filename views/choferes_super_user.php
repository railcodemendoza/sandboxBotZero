
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
            Choferes
        </div>
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Transporte</th>
                            <th>Vto Carnet</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `choferes`" ;
                    $result_tasks = mysqli_query($conn, $query);    
                        while($row = mysqli_fetch_assoc($result_tasks)) { 

                            $id =$row['id']; 
                            $nombre =$row['nombre']; 
                            $foto = $row['foto'];
                            $documento = $row['documento'];
                            $transporte = $row['transporte'];
                            $vto_carnet = $row['vto_carnet'];
                            $WhatsApp = $row['WhatsApp'];
                            $mail = $row['mail'];
                            $transporte =  $row['transporte'];
                            $status_chofer = $row['status_chofer'];
                            $place = $row['place'];
                            $Observaciones = $row['Observaciones'];

                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $documento; ?></td>
                                <td><?php echo $transporte; ?></td>
                                <td><?php echo $vto_carnet; ?></td>
                                
                                <td  style="text-align:center;">
                                <a title="Editar Chofer" data-toggle="modal" data-target="#editar<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Chofer" data-toggle="modal" data-target="#ver<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_chofer_super_user.php?id=<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-trash"></i>
                                </a>
                                
                                
                                </td>
                            </tr>
                    <!-- Modal Editar -->
                    <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel"> <strong> Editar Chofer </strong></h4>
                                </div>
                                <br>
                                    <form action="../formularios/edit_chofer_super_user.php?id=<?php echo $id; ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark p-5">
                                                            <div class="media">
                                                                <a href="edit_img.php">
                                                                    <img class="align-self-center rounded-circle mr-3" style="width:100px; height:100px;" alt="" src="../images/admin.jpg">
                                                                </a>
                                                                <br>
                                                                <div class="media-body">
                                                                    <p style="margin:0;">Nombre  y Apellido:</p>
                                                                    <h2 class="text-light display-6"> <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" ></h2>
                                                                    <p style="margin:0;">Transporte:</p>
                                                                    <p style="margin:0;"><select name="transporte[]" id="selectSm" class="form-control-sm form-control">
                                                                                        <option value="<?php echo $transporte; ?>"><?php echo $transporte; ?></option>     
                                                                                        <?php
                                                                                                    
                                                                                            

                                                                                            $query_transport = $conn -> query ("SELECT * FROM `transporte`");
                                                                                                while ($transport= mysqli_fetch_array($query_transport)) {                                           
                                                                                                    echo '<option value="'.$transport['razon_social'].'">'.$transport['razon_social'].'</option>';
                                                                                                }  
                                                                                        ?>
                                                                                    </select></p>
                                                                    <p style="margin:0;">Vto Licencia: </p>
                                                                    <p style="margin:0;"><input class="form-control" type="date" name="vto_carnet" value="<?php echo $vto_carnet; ?>" ></p>
                                                                    <p style="margin:0;">Documento:</p>
                                                                    <p style="margin:0;"><input class="form-control" type="number" name="documento" value="<?php echo $documento; ?>" ></p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Whats App: </p> </div>
                                                                <div class="col-sm-6"><input class="form-control" type="number" name="WhatsApp" value="<?php echo $WhatsApp; ?>" ></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Mail: </p> </div>
                                                                <div class="col-sm-6"><input class="form-control" type="email" name="mail" value="<?php echo $mail; ?>" ></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Observaciones: </p></div>
                                                                <div class="col-sm-6"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-10"><textarea name="Observaciones" id="textarea-input" class="form-control"  placeholder="<?php echo $Observaciones; ?>" cols="8" rows="8"><?php echo $Observaciones; ?></textarea></div>
                                                                <div class="col-sm-1"></div>
                                                            </div>
                                                        <br>
                                                    </section>
                                                </aside>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4 p-5">
                                                <button type="submit" name="editar_chofer" class="btn btn-primary">Editar</button> 
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>            
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal Editar -->
                    <!-- Modal Ver-->
                    <div class="modal fade" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Detalle de Chofer</h4>
                                </div>
                                <div class="row">
                                        <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <aside class="profile-nav alt">
                                                    <section class="card">
                                                        <div class="card-header user-header alt bg-dark p-5">
                                                            <div class="media">
                                                                <a href="#">
                                                                    <img class="align-self-center rounded-circle mr-3" style="width:100px; height:100px;" alt="" src="../images/admin.jpg">
                                                                </a>
                                                                <br>
                                                                <div class="media-body">
                                                                
                                                                    <h2 class="text-light display-6"><?php echo $nombre; ?></h2>
                                                                    <p style="margin:0;"><?php echo $transporte; ?></p>
                                                                    <p style="margin:0;">vto carnet:<?php echo $vto_carnet; ?></p>
                                                                    <p>Documento: <?php echo $documento; ?></p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Whats App: </p></div>
                                                                <div class="col-sm-6"><p><?php echo $WhatsApp; ?></p></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Mail: </p></div>
                                                                <div class="col-sm-6"> <p> <?php echo $mail; ?></p></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3"><p style="padding-top: 0.5rem;">Observaciones: </p></div>
                                                                <div class="col-sm-6"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-10"><p><?php echo $Observaciones; ?></p></div>
                                                                <div class="col-sm-1"></div>
                                                            </div>
                                                        <br>
                                                    </section>
                                                </aside>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                        <hr>
                                        <div class="row form-group">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-2">
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
        <form action="../Reporte_user_basic/misChoferes.php" method="POST">
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
            Agregar Chofer
        </div>
        <div class="card-body card-block">   
            <form action="../formularios/edit_chofer_super_user.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Transporte:</label>
                        </div>
                        <div class="col-sm-4">
                            <select name="transporte[]" id="selectSm" class="form-control-sm form-control" require> 
                                <option value="">-. Seleccionar Transporte.-</option>     
                                <?php
                                            
                                    

                                    $query_transport = $conn -> query ("SELECT * FROM `transporte`");
                                        while ($transport= mysqli_fetch_array($query_transport)) {                                           
                                            echo '<option value="'.$transport['razon_social'].'">'.$transport['razon_social'].'</option>';
                                        }  
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Nombre y Apellido:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="nombre" placeholder="Juan Riquelme">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">  
                            <label class="form-control-label"  for="">Documento:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="number" name="documento" placeholder="24088111">
                            <p>(sin guiones)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">  
                            <label class="form-control-label"  for="">Vto Licencia:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="date" name="vto_carnet">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-5"><hr></div>
                        <div class="col-sm-2" style="text-align: center;"> <h4>Contacto:</h4></div>
                        <div class="col-sm-5"><hr></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">WhatsApp:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"type="phone" name="WhatsApp" placeholder="542612128105">
                            <p> Número plano ej: 542612128105</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Mail:</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control"style="margin-right: 1%; margin-left:1%;"type="email" name="mail" placeholder="juanperez@transporte.com.ar">
                        </div>
                    </div>
                </div>   
                                    
                <div class="form-group">
                <div class="row">
                        <div class="col-sm-5"><hr></div>
                        <div class="col-sm-2" style="text-align: center;"> <h4>Observaciones:</h4></div>
                        <div class="col-sm-5"><hr></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2 pt-2"></div>
                        <div class="col-sm-8">
                            <textarea name="Observaciones" class="form-control"id="" cols="100" rows="5"></textarea>
                        </div>
                    </div>
                </div>   
 
                <div class="row form-group">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <button type="submit" name="agregar_chofer" class="btn btn-primary">Agregar Chofer</button> 
                    </div>
                    <div class="col-sm-5"></div>
                </div>            
            </form>
        </div>
    </div>
</div>
<br>


<?php include('../fijos/footer.php');?>

            