<div class="container">
    <div style="border-radius: 10px; background: #9EA5AA; " class="card border border-secondary">
        <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <h4>ID:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $id; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Booking:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $booking; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Referencia:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $ref_customer; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Lugar de Carga:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $load_place; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Puerto de Carga:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $unload_place; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Cut Off Físico:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $cut_off_fis; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Cut Off Físico:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $cut_off_fis; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Vessel:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $vessel . '-' . $voyage; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Cut Off Doc:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $cut_off_doc; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>ETA:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $ETA; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>ETD:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $ETD; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Destino Final:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $final_point; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Lugar de Aduana:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $custom_place; ?></h4>
                </div>
            </div>
            <hr style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Despachante:</h4>
                </div>
                <div class="col">
                    <h4><?php echo $custom_agent; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div style="border-radius: 10px; background: gainsboro; " class="card">
        <div id="detalleCNTR" class="card-header" style="text-align:center;">
            <h4 class="box-title">Detalles de Contentedores</h4>
        </div>
        <div style="background:white;padding: 3% 7% 2% 7%;" class="card-body">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Numero</th>
                        <th>Precinto</th>
                        <th>Tipo</th>
                        <th>Transporte</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $user = $_SESSION['user'];
                    $query = "SELECT * FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE carga.booking = '$booking'";
                    $result_tasks = mysqli_query($conn, $query);

                    $query_int = "SELECT * FROM instruction WHERE booking = '$booking'";
                    $result_int = mysqli_query($conn, $query_int);

                    if ($result_int >= 0) {
                        $transport = "N/A";
                    } else {
                        $transport = $row['transport'];
                    }

                    ?>
                    <?php if (mysqli_num_rows($result_tasks) > 0) {

                        while ($row = mysqli_fetch_assoc($result_tasks)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id_cntr']; ?></td>
                                <td><?php echo $row['cntr_number']; ?></td>
                                <td><?php echo $row['cntr_seal']; ?></td>
                                <td><?php echo $row['cntr_type']; ?></td>
                                <td><?php echo $transport; ?></td>
                                <td><?php echo $row['main_status'];
                                    $cntr_number = $row['cntr_number'];
                                    $id_cntr = $row['id_cntr'];
                                    $id = $row['id'];
                                    $query_status = "SELECT * FROM status WHERE cntr_number = '$cntr_number' ORDER BY `status`.`created_at` DESC";
                                    $result_status = mysqli_query($conn, $query_status);

                                    $query_unidad = "SELECT * FROM asign WHERE cntr_number = '$cntr_number'";
                                    $result_unidad = mysqli_query($conn, $query_unidad);


                                    ?></td>
                                <td style="text-align:center;">
                                    <a title="Editar CNTR" href="../formularios/formularioedicioncntr.php?id_cntr=<?php echo $id_cntr; ?>" class="btn btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Eliminar CNTR" href="delete_cntr.php?id_cntr=<?php echo $id_cntr; ?>&id=<?php echo $id; ?>" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a title="Ver CNTR" type="button" class="btn btn-info" data-toggle="modal" data-target="#largeModal<?php echo $row['id_cntr']; ?>">
                                        <i style="color:white;" class="fa fa-eye"></i>
                                    </a>
                                    <a title="Documentación" type="button" class="btn btn-success" data-toggle="modal" data-target="#documentacion<?php echo $id_cntr; ?>">
                                        <i style="color:white;" class="fa fa-file"></i>
                                    </a>
                                    <!--Modal View CNTR-->
                                    <div class="modal fade" id="largeModal<?php echo $row['id_cntr']; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                        Detalles de CNTR <strong><?php echo $row['cntr_number']; ?></strong>
                                                    </h4>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="card border border-secondary">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">id:
                                                                        </div>
                                                                        <div class="col-sm-6"><?php echo $row['id_cntr']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <hr style="margin: 0%;">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">Precinto
                                                                        </div>
                                                                        <div class="col-sm-6"><?php echo $row['cntr_seal']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <hr style="margin: 0%;">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">Seteo
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <?php echo 'T°: ' . $row['set_']; ?></div>
                                                                        <div class="col-sm-2">
                                                                            <?php echo 'H°: ' . $row['set_humidity']; ?></div>
                                                                        <div class="col-sm-2">
                                                                            <?php echo 'V°: ' . $row['set_vent']; ?></div>
                                                                    </div>
                                                                    <hr style="margin: 0%;">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">Retiro
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <?php echo $row['retiro_place']; ?></div>
                                                                    </div>
                                                                    <hr style="margin: 0%;">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">Aduana:
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <?php echo $row['custom_place']; ?></div>
                                                                    </div>
                                                                    <hr style="margin: 0%;">
                                                                    <div class="row">
                                                                        <div style="text-align:right;" class="col-sm-6">Puerto
                                                                            de Carga:</div>
                                                                        <div class="col-sm-6">
                                                                            <?php echo $row['unload_place']; ?></div>
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
                                </td>
                            </tr>


                    <?php
                        }
                    } else {

                        echo 'no hay row';
                    }; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-5"></div>
                <a type="button" class="btn btn-primary" href='../formularios/formulariodecntr.php?id=<?php echo $id; ?>'>Agregar Contenedor</a>
                <div class="col-sm-5"></div>
            </div>
            <!--Modal View CNTR-->
            <?php
            $query_modal = "SELECT * FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE carga.booking = '$booking'";
            $result_modal = mysqli_query($conn, $query_modal);

            while ($row = mysqli_fetch_assoc($result_modal)) { ?>

                <div class="modal fade" id="documentacion<?php echo $row['id_cntr']; ?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Documentación de
                                    CNTR <strong><?php echo $row['cntr_number']; ?></strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="container">

                                    <?php
                                    $id_cntr = $row['id_cntr'];
                                    $query_doc = "SELECT document_invoice, document_packing, interchange, cntr_crt, cntr_micdta FROM cntr WHERE id_cntr = '$id_cntr'";
                                    $result_doc = mysqli_query($conn, $query_doc);
                                    $row = mysqli_fetch_array($result_doc);

                                    $document_invoice = $row['document_invoice'];
                                    $document_packing = $row['document_packing'];
                                    $interchange = $row['interchange'];
                                    $cntr_crt = $row['cntr_crt'];
                                    $cntr_micdta = $row['cntr_micdta'];

                                    if ($interchange == null) {
                                        $estado_interchange  = 'disabled';
                                        $title_interchange  = 'No hay Documeto';
                                        $class_interchange  = 'secondary';
                                        $color_interchange = 'gray';
                                    } else {
                                        $estado_interchange  = '';
                                        $class_interchange  = 'primary';
                                        $color_interchange = 'blue';
                                        $title_interchange = $interchange;
                                    };

                                    if ($document_packing == null) {
                                        $estado_document_packing  = 'disabled';
                                        $title_document_packing  = 'No hay Documeto';
                                        $class_document_packing  = 'secondary';
                                        $color_document_packing = 'gray';
                                    } else {
                                        $estado_document_packing  = '';
                                        $class_document_packing  = 'primary';
                                        $color_document_packing = 'blue';
                                        $title_document_packing = $document_packing;
                                    };
                                    if ($document_invoice == null) {
                                        $estado_document_invoice  = 'disabled';
                                        $title_document_invoice  = 'No hay Documeto';
                                        $class_document_invoice  = 'secondary';
                                        $color_document_invoice = 'gray';
                                    } else {
                                        $estado_document_invoice  = '';
                                        $class_document_invoice  = 'primary';
                                        $color_document_invoice = 'blue';
                                        $title_document_invoice = $document_invoice;
                                    };
                                    if ($cntr_crt == null) {
                                        $estado_cntr_crt  = 'disabled';
                                        $title_cntr_crt  = 'No hay Documeto';
                                        $class_cntr_crt  = 'secondary';
                                        $color_cntr_crt = 'gray';
                                    } else {
                                        $estado_cntr_crt  = '';
                                        $class_cntr_crt = 'primary';
                                        $color_cntr_crt = 'blue';
                                        $title_cntr_crt = $cntr_crt;
                                    };
                                    if ($cntr_micdta == null) {
                                        $estado_cntr_micdta  = 'disabled';
                                        $title_cntr_micdta  = 'No hay Documeto';
                                        $class_cntr_micdta  = 'secondary';
                                        $color_cntr_micdta = 'gray';
                                    } else {
                                        $estado_cntr_micdta  = '';
                                        $class_cntr_micdta = 'primary';
                                        $color_cntr_micdta = 'blue';
                                        $title_cntr_micdta = $cntr_crt;
                                    };
                                    ?>
                                    <div style="background: white;padding: 3% 7% 4% 7%; border-radius: 7px;" class="card-body">
                                        <div class="row" style="text-align: center;">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-2 mr-2">
                                                <div class="card">
                                                    <div class="card-body" style="text-align: center;">
                                                        <a class="btn btn-outline-<?php echo $class_interchange; ?>" title="<?php echo $title_interchange; ?>" href="../formularios/interchange/<?php echo $booking . '/' . $id_cntr . '/' . $interchange; ?>" download="<?php echo $interchange; ?>" <?php echo $estado_interchange; ?>><i class="fa fa-file-o"></i></a>

                                                        <br>
                                                        <p style="margin-bottom: 0%;margin-top: 9%; font-size: 12px; color:<?php echo $color_interchange; ?>">
                                                            IN-CH</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-2 mr-2">
                                                <div class="card">
                                                    <div class="card-body" style="text-align: center;">
                                                        <a class="btn btn-outline-<?php echo $class_document_packing; ?>" title="<?php echo $title_document_packing; ?>" href="../formularios/archivos_packing/<?php echo $booking . '/' . $id_cntr . '/' . $document_packing; ?>" download="<?php echo $document_packing; ?>" <?php echo $estado_document_packing; ?>><i class="fa fa-file-o"></i></a>

                                                        <br>
                                                        <p style="margin-bottom: 0%;margin-top: 9%; font-size: 12px; color:<?php echo $color_document_packing; ?>">
                                                            PL</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-2 mr-2">
                                                <div class="card">
                                                    <div class="card-body" style="text-align: center;">
                                                        <a class="btn btn-outline-<?php echo $class_document_invoice; ?>" title="<?php echo $title_document_invoice; ?>" href="../formularios/archivos_invoice/<?php echo $booking . '/' . $id_cntr . '/' . $document_invoice; ?>" download="<?php echo $document_invoice; ?>" <?php echo $estado_document_invoice; ?>><i class="fa fa-file-o"></i></a>

                                                        <br>
                                                        <p style="margin-bottom: 0%;margin-top: 9%; font-size: 12px; color:<?php echo $color_document_invoice; ?>">
                                                            IN</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-2 mr-2">
                                                <div class="card">
                                                    <div class="card-body" style="text-align: center;">
                                                        <a class="btn btn-outline-<?php echo $class_cntr_crt; ?>" title="<?php echo $title_cntr_crt; ?>" href="../formularios/cntr_crt/<?php echo $booking . '/' . $id_cntr . '/' . $cntr_crt; ?>" download="<?php echo $cntr_crt; ?>" <?php echo $estado_cntr_crt; ?>><i class="fa fa-file-o"></i></a>

                                                        <br>
                                                        <p style="margin-bottom: 0%;margin-top: 9%; font-size: 12px; color:<?php echo $color_cntr_crt; ?>">
                                                            CRT</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-2 mr-2">
                                                <div class="card">
                                                    <div class="card-body" style="text-align: center;">
                                                        <a class="btn btn-outline-<?php echo $class_cntr_micdta; ?>" title="<?php echo $title_cntr_micdta; ?>" href="../formularios/cntr_micdta/<?php echo $booking . '/' . $id_cntr . '/' . $cntr_micdta; ?>" download="<?php echo $cntr_micdta; ?>" <?php echo $estado_cntr_micdta; ?>><i class="fa fa-file-o"></i></a>

                                                        <br>
                                                        <p style="margin-bottom: 0%;margin-top: 9%; font-size: 12px; color:<?php echo $color_cntr_micdta; ?>">
                                                            MIC DTA</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                        </div>
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
        </div>
    <?php
            } ?>
    </div>

