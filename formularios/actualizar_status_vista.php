<?php include('actualizar_status_controller.php'); ?>
<div class="content">
    <div class="container">
        <div class="card">
            <div style="text-align:center; " class="card-header">
                <h4>Detalles de CNTR <strong><?php echo $cntr_number; ?></strong></h4>
            </div>
            <br>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Shipper: <strong><?php echo " " . $shipper; ?></strong></h4>
                        </div>
                        <div class="col">
                            <h4>Booking: <strong><?php echo " " . $booking; ?></strong></h4>
                        </div>
                        <div class="col">
                            <h4>Commodity: <strong><?php echo " " . $commodity; ?></strong></h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h4>Lugar de Retiro: <strong><?php echo " " . $retiro_place; ?></strong></h4>
                        </div>
                        <div class="col">
                            <h4>Lugar de Carga: <strong><?php echo " " . $load_place; ?></strong></h4>
                        </div>
                        <div class="col">
                            <h4>Lugar de Descarga: <strong><?php echo " " . $unload_place; ?></strong></h4>
                        </div>
                    </div>
                </div>
                <br>
                <hr style="width: 60%;">
                <br>
                <div class="container">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <theader>
                            <tr>
                                <th>Status</th>
                                <th>Detalle</th>
                                <th>Time</th>
                            </tr>
                        </theader>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM status WHERE cntr_number = '$cntr_number' ORDER BY `status`.`created_at` DESC";
                            $result_tasks = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                <tr>
                                    <td><?php echo $row['main_status']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <hr style="width: 60%;">
                <br>
                <div class="container">
                    <h4 style="text-align: center;">Actualizar datos de Status </h4>
                    <br>
                    <form action="../actualiza_status.php" method="POST">
                        <h4 style="text-align: center;">Main Status:</h4>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <select name="statusGral[]" id="selectSm" class="form-control-sm form-control">
                                    <option value="0">.-Seleccionar Status General.-</option>
                                    <?php



                                    $query_status = $conn->query("SELECT * FROM status_type");
                                    while ($status = mysqli_fetch_array($query_status)) {
                                        echo '<option value="' . $status['STATUS'] . '">' . $status['STATUS'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        <br>
                        <h4 style="text-align: center;">Descripcion:</h4>
                        <div class="row">
                            <input type="hidden" name="cntr" value="<?php echo $cntr_number; ?>">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <textarea placeholder="Unidad arrivando a Lugar de Carga " name="description" id="" cols="80" rows="10"></textarea>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5"> <input name="booking" type="hidden" value="<?php echo $booking; ?>"></div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" name="actualizarStatus" type="submit">
                                    Actualizar
                                </button>
                            </div>
                            <div class="col-sm-5"></div>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>