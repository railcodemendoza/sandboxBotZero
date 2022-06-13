<div class="container">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Mis Lugares de Carga
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Dirección</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Maps</th>
                        <th>Km extras</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `customer_load_place` WHERE `company` = '$empresa'";
                    $result_tasks = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result_tasks)) {

                        $id = $row['id'];
                        $description = $row['description'];
                        $address = $row['address'];
                        $city = $row['city'];
                        $country = $row['country'];
                        $link_maps = $row['link_maps'];
                        $km_from_town = $row['km_from_town'];
                        $remarks = $row['remarks'];
                        $lat_lon = $row['lat_lon'];
                        $create_user = $row['user'];

                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $country; ?></td>
                            <td><a target="_blank" style="color:blue; margin-left:30%;" href="<?php echo $link_maps; ?>"><i class="ti-map-alt"></i></a></td>
                            <td><?php echo $km_from_town; ?></td>

                            <td style="text-align:center;">
                                <a title="Editar Lugar de Carga" data-toggle="modal" data-target="#editar<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Ver Lugar de Carga" data-toggle="modal" data-target="#ver<?php echo $id; ?>" style="color: #17A589; padding:2%; ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Eliminar" href="../includes/delete_lugarDeCarga.php?id=<?php echo $id; ?>" style="color: #17A589; padding:2%;">
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
                                <form action="../formularios/edit_lugarDeCarga.php?id=<?php echo $id; ?>" method="POST">
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
                                    <div class="row form-group">
                                        <div class="col-sm-2 mt-1">
                                            <label class="form-control-label">Remarks:</label>
                                        </div>
                                        <div class="col-sm-10 mt-1">
                                            <textarea name="remarks" cols="85" rows="5" class="form-control"><?php echo $remarks; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="editar_lugarDeCarga" class="btn btn-primary">Editar</button>
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
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4 pt-2">
                                                <label class="form-control-label" for="">Descripción</label>
                                            </div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $description; ?></p>
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
                                        <div class="row">
                                            <div class="col-sm-4 pt-2">
                                                <label class="form-control-label" for="">Remarks</label>
                                            </div>
                                            <div class="col-sm-8 pt-2">
                                                <p><?php echo $remarks; ?></p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-4">
                                        <iframe target="_blank" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d427205.3967266963!2d-69.31506633014509!3d-33.226097144803376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967c35cb7f24f40f%3A0x3ad7660e3f93e17c!2sBodega%20Salentein!5e0!3m2!1ses!2sar!4v1592260291031!5m2!1ses!2sar" width="230" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
        <form action="../Report_Customer/misLugaresDeCarga.php" method="POST">
            <div class="row">
                <div class="col-sm-6 mx-auto text-center">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">Descargar Listado</button>
                    <button type="button" data-toggle="modal" data-target="#agregarATA" class="btn btn-outline-primary">Agregar Lugar de Carga</button>
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
                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar ATA</strong>
                </h4>
            </div>
            <div class="modal-body">
                <form action="../formularios/misLugaresdeCargas.php" method="POST">
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Descripción:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="description" placeholder="Empresa SA" required>
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Address:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="address" placeholder="Street Name 188.." required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">City:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="city" placeholder="New York" required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Country:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text" name="country" placeholder="USA" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 mt-1">
                            <label class="form-control-label">latitud y longitud:</label>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="link_maps" placeholder="-33.022036,-68.864257">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Km de la Ciudad </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; " type="number" name="km_from_town">
                            <small class="help-block form-text"> <a href="">para lugares de carga fuera de zona.</a> </small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 mt-1">
                            <label class="form-control-label">Remarks:</label>
                        </div>
                        <div class="col-sm-10 mt-1">
                            <textarea name="remarks" placeholder="Remarks...." cols="85" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-2">
                            <button type="submit" name="cargar_lugar" class="btn btn-primary">Agregar Lugar</button>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>