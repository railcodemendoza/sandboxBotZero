<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div style="text-align:center;" class="card-header">
                Choferes <br> <small> Referencias: <span class="text-danger"> OCUPADOS | </span> <span class="text-info">LIBRES </span></small>
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
                            <th>lugar</th>
                            <th>estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $empresa = $_SESSION['company'];
                        $query = "SELECT * FROM `choferes`";
                        $result_tasks = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result_tasks)) {

                            $id = $row['id'];
                            $nombre = $row['nombre'];
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
                            <tr <?php if ($status_chofer == 'ocupado') {
                                    echo 'class="text-danger"';
                                } else {
                                    echo 'class="text-info"';
                                } ?>>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $documento; ?></td>
                                <td><?php echo $transporte; ?></td>
                                <td><?php echo $place; ?></td>
                                <td class="text-uppercase"><?php echo $status_chofer ?></td>

                                <td style="text-align:center;">
                                    <a title="Editar Chofer" data-toggle="modal" data-target="#editarstatus<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Ver Chofer" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal Editar -->
                            <div class="modal fade" id="editarstatus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"> <strong> Editar Chofer </strong></h4>
                                        </div>
                                        <br>
                                        <form action="../formularios/edit_chofer.php?id=<?php echo $id; ?>" method="POST">
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
                                                                        <p style="margin:0;">Status:</p>
                                                                        <p style="margin:0;"><select name="status_chofer[]" id="selectSm" class="form-control-sm form-control">
                                                                                <option value="libre">libre</option>
                                                                                <option value="ocupado">ocupado</option>
                                                                            </select></p>
                                                                        <p style="margin:0;">Lugar:</p>
                                                                        <p style="margin:0;"><input type="text" name="place" required></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3">
                                                                    <p style="padding-top: 0.5rem;">Whats App: </p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p><?php echo $WhatsApp; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3">
                                                                    <p style="padding-top: 0.5rem;">Mail: </p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p> <?php echo $mail; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-3">
                                                                    <p style="padding-top: 0.5rem;">Observaciones: </p>
                                                                </div>
                                                                <div class="col-sm-6"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1"></div>
                                                                <div class="col-sm-10">
                                                                    <p><?php echo $Observaciones; ?></p>
                                                                </div>
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
                                                    <button type="submit" name="editar_status_chofer" class="btn btn-primary">Editar</button>
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
                            <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalle de Chofer</h4>
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
                                                            <div class="col-sm-3">
                                                                <p style="padding-top: 0.5rem;">Whats App: </p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p><?php echo $WhatsApp; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-3">
                                                                <p style="padding-top: 0.5rem;">Mail: </p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p> <?php echo $mail; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-3">
                                                                <p style="padding-top: 0.5rem;">Observaciones: </p>
                                                            </div>
                                                            <div class="col-sm-6"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-10">
                                                                <p><?php echo $Observaciones; ?></p>
                                                            </div>
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
        <form action="../Reporte_user_basic/misChoferes_libres.php" method="POST">
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
    <br>
</div>
