<?php

include('../db.php');
include('../fijos/header.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];


if ($permiso = 'Master') { ?>

    <?php include("../includes/super_user/pannel_left_super_user.php") ?>

    <?php include('../fijos/Pannel_right_header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div style="text-align:center;" class="card-header">
                        <strong class="card-title">Tipos de CNTR</strong>
                    </div>
                    <div class="card-body">
                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Title</th>
                                    <th>Descripcion</th>
                                    <th>Peso</th>
                                    <th>Alto</th>
                                    <th>Ancho</th>
                                    <th>Largo</th>
                                    <th>Observaciones</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $empresa = $_SESSION['company'];
                                $query = "SELECT * FROM `cntr_type`";
                                $result_tasks = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result_tasks)) {

                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $teu = $row['teu'];
                                    $weight = $row['weight'];
                                    $height = $row['height'];
                                    $width = $row['width'];
                                    $long = $row['longitud'];
                                    $observation = $row['observation'];
                                ?>
                                    <tr>
                                        <td class="serial"><?php echo $id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $teu; ?></td>
                                        <td><span class="name"><?php echo $weight; ?></span> </td>
                                        <td><span class="name"><?php echo $height; ?></span> </td>
                                        <td><span class="product"><?php echo $width; ?></span> </td>
                                        <td><span class="product"><?php echo $long; ?></span> </td>
                                        <td><?php echo $observation; ?></td>
                                        <td style="text-align:center;">
                                            <a title="Editar" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Eliminar" href="../includes/delete_tipo_cntr.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar tipo de Contenerdo: <strong><?php echo $title; ?></strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../formularios/edit_tipo_cntr.php?id=<?php echo $id; ?>" method="post" class="form-horizontal">
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                    <input type="text" id="title" name="title" value="<?php echo $title; ?>" class="form-control" require>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-layout-column4-alt"></i></div>
                                                                    <input type="mail" id="teu" name="teu" value="<?php echo $teu; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-arrow-down"></i></div>
                                                                    <input type="phone" id="weight" placeholder="Peso" name="weight" value="<?php echo $weight; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-arrows-vertical"></i></div>
                                                                    <input type="phone" id="height" placeholder="Alto" name="height" value="<?php echo $height; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-arrows-horizontal"></i></div>
                                                                    <input type="phone" id="width" name="width" placeholder="Ancho" value="<?php echo $width; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="ti-arrows-corner"></i></div>
                                                                    <input type="phone" id="long" name="long" placeholder="Largo" value="<?php echo $long; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col col-md-6">
                                                                <div class="input-group">
                                                                    <textarea name="obervation" id="observation" cols="45" rows="10"><?php echo $observation; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-5"></div>
                                                            <div class="col col-md-2">
                                                                <button type="submit" class="btn btn-info" name="editar_tipo" id="editar_in">Editar</button>
                                                            </div>
                                                            <div class="col col-md-5"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }   ?>
                            </tbody>
                        </table>
                    </div>
                    <form action="../Reporte_super_user/report_usuarios.php" method="POST">
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
        </div>
        <div class="card">
            <div style="text-align:center;" class="card-header">
                Agregar Tipo de Contenedor.
            </div>
            <div class="card-body card-block">
                <form action="../formularios/edit_tipo_cntr.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label" style="text-align: center;" for="">Título</label>
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="title" placeholder="20 DRY">
                            </div>
                            <div class="col-sm1 pt-2">
                                <label class="form-control-label" for="">TEU:</label>
                            </div>
                            <div class="col-sm-1">
                                <input class="form-control" type="number" name="teu" placeholder="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 style="text-align: center;">Dimensiones:</h4>
                        <br>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label" style="text-align: end;">Peso:</label>
                            </div>
                            <div class="col-sm-1">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="number" name="weight" placeholder="2500">
                            </div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label" style="text-align: end;">Alto:</label>
                            </div>
                            <div class="col-sm-1">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="phone" name="height" placeholder="2.59">
                            </div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label" style="text-align: end;">Ancho:</label>
                            </div>
                            <div class="col-sm-1">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="phone" name="width" placeholder="2.44">
                            </div>
                            <div class="col-sm-1 pt-2">
                                <label class="form-control-label" style="text-align: end;">Largo:</label>
                            </div>
                            <div class="col-sm-1">
                                <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="decimal" name="longitud" placeholder="6.10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 style="text-align: center;">Observaciones:</h4>
                        <div class="row">
                            <div class="col-sm-6 mx-auto">
                                <textarea name="observation" style="width: inherit;" id="" cols="100" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-sm-5"></div>
                        <div style="text-align:center;" class="col-sm-2">
                            <button type="submit" name="agregar_tipo" class="btn btn-primary">Agregar Tipo</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div> <!-- contain -->
<?php include('../fijos/footer.php');
} ?>