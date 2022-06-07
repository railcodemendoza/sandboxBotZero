<?php include('../db.php'); ?>

<?php include('../fijos/headerdirect.php'); ?>

<?php include("../includes/user_basic/pannel_left_user_basic.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Mis Agencias de Ingreso.
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Razon Social</th>
                        <th>Puerto</th>
                        <th>Contacto</th>
                        <th>Celular</th>
                        <th>Mail</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `agencias`";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result_tasks)) {

                        $id = $row['id'];
                        $description = $row['description'];
                        $tax_id = $row['tax_id'];
                        $razon_social = $row['razon_social'];
                        $puerto = $row['puerto'];
                        $contact_name = $row['contact_name'];
                        $contact_phone = $row['contact_phone'];
                        $contact_mail = $row['contact_mail'];
                        $observation_gral = $row['observation_gral'];


                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $razon_social; ?></td>
                            <td><?php echo $puerto; ?></td>
                            <td><?php echo $contact_name; ?></td>
                            <td><?php echo $contact_phone; ?></td>
                            <td><?php echo $contact_mail; ?></td>

                            <td style="text-align:center;">
                                <a title="Editar Agencia" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Agencia" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_agencia.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%;">
                                    <i class="fa fa-trash"></i>
                                </a>


                            </td>
                        </tr>
                </tbody>
                <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar <strong><?php echo $description; ?></strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="../formularios/edit_agencias.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label" for="">Descripción:</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="description" value="<?php echo $description; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label" for="">Razon Social:</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="razon_social" value="<?php echo $razon_social; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label" for="">Tax ID:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="tax_id" value="<?php echo $tax_id; ?>">
                                        </div>
                                        <div class="col-sm-1 pt-2">
                                            <label class="form-control-label">Puerto:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; " type="text" name="puerto" value="<?php echo $puerto; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <hr>
                                        </div>
                                        <div class="col-sm-2">
                                            <h4>Contacto:</h4>
                                        </div>
                                        <div class="col-sm-5">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label">Nombre:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_name" value="<?php echo $contact_name; ?>">
                                        </div>
                                        <div class="col-sm-3 pt-2">
                                            <label class="form-control-label">Celular:</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_phone" value="<?php echo $contact_phone; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label">E-Mail:</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_mail" value="<?php echo $contact_mail; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 mt-1">
                                            <label class="form-control-label">Observaciones:</label>
                                        </div>
                                        <div class="col-sm-10 mt-1">
                                            <textarea name="observation_gral" cols="85" rows="5" class="form-control"><?php echo $observation_gral; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="editar_agencia" class="btn btn-primary">Editar</button>
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

                <!--Final Modal View CNTR-->
                <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles <strong><?php echo $description; ?></strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4 pt-1">
                                                <label class="form-control-label" for="">Descripción</label>
                                            </div>
                                            <div class="col-sm-8 pt-1">
                                                <p><?php echo $description; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label class="form-control-label" for="">Razon Social</label>
                                            </div>
                                            <div class="col-sm-8 ">
                                                <p><?php echo $razon_social; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label class="form-control-label" for="">Tax ID:</label>
                                            </div>
                                            <div class="col-sm-8 ">
                                                <p><?php echo $tax_id; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 ">
                                                <label class="form-control-label" for="">Puerto</label>
                                            </div>
                                            <div class="col-sm-8 ">
                                                <p><?php echo $puerto; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <hr>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 style="text-align: center; padding-top:0.5rem;">Contacto</h4>
                                            </div>
                                            <div class="col-sm-4">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 pt-2">
                                                <label class="form-control-label" for="">Nombre:</label>
                                            </div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $contact_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 pt-2">
                                                <label class="form-control-label" for="">Celular:</label>
                                            </div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $contact_phone; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 pt-2">
                                                <label class="form-control-label" for="">E-Mail:</label>
                                            </div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $contact_mail; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <hr>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 style="text-align: center; padding-top:0.5rem;">observaciones:</h4>
                                            </div>
                                            <div class="col-sm-4">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-2"></div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $observation_gral; ?></p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                    </div>
                                    <div class="col-sm-5"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!--Final Modal View CNTR-->
            <?php }   ?>
            </table>
        </div>
        <form action="../Reporte_user_basic/misAgencias.php" method="POST">
            <div class="row">

                <div class="col-sm-6 mx-auto text-center">

                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                    <button type="button" data-toggle="modal" data-target="#agregarATA" class="btn btn-outline-primary">Agregar ATA</button>

                </div>

            </div>
        </form>
        <br>
    </div>
</div>
<br>
<!-- Modal Agegar ATA -->
<div class="modal fade" id="agregarATA" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar Agencia</strong></h4>
            </div>
            <div class="modal-body">
                <form action="../formularios/edit_agencias.php" method="POST">
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Descripción:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="description" placeholder="Agencia de Ingreso Puerto San Antonio">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Razon Social:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="razon_social" placeholder="Agencia de Ingreso SA">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Tax ID:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="tax_id" placeholder="30710000009">
                            <p>(sin guiones)</p>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Puerto:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="puerto" placeholder="San Antonio, CL">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <hr>
                        </div>
                        <div class="col-sm-2">
                            <h4>Contacto:</h4>
                        </div>
                        <div class="col-sm-5">
                            <hr>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Nombre:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_name" placeholder="Juan Manuel de Rosas">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Celular:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_phone" placeholder="569000987665">
                            <p>sin espacios ni símbolos</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 ">
                            <label class="form-control-label">E-Mail:</label>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="contact_mail" placeholder="jmderosas@agencia.com">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 mt-1">
                            <label class="form-control-label">Observaciones:</label>
                        </div>
                        <div class="col-sm-10 mt-1">
                            <textarea name="observation_gral" placeholder="Comentario..." cols="85" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-2">
                            <button type="submit" name="agregar_agencia" class="btn btn-primary">Agregar</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../fijos/footerdirect.php'); ?>