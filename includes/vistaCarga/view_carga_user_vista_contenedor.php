<div id="detallecntr" style="border-radius: 10px;" class="card">
    <div class="card-header" style="text-align:center;">
        <h4 class="box-title">Detalles de Contentedores</h4>
    </div>
    <div style="background:white;padding: 3% 4% 2% 4%;;" class="card-body">
        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead style="text-align: center;">
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Precinto</th>
                    <th>Tipo</th>
                    <th>Lugar de Carga</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user = $_SESSION['user'];

                $query = "SELECT * FROM carga INNER JOIN `cntr` ON carga.booking = cntr.booking WHERE carga.booking = '$booking'";
                $result_tasks = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result_tasks)) {

                    $cntr_number = $row['cntr_number'];
                    $id_cntr = $row['id_cntr'];

                    $query_asigancion = "SELECT * FROM asign INNER JOIN cntr ON asign.booking = cntr.booking WHERE cntr.id_cntr = '$id_cntr'";
                    $asignacion = mysqli_query($conn, $query_asigancion);
                    $rows = mysqli_fetch_assoc($asignacion);
                ?>
                    <tr>
                        <td><?php echo $row['id_cntr']; ?></td>
                        <td><?php echo $row['cntr_number']; ?></td>
                        <td><?php echo $row['cntr_seal']; ?></td>
                        <td><?php echo $row['cntr_type']; ?></td>
                        <td><?php echo $row['load_place']; ?></td>
                        <td><?php echo $row['load_date']; ?></td>
                        <td style="text-align:center;">
                            <!--Button ASIGNADA CNTR-->
                            <a title="Asignar Unidad" type="button" data-toggle="modal" data-target="#asignar<?php echo $row['id_cntr']; ?>" style="color: #17A589; padding:2%;">
                                <i class="fa fa-truck"></i>
                            </a>
                            <!--Modal ASIGNADA CNTR-->
                            <div class="modal fade" id="asignar<?php echo $row['id_cntr'] ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles de CNTR <strong><?php echo $row['cntr_number']; ?></strong></h4>

                                        </div>
                                        <div class="modal-body">
                                            <div class="card border border-secondary">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2"></div>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">id:</div>
                                                                <div class="col-sm-6"><?php echo $row['id_cntr']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Precinto</div>
                                                                <div class="col-sm-6"><?php echo $row['cntr_seal']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Seteo</div>
                                                                <div class="col-sm-2"><?php echo 'T°: ' . $row['set_']; ?></div>
                                                                <div class="col-sm-2"><?php echo 'H°: ' . $row['set_humidity']; ?></div>
                                                                <div class="col-sm-2"><?php echo 'V°: ' . $row['set_vent']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Retiro</div>
                                                                <div class="col-sm-6"><?php echo $row['retiro_place']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Aduana:</div>
                                                                <div class="col-sm-6"><?php echo $row['custom_place']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Puerto de Carga:</div>
                                                                <div class="col-sm-6"><?php echo $row['unload_place']; ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="../formularios/asignar_carga.php" method="POST">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Asignar Unidad
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="text">Transporte:</label>
                                                                    <select name="transport[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="0">.-Seleccionar Transporte.-</option>
                                                                        <?php



                                                                        $query_transport = $conn->query("SELECT * FROM `transporte`");
                                                                        while ($transport = mysqli_fetch_array($query_transport)) {
                                                                            echo '<option value="' . $transport['razon_social'] . '">' . $transport['razon_social'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="text">ATA:</label>
                                                                    <select name="transport_agent[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="0">.-Seleccionar ATA.-</option>
                                                                        <?php



                                                                        $query_ata = $conn->query("SELECT * FROM `ata`");
                                                                        while ($ata = mysqli_fetch_array($query_ata)) {
                                                                            echo '<option value="' . $ata['razon_social'] . '">' . $ata['razon_social'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="text">Chofer:</label>
                                                                    <select name="driver[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="0">.-Seleccionar Chofer.-</option>
                                                                        <?php



                                                                        $query_driver = $conn->query("SELECT * FROM `choferes`");
                                                                        while ($driver = mysqli_fetch_array($query_driver)) {
                                                                            echo '<option value="' . $driver['nombre'] . '">' . $driver['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="text">Camion:</label>
                                                                    <input type="text" name="truck">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="text">Acoplado:</label>
                                                                    <input type="text" name="truck_semi">
                                                                    <input type="hidden" name="cntr_number" value="<?php echo $row['cntr_number']; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                    <input type="hidden" name="booking" value="<?php echo $booking; ?>">
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <!--Button para enviar solicitud Asignación -->

                                                            <button class="btn btn-primary" type="submit" name="asignar">asignar unidad</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-2 mb-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            </div>
                                            <div class="col-sm-5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Button Editar CNTR-->
                            <a title="Editar asignación" type="button" data-toggle="modal" data-target="#editar<?php echo $row['id_cntr']; ?>" style="color: #17A589; padding:2%;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Documentación" class="btn btn-success" href="../includes/view_cargarDocsCntr.php?id=<?php echo $row['id_cntr']; ?>">
                                        <i style="color:white;" class="fa fa-file"></i>
                            
                            <!--Modal editar CNTR-->
                            <div class="modal fade" id="editar<?php echo $row['id_cntr'] ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles de CNTR <strong><?php echo $row['cntr_number']; ?></strong></h4>

                                        </div>

                                        <div class="modal-body">
                                            <div class="card border border-secondary">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-2"></div>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">id:</div>
                                                                <div class="col-sm-6"><?php echo $row['id_cntr']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Precinto</div>
                                                                <div class="col-sm-6"><?php echo $row['cntr_seal']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Seteo</div>
                                                                <div class="col-sm-2"><?php echo 'T°: ' . $row['set_']; ?></div>
                                                                <div class="col-sm-2"><?php echo 'H°: ' . $row['set_humidity']; ?></div>
                                                                <div class="col-sm-2"><?php echo 'V°: ' . $row['set_vent']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Retiro</div>
                                                                <div class="col-sm-6"><?php echo $row['retiro_place']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Aduana:</div>
                                                                <div class="col-sm-6"><?php echo $row['custom_place']; ?></div>
                                                            </div>
                                                            <hr style="margin: 0%;">
                                                            <div class="row">
                                                                <div style="text-align:right;" class="col-sm-6">Puerto de Carga:</div>
                                                                <div class="col-sm-6"><?php echo $row['unload_place']; ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="../formularios/editar_asignacion.php?cntr_number=<?php echo $row['cntr_number'] . '&chofer=' . $rows['driver']; ?>" method="POST">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Unidad Asignada.
                                                    </div>


                                                    <div class="card-body">
                                                        <div class="container">
                                                            <div class="row">


                                                                <div class="col">
                                                                    <label for="text">Transporte:</label>
                                                                    <select name="transport[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="<?php echo $rows['transport'] ?>"><?php echo $rows['transport'] ?></option>
                                                                        <?php



                                                                        $query_transport = $conn->query("SELECT * FROM `transporte`");
                                                                        while ($transport = mysqli_fetch_array($query_transport)) {
                                                                            echo '<option value="' . $transport['razon_social'] . '">' . $transport['razon_social'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="text">ATA:</label>
                                                                    <select name="transport_agent[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="<?php echo $rows['transport_agent'] ?>"><?php echo $rows['transport_agent'] ?></option>
                                                                        <?php



                                                                        $query_ata = $conn->query("SELECT * FROM `ata`");
                                                                        while ($ata = mysqli_fetch_array($query_ata)) {
                                                                            echo '<option value="' . $ata['razon_social'] . '">' . $ata['razon_social'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="text">Chofer:</label>
                                                                    <select name="driver[]" id="selectSm" class="form-control-sm form-control">
                                                                        <option value="<?php echo $rows['driver'] ?>"><?php echo $rows['driver'] ?></option>
                                                                        <?php



                                                                        $query_driver = $conn->query("SELECT * FROM `choferes`");
                                                                        while ($driver = mysqli_fetch_array($query_driver)) {
                                                                            echo '<option value="' . $driver['nombre'] . '">' . $driver['nombre'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="text">Camion:</label>
                                                                    <input type="text" name="truck" value="<?php echo $rows['truck'] ?>">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label for="text">Acoplado:</label>
                                                                    <input type="text" name="truck_semi" value="<?php echo $rows['truck_semi'] ?>">
                                                                    <input type="hidden" name="cntr_number" value="<?php echo $row['cntr_number']; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                    <input type="hidden" name="booking" value="<?php echo $booking; ?>">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <button class="btn btn-success" type="submit" name="editar">Editar unidad</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-2 mb-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            </div>
                                            <div class="col-sm-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Final Modal View CNTR-->

                            <a title="Generar Instrucción" type="button" href="../formularios/formularioInstructivo.php?id_cntr=<?php echo $row['id_cntr'] . '&cntr_number=' . $row['cntr_number']; ?>" style="color: #17A589; padding:2%;">
                                <i class="ri-file-line"></i>
                            </a>
                            <a title="Retiro de Vacio" type="button" href="../formularios/formularioderetiro.php?id_cntr=<?php echo $row['id_cntr'] . '&cntr_number=' . $row['cntr_number']; ?>" style="color: #17A589; padding:2%;">
                                <i class="fa fa-barcode"></i>
                            </a>

                            <a title="Editar Satatus" href="../formularios/actualizar_status.php?id_cntr=<?php echo $row['id_cntr'] ?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-bullseye"></i>
                            </a>

                            <a title="Agregar Costos" href="../formularios/profit_carga.php?id_cntr=<?php echo $row['id_cntr'] ?>" style="color: #17A589; padding:2%; ">
                                <i class="fa fa-dollar"></i>
                            </a>

                        </td>
                    </tr>
                    <!--Modal View CNTR-->
                    <div class="modal fade" id="largeModal<?php echo $row['id_cntr']; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles de CNTR <strong><?php echo $row['cntr_number']; ?></strong></h4>

                                </div>
                                <div class="modal-body">
                                    <div class="card border border-secondary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">id:</div>
                                                        <div class="col-sm-6"><?php echo $row['id_cntr']; ?></div>
                                                    </div>
                                                    <hr style="margin: 0%;">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">Precinto</div>
                                                        <div class="col-sm-6"><?php echo $row['cntr_seal']; ?></div>
                                                    </div>
                                                    <hr style="margin: 0%;">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">Seteo</div>
                                                        <div class="col-sm-2"><?php echo 'T°: ' . $row['set_']; ?></div>
                                                        <div class="col-sm-2"><?php echo 'H°: ' . $row['set_humidity']; ?></div>
                                                        <div class="col-sm-2"><?php echo 'V°: ' . $row['set_vent']; ?></div>
                                                    </div>
                                                    <hr style="margin: 0%;">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">Retiro</div>
                                                        <div class="col-sm-6"><?php echo $row['retiro_place']; ?></div>
                                                    </div>
                                                    <hr style="margin: 0%;">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">Aduana:</div>
                                                        <div class="col-sm-6"><?php echo $row['custom_place']; ?></div>
                                                    </div>
                                                    <hr style="margin: 0%;">
                                                    <div class="row">
                                                        <div style="text-align:right;" class="col-sm-6">Puerto de Carga:</div>
                                                        <div class="col-sm-6"><?php echo $row['unload_place']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 style="text-align: center;">Unidad Asignada</h3>
                                    <div class="card border border-secondary p-4">
                                        <div class="card-body">
                                            <div class="row" style="color:gray; text-align:center;">
                                                <div class="col">Chofer:</div>
                                                <div class="col">Camion:</div>
                                                <div class="col">Semi:</div>
                                                <div class="col">Transporte:</div>
                                                <div class="col">ATA:</div>
                                            </div>
                                            <div class="row" style="text-align: center;">
                                                <div class="col"><?php echo $rows['driver']; ?></div>
                                                <div class="col"><?php echo $rows['truck']; ?></div>
                                                <div class="col"><?php echo $rows['truck_semi']; ?></div>
                                                <div class="col"><?php echo $rows['transport']; ?></div>
                                                <div class="col"><?php echo $rows['transport_agent']; ?></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 mb-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                        <a class="btn btn-success" href="../formularios/formularioInstructivo.php?cntr_number=<?php echo $cntr_number; ?>">Instructivo</a>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>