<?php include('../db.php'); ?>
<?php include("../fijos/headerdirect.php") ?>
<?php include("../includes/user_basic/pannel_left_user_basic.php") ?>
<?php include('../fijos/Pannel_right_header.php'); ?>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div id="despachantes" class="card">
            <div style="text-align:center;" class="card-header">
                Despachantes
            </div>
            <div class="card-body card-block">

                <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>ID</th>
                            <th>Razon Social</th>
                            <th>TaxID</th>

                            <th>mail</th>
                            <th>phone</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $empresa = $_SESSION['company'];
                        $query = "SELECT * FROM `custom_agent`";
                        $result_tasks = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result_tasks)) {

                            $id = $row['id'];
                            $razon_social = $row['razon_social'];
                            $tax_id = $row['tax_id'];
                            $ciudad = $row['provincia'];
                            $country = $row['pais'];
                            $mail = $row['mail'];
                            $phone = $row['phone'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $razon_social; ?></td>
                                <td><?php echo $tax_id; ?></td>

                                <td><?php echo $mail; ?></td>
                                <td><?php echo $phone; ?></td>

                                <td style="text-align:center;">
                                    <a title="Editar Cnee" data-toggle="modal" data-target="#editardespa<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Ver Cnee" data-toggle="modal" data-target="#verdespa<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a title="Eliminar" href="../includes/delete_despachante.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                        <i class="fa fa-trash"></i>
                                    </a>


                                </td>
                            </tr>
                            <!-- Modal Editar -->
                            <div class="modal fade" id="editardespa<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar Despachante <strong><?php echo $razon_social; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../formularios/edit_despachante.php?id=<?php echo $id; ?>" method="POST">
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
                                                            <input class="form-control" type="number" name="tax_id" value="<?php echo $tax_id; ?>">
                                                            <p>(sin guiones)</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2 pt-2">
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
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <h4 style="text-align: center;">Contacto</h4>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-2 pt-2">
                                                            <label class="form-control-label">Celular:</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="phone" value="<?php echo $phone; ?>">
                                                            <p> Número plano ej: 542612128105</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2 pt-2">
                                                            <label class="form-control-label">Mail:</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="mail" value="<?php echo $mail; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row form-group">
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-2">
                                                        <button type="submit" name="editar_despachante" class="btn btn-primary">Editar</button>
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
                            <div class="modal fade" id="verdespa<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
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
                                                <h4 style="text-align: center;">Contacto:</h4>
                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-3 pt-2">
                                                        <h4>Celular:</h4>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p><?php echo $phone; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 pt-2">
                                                        <h4>Mail:</h4>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p><?php echo $mail; ?></p>
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
                    </tbody>
                </table>
            </div>
            <form action="../Reporte_user_basic/misDespachantes.php" method="POST">
                <div class="row">
                    <div class="col-sm-6 mx-auto text-center">
                        <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                        <button type="button" data-toggle="modal" data-target="#agregarATA" class="btn btn-outline-primary">Agregar Despachante</button>
                    </div>

                </div>
            </form>
            <br>
        </div>
        <!-- Modal Agegar ATA -->
        <div class="modal fade" id="agregarATA" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar ATA</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form action="../formularios/edit_despachante.php" method="POST">
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
                                        <input class="form-control" type="number" name="tax_id" placeholder="30710000000" required>
                                        <p>(sin guiones)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2 pt-2">
                                    <label class="form-control-label">City:</label>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="ciudad" placeholder="Mendoza">
                                </div>
                                <div class="col-sm-1 pt-2">
                                    <label class="form-control-label">Country:</label>
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" placeholder="Argentina">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h4 style="text-align: center;">Contacto</h4>
                                <br>
                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label">Celular:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="phone" name="phone" placeholder="542612128105" required>
                                        <p> Número plano ej: 542612128105</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label">Mail:</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="email" name="mail" placeholder="juanperez@transporte.com.ar" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row form-group">
                                <div class="col-sm-5"></div>
                                <div style="text-align:center;" class="col-sm-2">
                                    <button type="submit" name="agregar_despachante" class="btn btn-primary">Agregar Despachante</button>
                                </div>
                                <div class="col-sm-5"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../fijos/footerdirect.php'); ?>