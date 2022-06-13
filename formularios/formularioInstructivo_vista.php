<div class="content" style="background: linear-gradient(to left, #17A589, #2E303E );">
    <div class="animated fadeIn">
        <div class="row">
            <div class="card">
                <div style="text-align:center;" class="card-header">
                    Datos que contendrá el Instructivo | <?php echo $type; ?> </div>
                <div style="padding-bottom: 0.25rem; background: #EFF2F3;" class="card-body card-block">
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Booking </strong> | <?php echo $booking ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Contenedor: </strong> | <?php echo $cntr_number ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <hr>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                            <h4><strong>Tipo de Contenedor </strong> | <?php echo $cntr_type; ?></h4>

                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Peso Neto</strong> | <?php echo $net_weight; ?> TONS</h4>
                        </div>
                    </div>
                    <hr style="margin: 0rem 0 1.5rem 11.5rem; width:40%;">
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Lugar de Retiro </strong> | <?php echo $retiro_place; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                            <h4><strong>Día de Carga </strong>| <?php echo $load_date; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Lugar de Carga </strong>| <?php echo $load_place; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-7">
                            <h4><strong>Direccion de Carga </strong>| <?php echo $direccion_de_carga; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Shipper </strong>| <?php echo $shipper; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Numero de factura </strong>| <?php echo $document_invoice; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            <h4><strong>Aduana </strong>| <?php echo $custom_place; ?></h4>
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Despachante </strong>| <?php echo $custom_agent; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Vessel </strong> | <?php echo $vessel . " - " . $voyage; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Armador </strong> | <?php echo $oceans_line; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>

                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Cut-off-físico </strong>| <?php echo $cut_off_fis; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Puerto de Carga </strong> | <?php echo $unload_place; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                            <h4><strong>Destino Final </strong> | <?php echo $final_point; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>Commodity </strong> | <?php echo $commodity; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <h4><strong>Transporte </strong> |<?php echo $transport; ?></h4>
                            <hr style="margin: 0.5rem;">
                        </div>
                        <div class="col-lg-4">
                            <h4><strong>ATA </strong>| <?php echo $transport_agent; ?></h4>
                        </div>
                    </div>
                    <br>
                </div>
                <form action="'../formularios/save_instructivo.php?cntr_number='<?php echo $cntr_number; ?>" class="form-horizontal" method="POST">

                    <div style=" background: #EFF2F3;" class="card">
                        <div style="text-align:center;" class="card-header">
                            Instrucciones de Tráfico:
                        </div>
                        <div style=" background: #EFF2F3;" class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Agencia de Ingreso:</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select name="agent_port[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="">.-Seleccionar agencia.-</option>
                                            <?php



                                            $query_agent_port = $conn->query("SELECT * FROM `agencias`");
                                            while ($agent_port = mysqli_fetch_array($query_agent_port)) {
                                                echo '<option value="' . $agent_port['description'] . '">' . $agent_port['description'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="transporte" value="<?php echo $transport; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Observaciones:</label>
                                </div>
                                <div class="col-10 col-md-8">
                                    <textarea name="observation_load" id="" class=" form-control" placeholder="Comentarios" cols="100" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style=" background: #EFF2F3;" class="card">
                        <div style="text-align:center;" class="card-header">
                            Acuerdo Comercial:
                        </div>
                        <div style=" background: #EFF2F3;" class="card-body card-block">
                            <div action="#" method="post" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col-2">
                                        <label for="city" class=" form-control-label">Facturar a:</label>
                                    </div>
                                    <div class="col-4">
                                        <select name="company_invoice_out[]" id="selectSm" class="form-control-sm form-control">
                                            <option value="">.-Seleccionar Razon Social.-</option>
                                            <?php
                                            $query_rz = $conn->query("SELECT * FROM `razon_social`");
                                            while ($rz = mysqli_fetch_array($query_rz)) {
                                                echo '<option value="' . $rz['title'] . '">' . $rz['title'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="transporte" value="<?php echo $transport; ?>">
                                </div>
                                <div class="row form-group">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Tarifa:</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="1500.00" name="out_usd" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="city" class="form-control-label">Modo de Pago:</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="modo_pago_out[]" id="selectSm" class="form-control-sm form-control" required>
                                                <option value="">.-Seleccionar modo.-</option>
                                                <?php
                                                $query_modos = $conn->query("SELECT * FROM `modos_de_pago`");
                                                while ($modos = mysqli_fetch_array($query_modos)) {
                                                    echo '<option value="' . $modos['title'] . '">' . $modos['title'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Plazo:</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="plazo_de_pago_out[]" id="selectSm" class="form-control-sm form-control" required>
                                                <option value="">.-Seleccionar plazo.-</option>
                                                <?php



                                                $query_plazos = $conn->query("SELECT * FROM `plazos_de_pago`");
                                                while ($plazos = mysqli_fetch_array($query_plazos)) {
                                                    echo '<option value="' . $plazos['title'] . '">' . $plazos['title'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style=" background: #EFF2F3;">
                            <p style="text-align:center;"> Formulario realizado ingresado <span style="color:blue; text-transform: capitalize;" name='user'><?php echo $_SESSION['user']; ?></span></p>
                        </div>
                        <div style=" background: #EFF2F3; margin:20px;" class="row">
                            <button style="text-align:center; margin-left: 45%; margin-right: 45%;" type="submit" name="save_instruction" class="btn btn-lg btn-info">
                                Instructivo
                            </button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->