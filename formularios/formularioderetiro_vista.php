<?php include('formularioderetiro_controller.php') ?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark p-3">
                    <h4 style="color:white; text-align:center;">Instructivo de Retiro</h4>

                </div>
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <br>
                            <h5>Booking: <strong><?php echo $booking; ?></strong> </h5>
                            <hr>
                            <h5>Tomadro de Reseva: <strong><?php echo $cliente; ?></strong> </h5>
                            <hr>
                            <h5>Buque: <strong><?php echo $vessel . ' - ' . $voyage; ?></strong> </h5>
                            <hr>
                            <h5>Puerto de Carga: <strong><?php echo $unload_place; ?></strong> </h5>
                            <hr>
                            <h5>Puerto de descarga: <strong><?php echo $final_point; ?></strong> </h5>
                            <hr>
                            <h5>Tipo de Contenedor: <strong><?php echo $cntr_type; ?></strong> </h5>
                            <hr>
                            <h5>commodity: <strong><?php echo $commodity; ?></strong> </h5>
                            <hr>
                            <h5>Deposito de Retiro: <strong><?php echo $retiro_place; ?></strong> </h5>
                            <hr>
                            <h5>Armador: <strong><?php echo $oceans_line; ?></strong> </h5>
                            <hr>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <br>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-3">
                        <a href="https://botzero.ar/api/imprimirVacio?id_cntr=<?php echo $id_cntr; ?>" class="btn btn-outline-primary">
                            Descargar en PDF
                        </a>
                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
                <div class="row" style="text-align: center;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-3">

                        <a href="../includes/view_carga_user.php?id=<?php echo $id; ?>#detallecntr" class="btn btn-outline-secondary">
                            Volver
                        </a>
                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
            </section>
        </aside>
    </div>
    <div class="col-md-2"></div>
</div>
