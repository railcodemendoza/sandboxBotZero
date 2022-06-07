<?php include('../db.php'); ?>

<?php include("../fijos/headerdirect.php") ?>

<?php include("../includes/user_basic/pannel_left_user_basic.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>
<br>
<div class="container">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Transportes
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Razon Social</th>
                        <th>TaxID</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Contacto</th>
                        <th>Create</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `transporte`";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_tasks)) {

                        $id = $row['id'];
                        $razon_social = $row['razon_social'];
                        $cuit = $row['CUIT'];
                        $ciudad = $row['Provincia'];
                        $country = $row['Pais'];
                        $contact = $row['contacto_logistica_nombre'];
                        $created_at = $row['created_at'];
                        $direccion = $row['Direccion'];
                        $contacto_logistica_nombre = $row['contacto_logistica_nombre'];
                        $contacto_logistica_celular = $row['contacto_logistica_celular'];
                        $contacto_logistica_mail = $row['contacto_logistica_mail'];
                        $contacto_admin_nombre = $row['contacto_admin_nombre'];
                        $contacto_admin_celular = $row['contacto_admin_celular'];
                        $contacto_admin_mail = $row['contacto_admin_mail'];

                    ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $razon_social; ?></td>
                            <td><?php echo $cuit; ?></td>
                            <td><?php echo $ciudad; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><?php echo $contact; ?></td>
                            <td><?php echo $created_at; ?></td>

                            <td style="text-align:center;">
                                <a title="Editar Cnee" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Cnee" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_transporte.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Editar -->
                        <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar Consignee <strong><?php echo $razon_social; ?></strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../formularios/edit_transporte.php?id=<?php echo $id; ?>" method="POST">
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
                                                        <label class="form-control-label" for="">CUIT:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="number" name="cuit" value="<?php echo $cuit; ?>">
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
                                                    <label class="form-control-label">City:</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="ciudad" value="<?php echo $ciudad; ?>">
                                                </div>
                                                <div class="col-sm-1 pt-2">
                                                    <label class="form-control-label">Country:</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" value="<?php echo $country; ?>">
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
                                                        <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_logistica_nombre" value="<?php echo $contacto_logistica_nombre; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Celular:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%;" type="text" name="contacto_logistica_celular" value="<?php echo $contacto_logistica_celular; ?>">
                                                        <p style="margin-bottom: 0;"> Número plano ej: 542612128105</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Mail:</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_logistica_mail" value="<?php echo $contacto_logistica_mail; ?>">
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
                                                        <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_admin_nombre" value="<?php echo $contacto_admin_nombre; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Celular:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_celular" value="<?php echo $contacto_admin_celular; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Mail:</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_mail" value="<?php echo $contacto_admin_mail; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-2">
                                                    <button type="submit" name="editar_transporte" class="btn btn-primary">Editar</button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
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
                        <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong><?php echo $razon_social; ?></strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-8 pt-2 mx-auto text-center">
                                                    <h4 style="color:gray !important;"> <strong style="color:black"> Razon Social: </strong> <?php echo $razon_social; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 pt-2 mx-auto text-center">
                                                    <h4 style="color:gray !important;"> <strong style="color:black"> CUIT: </strong> <?php echo $cuit; ?></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 pt-2 mx-auto text-center">
                                                    <h4 style="color:gray !important;"> <strong style="color:black"> Dirección: </strong> <?php echo $direccion . ' - ' . $ciudad . ', ' . $country; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 style="text-align: center;">Contacto Logistica:</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h4>Nombre: <?php echo $contacto_logistica_nombre; ?></h4>
                                                                <h4>Celular: <?php echo $contacto_logistica_celular; ?></h4>
                                                                <h4>Mail: <?php echo $contacto_logistica_mail; ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 style="text-align: center;">Contacto Administración:</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h4>Nombre: <?php echo $contacto_admin_nombre; ?></h4>
                                                                <h4>Celular: <?php echo $contacto_admin_celular; ?></h4>
                                                                <h4>Mail: <?php echo $contacto_admin_mail; ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
        <form action="../Reporte_user_basic/misTransportes.php" method="POST">
            <div class="row">

                <div class="col-sm-6 mx-auto text-center">

                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                    <button type="button" data-toggle="modal" data-target="#agregarATA" class="btn btn-outline-primary">Agregar Transporte</button>

                </div>

            </div>
        </form>
        <br>
    </div>
</div>

<!-- Modal Agegar ATA -->
<div class="modal fade" id="agregarATA" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar Transporte</strong></h4>
            </div>
            <div class="modal-body">
                <form action="../formularios/edit_transporte.php" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label" for="">Razon Social:</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="razon_social" placeholder="Transportes de Fantasia SA" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label" for="">CUIT:</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="number" name="cuit" placeholder="30710000000" required>
                                <p>(sin guiones)</p>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Dirección:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="direccion" placeholder="Calle ##" required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">City:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="ciudad" placeholder="Mendoza" required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Country:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" placeholder="Argentina" required>
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
                                <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_logistica_nombre" placeholder="Juan Perez" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Celular:</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" style="margin-right: 1%;" type="phone" name="contacto_logistica_celular" placeholder="542612128105" required>
                                <p style="margin-bottom: 0;"> <small> Número plano ej: 542612128105</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Mail:</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" style="margin-right: 1%;" type="email" name="contacto_logistica_mail" placeholder="juanperez@transporte.com.ar" required>
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
                                <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_admin_nombre" placeholder="Otro Juan Perez" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Celular:</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" style="margin-right: 1%;" type="text" name="contacto_admin_celular" placeholder="542612128105" required>
                                <p style="margin-bottom: 0;"><small> Número plano ej: 542612128105</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pt-2">
                                <label class="form-control-label">Mail:</label>
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" style="margin-right: 1%;" type="text" name="contacto_admin_mail" placeholder="otrojuanperez@transporte.com.ar" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-5"></div>
                        <div style="text-align:center;" class="col-sm-2">
                            <button type="submit" name="agregar_transporte" class="btn btn-primary">Agregar Transporte</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../fijos/footerdirect.php'); ?>