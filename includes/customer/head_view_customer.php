<?php
    $usuario = $_SESSION['user'];
    $hoy = getdate();
?>
<br>
<div class="breadcrumbs">
    <div style="border-radius: 1rem; background:#2E303E; color:white;" class="breadcrumbs-inner btn-primary">
        <div class="row m-0">
            <div class="col-sm-4">
                <div style="background:#2E303E;" class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $usuario; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div style="background:#2E303E;" class="page-header float-right">
                    <div class="page-title">
                        <ol style="background:#2E303E;" class="breadcrumb text-right">
                            <li><a style="color:white;" href="../formularios/formulariodecarga.php">Nueva Carga</a></li>
                            <li><a style="color:white;" href="../views/view_customer.php">Mis Cargas</a></li>
                            <li><a style="color:gray;">Cotizaciones</a></li>
                            <li><a style="color:gray;">Documentación</a></li>
                            <li><a style="color:gray;">Calendario</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>