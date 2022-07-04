<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            <strong class="card-title">Transportes</strong>
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered" width="100%">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Razon Social</th>
                        <th>TaxID</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                        <th>mail</th>
                        <th>phone</th>
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
                        $tax_id = $row['CUIT'];
                        $ciudad = $row['Provincia'];
                        $country = $row['Pais'];
                        $contacto_logistica_mail = $row['contacto_logistica_mail'];
                        $contacto_logistica_celular = $row['contacto_logistica_celular'];
                        $contacto_logistica_nombre = $row['contacto_logistica_nombre'];
                        $contacto_admin_mail = $row['contacto_admin_mail'];
                        $contacto_admin_celular = $row['contacto_admin_celular'];
                        $contacto_admin_nombre = $row['contacto_admin_nombre'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $razon_social; ?></td>
                            <td><?php echo $tax_id; ?></td>
                            <td><?php echo $ciudad; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><?php echo $contacto_logistica_mail; ?></td>
                            <td><?php echo $contacto_logistica_celular; ?></td>

                            <td style="text-align:center;">
                                <a title="Editar Cnee" data-toggle="modal" data-target="#editartransporte<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Cnee" data-toggle="modal" data-target="#verTransporte<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_transporte.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Editar -->
                        <div class="modal fade" id="editartransporte<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar Transporte <strong><?php echo $razon_social; ?></strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../formularios/edit_transporte.php?id=<?php echo $id; ?>" method="POST">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label" for="">Razón Social:</label>
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
                                                        <input class="form-control" type="number" name="tax_id" value="<?php echo $tax_id; ?>">
                                                        <p>(sin guiones)</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Ciudad:</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="ciudad" value="<?php echo $ciudad; ?>">
                                                    </div>
                                                    <div class="col-sm-1 pt-2">
                                                        <label class="form-control-label">País:</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" value="<?php echo $country; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <h4 style="text-align: center;">Contacto Logística</h4>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Nombre:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_logistica_nombre" value="<?php echo $contacto_logistica_nombre; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Celular:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_logistica_celular" value="<?php echo $contacto_logistica_celular; ?>">
                                                        <p> Número plano ej: 542612128105</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Mail:</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_logistica_mail" value="<?php echo $contacto_logistica_mail; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <h4 style="text-align: center;">Contacto Administración</h4>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Nombre:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_nombre" value="<?php echo $contacto_admin_nombre; ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2 pt-2">
                                                        <label class="form-control-label">Celular:</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_celular" value="<?php echo $contacto_admin_celular; ?>">
                                                        <p> Número plano ej: 542612128105</p>
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
                                            <hr>
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
                        <div class="modal fade" id="verTransporte<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong><?php echo $razon_social; ?></strong></h4>
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
                                                    <p><?php echo $tax_id; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>jurisdicción:</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p><?php echo $ciudad . ', ' . $country; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h4 style="text-align: center;">Contacto Logísitica:</h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Nombre:</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo $contacto_logistica_nombre; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Celular:</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo $contacto_logistica_celular; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Mail:</h4>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><?php echo $contacto_logistica_mail; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h4 style="text-align: center;">Contacto Administración:</h4>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Nombre:</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo $contacto_admin_nombre; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Celular:</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo $contacto_admin_celular; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 pt-2">
                                                    <h4>Mail:</h4>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><?php echo $contacto_admin_mail; ?></p>
                                                </div>
                                            </div>
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
        <form action="../Reporte_user_basic/misTransportes.php" method="POST">
            <div class="row">
                <div class="col-sm-6 mx-auto text-center">
                    <button type="button" data-toggle="modal" data-target="#agregarTransporte" class="btn btn-outline-primary">Agregar Transporte</button>
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                </div>
            </div>
        </form>
        <br>
    </div>
    <!-- Modal Agregar Transporte -->
    <div class="modal fade" id="agregarTransporte" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar Transporte</strong></h4>
                </div>
                <div class="modal-body">
                    <form action="../formularios/edit_transporte.php?id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label" for="">Razon Social:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="razon_social" placeholder="Transportes de Fantasia SA" require>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label" for="">CUIT:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="number" name="cuit" placeholder="30710000000" require>
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
                                <label class="form-control-label">Ciudad:</label>
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="ciudad" placeholder="Mendoza">
                            </div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label">País:</label>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" placeholder="Argentina">
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
                                    <input class="form-control" style="margin-right: 1%; " type="text" name="contacto_logistica_nombre" placeholder="Juan Perez" require>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label">Celular:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="phone" name="contacto_logistica_celular" placeholder="542612128105" require>
                                    <p> Número plano ej: 542612128105</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label">Mail:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="email" name="contacto_logistica_mail" placeholder="juanperez@transporte.com.ar" require>
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
                                    <input class="form-control" style="margin-right: 1%;" type="text" name="contacto_admin_nombre" placeholder="Otro Juan Perez" require>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label">Celular:</label>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_celular" placeholder="542612128105" require>
                                    <p> Número plano ej: 542612128105</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label">Mail:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contacto_admin_mail" placeholder="otrojuanperez@transporte.com.ar" require>
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
</div>


<br>