<div class="container">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Mis Consignee
        </div>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Razon Social</th>
                        <th>CUIT</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                        <th>Comentarios</th>
                        <th>Creado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $empresa = $_SESSION['company'];
                    $query = "SELECT * FROM `customer.cnee` WHERE `company` ='$empresa'";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_tasks)) {

                        $id = $row['id'];
                        $razon_social = $row['razon_social'];
                        $tax_id = $row['tax_id'];
                        $city = $row['city'];
                        $country = $row['country'];
                        $postal_code = $row['postal_code'];
                        $address = $row['address'];
                        $remarks = $row['remarks'];
                        $create_user = $row['create_user'];
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $razon_social; ?></td>
                        <td><?php echo $tax_id; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $country; ?></td>
                        <td><?php echo $remarks; ?></td>
                        <td><?php echo $create_user; ?></td>

                        <td style="text-align:center;">
                            <a title="Editar Cnee" data-toggle="modal" data-target="#editar<?php echo $id; ?>"
                                style="color: #17A589; padding:2%; ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Ver Cnee" data-toggle="modal" data-target="#ver<?php echo $id; ?>"
                                style="color: #17A589; padding:2%; ">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a title="Eliminar" href="../includes/delete_consignee.php?id=<?php echo $id; ?>"
                                style="color: #17A589; padding:2%; ">
                                <i class="fa fa-trash"></i>
                            </a>


                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                    Consignee <strong><?php echo $razon_social; ?></strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="../formularios/edit_consignee.php?id=<?php echo $id; ?>" method="POST">
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label" for="">Razon Social:</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="razon_social"
                                                value="<?php echo $razon_social; ?>">
                                        </div>
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label" for="">CUIT:</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="number" name="tax_id"
                                                value="<?php echo $tax_id; ?>">
                                            <p>(sin guiones)</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 pt-2">
                                            <label class="form-control-label">Dirección:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; " type="text"
                                                name="address" value="<?php echo $address; ?>">
                                        </div>
                                        <div class="col-sm-1 pt-2">
                                            <label class="form-control-label">Ciudad:</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"
                                                type="text" name="city" value="<?php echo $city; ?>">
                                        </div>
                                        <div class="col-sm-1 pt-2">
                                            <label class="form-control-label">Pais:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; margin-left:1%;"
                                                type="text" name="country" value="<?php echo $country; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-2 mt-1">
                                            <label class="form-control-label">Código Postal:</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input class="form-control" style="margin-right: 1%; " type="text"
                                                name="postal_code" value="<?php echo $postal_code; ?>">
                                        </div>
                                        <div class="col-sm-2 mt-1">
                                            <label class="form-control-label">Comentarios:</label>
                                        </div>
                                        <div class="col-sm-3 mt-1">
                                            <textarea name="remarks" cols="85" rows="5"
                                                class="form-control"><?php echo $remarks; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="editar_consignee"
                                                class="btn btn-primary">Editar</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">cerrar</button>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Final Modal View CNTR-->
                <div class="modal fade" id="ver<?php echo $id; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles
                                    <strong><?php echo $razon_social; ?></strong></h4>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label" for="">Razon Social:</label>
                                    </div>
                                    <div class="col-sm-4 pt-2">
                                        <p><?php echo $razon_social; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label" for="">CUIT:</label>
                                    </div>
                                    <div class="col-sm-4 pt-2">
                                        <p><?php echo $tax_id; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label" for="">Dirección</label>
                                    </div>
                                    <div class="col-sm-8 pt-2">
                                        <p><?php echo $address . ' - ' . $city . ' - ' . $country . ' (' . $postal_code . ')'; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 pt-2">
                                        <label class="form-control-label" for="">Comentarios</label>
                                    </div>
                                    <div class="col-sm-2 pt-2">
                                        <p><?php echo $remarks; ?></p>
                                    </div>
                                </div>

                                <br>
                                <div class="row form-group">
                                    <div class="col-sm-5"></div>

                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">cerrar</button>
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
            </table>
        </div>
        <form action="../Report_Customer/misConsignee.php" method="POST">
            <div class="row">
                <div class="col-sm-6 mx-auto text-center">

                    <button type="submit" id="export_data" name="export_data" value="Export to excel"
                        class="btn btn-primary">Descargar Listado</button>
                    <button type="button" data-toggle="modal" data-target="#agregarATA"
                        class="btn btn-outline-primary">Agregar Consignee</button>

                </div>
            </div>
        </form>
        <br>
    </div>
</div>
<!-- Modal Agegar ATA -->
<div class="modal fade" id="agregarATA" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel"><strong>Agregar
                        Consignee</strong>
                </h4>
            </div>
            <div class="modal-body">
                <form action="../formularios/misConsignee.php" method="POST">
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label" for="">Razon Social:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="razon_social" placeholder="Empresa SA"
                                required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label" for="">CUIT:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="tax_id" placeholder="CUIT / RUT / NIT"
                                required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 pt-2">
                            <label class="form-control-label">Direccion:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="address"
                                placeholder="Street Name 188.." required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Ciudad:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text"
                                name="city" placeholder="New York" required>
                        </div>
                        <div class="col-sm-1 pt-2">
                            <label class="form-control-label">Pais:</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" style="margin-right: 1%; margin-left:1%;" type="text"
                                name="country" placeholder="USA" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 mt-1">
                            <label class="form-control-label">Código Postal:</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" style="margin-right: 1%; " type="text" name="postal_code"
                                placeholder="10001" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2 mt-1">
                            <label class="form-control-label">Comentarios:</label>
                        </div>
                        <div class="col-sm-3 mt-1">
                            <textarea name="remarks" placeholder="Remarks...." cols="85" rows="5"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-2">
                            <button type="submit" name="cargar_consignee" class="btn btn-primary">Agregar
                                Consignee</button>
                        </div>
                        <div class="col-sm-5"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>