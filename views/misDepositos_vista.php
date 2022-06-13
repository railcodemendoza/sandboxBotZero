<div class="container">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Mis Depositos de Retiro.
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Maps</th>
                        <th>km from town</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `depositos_de_retiro`";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result_tasks)) {

                        $id = $row['id'];
                        $title = $row['title'];
                        $address = $row['address'];
                        $country = $row['country'];
                        $city = $row['city'];
                        $km_from_town = $row['km_from_town'];
                        $lat_lon = $row['lat_lon'];
                        $link_maps = $row['link_maps'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><a style="color:blue; margin-left:30%;" target="_blank" href="<?php echo $link_maps; ?>"><i class="ti-map-alt"></i></a></td>
                            <td><?php echo $km_from_town; ?></td>

                            <td style="text-align:center;">
                                <a title="Editar Depósito" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Depósito" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_depositos.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar <strong><?php echo $title; ?></strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../formularios/edit_deposito.php?id=<?php echo $id; ?>" method="POST">
                                            <div class="row form-group">
                                                <div class="col-sm-2 pt-2">
                                                    <label class="form-control-label" for="">Descripción:</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2 pt-2">
                                                    <label class="form-control-label" for="">Address:</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input class="form-control" type="text" name="address" value="<?php echo $address; ?>">
                                                </div>
                                                <div class="col-sm-1 pt-2">
                                                    <label class="form-control-label">City:</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input class="form-control" style="margin-right: 1%; " type="text" name="city" value="<?php echo $city  ?>">
                                                </div>
                                                <div class="col-sm-1 pt-2">
                                                    <label class="form-control-label">Country:</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" value="<?php echo $country; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2 pt-2">
                                                    <label class="form-control-label">km desde la Ciudad:</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="km_from_town" value="<?php echo $km_from_town; ?>">
                                                </div>
                                                <div class="col-sm-3 pt-2">
                                                    <label class="form-control-label">Latitud y Longitud:</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="lat_lon" value="<?php echo $lat_lon; ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-2">
                                                    <button type="submit" name="editar_deposito" class="btn btn-primary">Editar</button>
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
                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles <strong><?php echo $title; ?></strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-4 pt-2">
                                                        <label class="form-control-label" for="">Descripción</label>
                                                    </div>
                                                    <div class="col-sm-8 pt-2">
                                                        <p><?php echo $title; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 pt-2">
                                                        <label class="form-control-label" for="">Direccion:</label>
                                                    </div>
                                                    <div class="col-sm-8 pt-2">
                                                        <p><?php echo $address . ' - ' . $city . ' - ' . $country; ?></p>
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
                </tbody>
            </table>
        </div>
        <form action="../Reporte_user_basic/misDepositos.php" method="POST">
            <div class="row">

                <div class="col-sm-6 mx-auto text-center">

                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                    <button type="button" data-toggle="modal" data-target="#agregarATA" class="btn btn-outline-primary">Agregar Depósito</button>

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
                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar Deposito</strong></h4>
            </div>
            <div class="modal-body">
                <form action="../formularios/edit_deposito.php" method="POST">
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Descripción:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="title" placeholder="Deposito SA">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Address:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="address" placeholder="Calle los Arboles 123"">
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">City:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="city" placeholder="Mendoza">
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Country:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" placeholder="Argentina">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">km desde la Ciudad:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="km_from_town" >
                        </div>
                        <div class="col-sm-3 pt-2">
                            <label class="form-control-label">Latitud y Longitud:</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="lat_lon" placeholder="[buscar en goole maps coordenadas y pegarlas aqu]">
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-2">
                            <button type="submit" name="agregar_deposito" class="btn btn-primary">Editar</button>
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