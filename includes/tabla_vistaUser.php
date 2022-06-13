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
                                    <h3 style="text-align:center;">Unidad</h3>
                                    <div class="card border border-secondary p-4">
                                        <div class="card-body">
                                            <?php if ($unidad = mysqli_fetch_assoc($result_unidad)) { ?>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="row">
                                                            <h5>Transporte:</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $unidad['transport']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <h5>ATA:</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $unidad['transport_agent']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">
                                                            <h5>Chofer:</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $unidad['driver']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <h5>Tractor:</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $unidad['truck']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <h5>Semi:</h5>
                                                        </div>
                                                        <div class="row">
                                                            <p><?php echo $unidad['truck_semi']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                            <?php } ?>
                
                                        </div>
                                    </div>
                                    <h3 style="text-align: center;">status</h3>
                                    <div class="card border border-secondary p-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                
                                                if ($rows = mysqli_fetch_assoc($result_status)) { ?>
                                                    <div class="col-sm-3">
                                                        <p><?php echo $rows['main_status']; ?></p>
                                                    </div>
                                                    <div style="text-align:center;" class="col-sm-6">
                                                        <p><?php echo $rows['status']; ?></p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <p><?php echo $rows['created_at']; ?></p>
                                                    </div>
                
                                                <?php
                                                }
                                                ?>
                
                                            </div>
                                        </div>
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
                
                        <!--Final Modal View CNTR-->
                