</div>
<div style="background: white;">
</div>
<div class="container">
    <div style="border-radius: 10px; background: #9EA5AA; " class="card border border-secondary">
        <div class="card-header" style="text-align:center;">
            <h4 class="box-title">Documentos de la Carga</h4>
        </div>

        <?php

        $query_doc = "SELECT document_bookingConf FROM carga WHERE booking = '$booking'";
        $result_doc = mysqli_query($conn, $query_doc);
        $row = mysqli_fetch_array($result_doc);

        $document_bookingConf = $row['document_bookingConf'];

        if ($document_bookingConf == null) {
            $estado_document_bookingConf  = 'disabled';
            $title_document_bookingConf  = 'No hay Documeto';
            $class_document_bookingConf = 'secondary';
            $color_document_bookingConf = 'gray';
            $href_document_bookingConf = '';
            $download = '';
        } else {
            $estado_document_bookingConf  = '';
            $class_document_bookingConf  = 'primary';
            $color_document_bookingConf = 'blue';
            $title_document_bookingConf = $document_bookingConf;
            $href_document_bookingConf = 'href="../formularios/archivos_bookingConf/' . $booking . '/' . $title_document_bookingConf;
            $download = 'download';
        };


        ?>
        <div style="background: white;padding: 3% 7% 4% 7%; border-radius: 7px;" class="card-body">
            <div class="row" style="text-align: center;">
                <div class="col-sm-1"></div>
                <div class="col-sm-2 mr-2">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <a class="btn btn-outline-secondary" title="No hay Documento" disabled><i class="fa fa-file-o"></i></a>

                            <br>
                            <p style="margin-bottom: 0%;margin-top: 9%; color:gray">FC Carga</p>
                        </div>
                    </div>

                </div>
                <div class="col-sm-2 mr-2">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <a class="btn btn-outline-secondary" title="No hay Documento" disabled><i class="fa fa-file-o"></i></a>

                            <br>
                            <p style="margin-bottom: 0%;margin-top: 9%; color:gray; font-size:15px;">FC Gastos E.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 mr-2">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <a class="btn btn-outline-<?php echo $class_document_bookingConf; ?>" title="<?php echo $title_document_bookingConf; ?>" <?php echo $href_document_bookingConf . '" ' . $download; ?> <?php echo $estado_document_bookingConf; ?>">
                                <i class="fa fa-file-o"></i>
                            </a>

                            <br>
                            <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_document_bookingConf; ?>">
                                Booking</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 mr-2">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <a class="btn btn-outline-secondary" title="No hay Documento" disabled><i class="fa fa-file-o"></i></a>

                            <br>
                            <p style="margin-bottom: 0%;margin-top: 9%; color:gray">N. Credito</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 mr-2">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <a class="btn btn-outline-secondary" title="No hay Documento" disabled><i class="fa fa-file-o"></i></a>

                            <br>
                            <p style="margin-bottom: 0%;margin-top: 9%; color:gray">N. Debito</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>

            </div>
        </div>
    </div>
</div>