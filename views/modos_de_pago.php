
<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include("../includes/super_user/pannel_left_super_user.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>
<br>
<div class="container">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Modos de Pago
        </div>
        <div class="card-body card-block">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>title</th>
                        <th>Descripción</th>
                        <th>Creado </th>
                        <th>Usuario</th>
                </thead>
                <tbody>
                <?php

                $empresa = $_SESSION['company'];
                $query = "SELECT * FROM `modos_de_pago`" ;
                $result_tasks = mysqli_query($conn, $query);      
                    
                    while($row = mysqli_fetch_assoc($result_tasks)) { 
                        
                        $id =$row['id']; 
                        $title =$row['title']; 
                        $description = $row['description'];
                        $created_at = $row['created_at'];
                        $user = $row['user'];
                    
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $created_at; ?></td>
                            <td><?php echo $user; ?></td>

                            <td  style="text-align:center;">
                            <a title="Editar" data-toggle="modal" data-target="#editar<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Eliminar" href="../includes/delete_modo_de_pago.php?id=<?php echo $id;?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-trash"></i>
                            </a>
                            
                            
                            </td>
                        </tr>
                <!-- Modal Editar -->
                <div class="modal fade" id="editar<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" >
                            <div class="modal-header">
                                <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Modo de Pago <strong><?php echo $title; ?></strong></h4>
                            </div>
                            <div class="modal-body">   
                                <form action="../formularios/edit_modo_de_pago.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">
                                                <label class="form-control-label" for="">Título:</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="title" value="<?php echo $title ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2">  
                                                <label class="form-control-label"  for="">Descripción:</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="description" value="<?php echo $description; ?>">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="editar_modo_de_pago" class="btn btn-primary">Editar</button> 
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
                <?php }   ?>
            </table>  
        </div>
        <form action="../Reporte_super_user/report_modos_de_pago.php" method="POST">
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
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
            Agregar Modo de Pago
        </div>
        <div class="card-body card-block">   
            <form action="../formularios/edit_modo_de_pago.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Titulo</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="title" placeholder="Transferencia Internacional">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Descripción</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="description" placeholder="Transferencias realizadas por medio de SWIFT">
                        </div>
                    </div>
                    <br>
                <div class="row form-group">
                    <div class="col-sm-5"></div>
                    <div style="text-align:center;" class="col-sm-2">
                        <button type="submit" name="agregar_modo_de_pago" class="btn btn-primary">Agregar Modo</button> 
                    </div>
                    <div class="col-sm-5"></div>
                </div>            
            </form>
        </div>
    </div>
</div>
<br>

<?php include('../fijos/footer.php');?>

            