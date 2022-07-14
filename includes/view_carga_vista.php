<div class="container mt-2">
    <div style="border-radius: 10px;margin: 5rem 0rem 2rem 0rem; " class="card border-secondary">
        <div class="card-header text-center">
            <h4 class="box-title"> Datos de la carga ID: <?php echo $id; ?></h4>
        </div>
        <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Booking: </strong> <?php echo $booking; ?></h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Referencia: </strong> <?php echo $ref_customer; ?></h4>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Lugar de Carga: </strong> <?php echo $load_place; ?></h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Lugar de Descarga: </strong> <?php echo $unload_place; ?></h4>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Cut Off físico: </strong> <?php echo $cut_off_fis; ?></h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Cut Off Documental: </strong> <?php echo $cut_off_doc; ?></h4>
                </div>
            </div>
            <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Vessel - Voyage: </strong> <?php echo $vessel . '-' . $voyage; ?></h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> ETA - ETD: </strong> <?php echo $ETA . '-' . $ETD; ?></h4>
                </div>
            </div>
            <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Destino final: </strong> <?php echo $final_point; ?></h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="text-secondary"> <strong class="text-dark ml-2"> Aduana (despachante): </strong> <?php echo $custom_place . '(' . $custom_agent . ')'; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div style="border-radius: 10px; " class="card">
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
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a title="Editar CNTR" href="../formularios/formularioedicioncntr.php?id_cntr=<?php echo $id_cntr; ?>" class="btn btn-info mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                   
                                    <a title="Ver CNTR" type="button" class="btn btn-info mr-1" data-toggle="modal" data-target="#largeModal<?php echo $row['id_cntr']; ?>">
                                        <i style="color:white;" class="fa fa-eye"></i>
                                    </a>
                                    <a title="Documentación" class="btn btn-info mr-1" href="../includes/view_cargarDocsCntr.php?id=<?php echo $id_cntr; ?>">
                                        <i style="color:white;" class="fa fa-file"></i>
                                    </a>
                                    <a title="Eliminar CNTR" href="delete_cntr.php?id_cntr=<?php echo $id_cntr; ?>&id=<?php echo $id; ?>" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
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

        </div>

    </div>
</div>
<style>
    .dropzone {
        border-radius: 17px;
        border-style: dashed;
        color: #9EA5AA;
    }
</style>
<div class="container" id="docsCarga">
    <div style="border-radius: 10px;" class="card ">
        <div class="card-header" style="text-align:center;">
            <h4 class="box-title">Documentos de la Carga</h4>
        </div>
        <div style="background: white;padding: 3% 7% 4% 7%; border-radius: 7px;" class="card-body">
            <form action="https://botzero.ar/api/docs/<?php echo $booking; ?>" class="dropzone" id="my-awesome-dropzone">
                <div class="dz-message" data-dz-message>
                    <h2><span>Arrastrar los Archivos o hacer Click Aquí</span></h2>
                </div>
                <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
                <input type="hidden" name="cntr" id="cntr" value="0">
            </form>
            <div class="row mt-3 mb-3">
                <div class="col-sm-5 mx-auto text-center">
                    <button type="button" onclick="window.location.reload();" class="btn btn-primary btn-lg mx-auto">Cargar</button>
                </div>
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align:center;">
                    <tr>
                        <th>Documento</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="data">
                </tbody>
            </table>
            <div id="datas"></div>
        </div>
    </div>
    <script>
        <?php
        echo "var user ='$usuario';";
        ?>
        <?php
        echo "var booking ='$booking';";
        ?>
        <?php echo "var id = '$id';"?>
        //Verificar si existe el parámetro

        let url = 'https://botzero.ar/api/docsAtaReed/' + booking + '/' + user;
        console.log(url);
        fetch(url)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => console.log(error))

        const mostrarData = (data) => {
            console.log(data)
            let body = ''
            if (data.length == 0) {
                body += `<h3 class="text-center text-secondary">No hay archivos aun.</h3>`
                document.getElementById('datas').innerHTML = body

            } else {
                for (let i = 0; i < data.length; i++) {

                    body += `<tr>
                        <td style="width:40%">${data[i].name}</td>
                        <td>${data[i].user}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" >
                                <a class="btn btn-primary mr-2" href="https://botzero.ar/storage/${data[i].booking}/${data[i].doc}" download target="_blank">
                                    <i class="fa fa-download"></i>
                                </a>
                                <form action="https://botzero.ar/api/docsDel" method="PUT" class="p-0 ml-1 mb-0">
                                    <input type="hidden" name="link" id="link" value="https://botzero.tech/sandboxbotzero/includes/view_carga.php?id=${id}">
                                    <input type="hidden" name="id" value="${data[i].id}">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>`
                }
                document.getElementById('data').innerHTML = body
            }
        }
    </script>

    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            addRemoveLinks: true,
            success: function(file, response) {

            },
            error: function(file, response) {
                return false;
            }
        };
    </script>