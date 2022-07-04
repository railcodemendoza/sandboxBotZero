<?php

$user = $_SESSION['user'];

$query_asigned = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'ASIGNED'";
$result_asigned = mysqli_query($conn, $query_asigned);
if (mysqli_num_rows($result_asigned) == 1) {
    $row = mysqli_fetch_array($result_asigned);
    $cantidad_asigned = $row['count(main_status)'];
}

$query_go_to_load = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'GO TO LOAD'";
$result_go_to_load = mysqli_query($conn, $query_go_to_load);
if (mysqli_num_rows($result_go_to_load) == 1) {
    $row = mysqli_fetch_array($result_go_to_load);
    $cantidad_go_to_load =  $row['count(main_status)'];
}

$query_loading = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'LOADING'";
$result_loading = mysqli_query($conn, $query_loading);
if (mysqli_num_rows($result_loading) == 1) {
    $row = mysqli_fetch_array($result_loading);
    $cantidad_loading =  $row['count(main_status)'];
}

$query_custom_place = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'CUSTOM PLACE'";
$result_custom_place = mysqli_query($conn, $query_custom_place);
if (mysqli_num_rows($result_custom_place) == 1) {
    $row = mysqli_fetch_array($result_custom_place);
    $cantidad_custom_place =  $row['count(main_status)'];
}

$query_go_to_unload = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'GO TO UNLOAD'";
$result_go_to_unload = mysqli_query($conn, $query_go_to_unload);
if (mysqli_num_rows($result_go_to_unload) == 1) {
    $row = mysqli_fetch_array($result_go_to_unload);
    $cantidad_go_to_unload =  $row['count(main_status)'];
}

$query_staking = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'STAKING'";
$result_staking = mysqli_query($conn, $query_staking);
if (mysqli_num_rows($result_staking) == 1) {
    $row = mysqli_fetch_array($result_staking);
    $cantidad_staking =  $row['count(main_status)'];
}

$query_on_board = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'ON BOARD'";
$result_on_board = mysqli_query($conn, $query_on_board);
if (mysqli_num_rows($result_on_board) == 1) {
    $row = mysqli_fetch_array($result_on_board);
    $cantidad_on_board =  $row['count(main_status)'];
}

$query_all = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status != 'TERMINADA'";
$result_all = mysqli_query($conn, $query_all);
if (mysqli_num_rows($result_all) == 1) {
    $row = mysqli_fetch_array($result_all);
    $cantidad_all =  $row['count(main_status)'];
}

$query_lunes = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 0";
$result_lunes = mysqli_query($conn, $query_lunes);
if (mysqli_num_rows($result_lunes) == 1) {
    $row = mysqli_fetch_array($result_lunes);
    $cantidad_lunes = $row['count(main_status)'];
}

$query_martes = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 1";
$result_martes = mysqli_query($conn, $query_martes);
if (mysqli_num_rows($result_martes) == 1) {
    $row = mysqli_fetch_array($result_martes);
    $cantidad_martes = $row['count(main_status)'];
}

$query_miercoles = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 2";
$result_miercoles = mysqli_query($conn, $query_miercoles);
if (mysqli_num_rows($result_miercoles) == 1) {
    $row = mysqli_fetch_array($result_miercoles);
    $cantidad_miercoles = $row['count(main_status)'];
}

$query_jueves = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 3";
$result_jueves = mysqli_query($conn, $query_jueves);
if (mysqli_num_rows($result_jueves) == 1) {
    $row = mysqli_fetch_array($result_jueves);
    $cantidad_jueves = $row['count(main_status)'];
}

$query_viernes = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 4";
$result_viernes = mysqli_query($conn, $query_viernes);
if (mysqli_num_rows($result_viernes) == 1) {
    $row = mysqli_fetch_array($result_viernes);
    $cantidad_viernes = $row['count(main_status)'];
}

$query_sabado = "SELECT count(main_status) from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE `user_cntr` = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 5";
$result_sabado = mysqli_query($conn, $query_sabado);
if (mysqli_num_rows($result_sabado) == 1) {
    $row = mysqli_fetch_array($result_sabado);
    $cantidad_sabado = $row['count(main_status)'];
}


$query_detalles_go_to_load = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'GO TO LOAD'";
$result_detalles_go_to_load = mysqli_query($conn, $query_detalles_go_to_load);

$query_detalles_loading = "SELECT cntr.cntr_number , cntr.cntr_type, carga.load_place, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'LOADING'";
$result_detalles_loading = mysqli_query($conn, $query_detalles_loading);

$query_detalles_custom_place = "SELECT cntr.cntr_number , cntr.cntr_type, carga.custom_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'CUSTOM PLACE'";
$result_detalles_custom_place = mysqli_query($conn, $query_detalles_custom_place);

$query_detalles_go_to_unload = "SELECT cntr.cntr_number , cntr.cntr_type, carga.unload_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'GO TO UNLOAD'";
$result_detalles_go_to_unload = mysqli_query($conn, $query_detalles_go_to_unload);

$query_detalles_staking = "SELECT cntr.retiro_place, carga.vessel, carga.voyage, cntr.cntr_number , cntr.cntr_type, carga.unload_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'STAKING'";
$result_detalles_staking = mysqli_query($conn, $query_detalles_staking);

$query_detalles_on_board = "SELECT carga.final_point , cntr.cntr_number, cntr.cntr_type, carga.vessel, carga.voyage, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'ON BOARD'";
$result_detalles_on_board = mysqli_query($conn, $query_detalles_on_board);

$query_detalles_all = "SELECT cntr.cntr_number , cntr.cntr_type, carga.shipper, cntr.main_status from cntr INNER JOIN carga ON carga.booking = cntr.booking where `user_cntr` = '$user' and cntr.main_status != 'TERMINADA' ORDER BY `cntr`.`main_status` ASC";
$result_detalles_all = mysqli_query($conn, $query_detalles_all);

$query_detalles_asigned = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'ASIGNED'";
$result_detalles_asigned = mysqli_query($conn, $query_detalles_asigned);

$query_detalles_lunes = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 0";
$result_detalles_lunes = mysqli_query($conn, $query_detalles_lunes);

$query_detalles_martes = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 1";
$result_detalles_martes = mysqli_query($conn, $query_detalles_martes);

$query_detalles_miercoles = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 2";
$result_detalles_miercoles = mysqli_query($conn, $query_detalles_miercoles);

$query_detalles_jueves = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 3";
$result_detalles_jueves = mysqli_query($conn, $query_detalles_jueves);

$query_detalles_viernes = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 4";
$result_detalles_viernes = mysqli_query($conn, $query_detalles_viernes);

$query_detalles_sabado = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND `load_date` <= (DATE_ADD(CURDATE(), INTERVAL 6 DAY)) AND load_date >= CURDATE() AND WEEKDAY(`load_date`) = 5";
$result_detalles_sabado = mysqli_query($conn, $query_detalles_sabado);

$query_activas = "SELECT count(main_status) from cntr WHERE main_status != 'NO ASIGNADA' AND main_status != 'ON BOARD'AND main_status != 'TERMINADA'";
$result_activas = mysqli_query($conn, $query_activas);
if (mysqli_num_rows($result_activas) == 1) {
    $row = mysqli_fetch_array($result_activas);
    $cantidad_activas =  $row['count(main_status)'];
}

$query_no_asigned = "SELECT count(main_status) from cntr WHERE main_status = 'NO ASIGNADA'";
$result_no_asigned = mysqli_query($conn, $query_no_asigned);
if (mysqli_num_rows($result_no_asigned) == 1) {
    $row = mysqli_fetch_array($result_no_asigned);
    $cantidad_no_asigned = $row['count(main_status)'];
}

$query_on_board = "SELECT count(main_status) from cntr where main_status = 'ON BOARD'";
$result_on_board = mysqli_query($conn, $query_on_board);
if (mysqli_num_rows($result_on_board) == 1) {
    $row = mysqli_fetch_array($result_on_board);
    $cantidad_on_board =  $row['count(main_status)'];
}

$query_problem = "SELECT count(main_status) from cntr where  main_status = 'CON PROBLEMA'";
$result_problem = mysqli_query($conn, $query_problem);
if (mysqli_num_rows($result_problem) == 1) {
    $row = mysqli_fetch_array($result_problem);
    $cantidad_problem =  $row['count(main_status)'];
}

$query_assigned = "SELECT count(main_status) from cntr where main_status = 'ASIGNADA'";
$result_assigned = mysqli_query($conn, $query_assigned);
if (mysqli_num_rows($result_assigned) == 1) {
    $row = mysqli_fetch_array($result_assigned);
    $cantidad_assigned =  $row['count(main_status)'];
}

$query_go_to_load = "SELECT count(main_status) from cntr where main_status = 'YENDO A CARGAR'";
$result_go_to_load = mysqli_query($conn, $query_go_to_load);
if (mysqli_num_rows($result_go_to_load) == 1) {
    $row = mysqli_fetch_array($result_go_to_load);
    $cantidad_go_to_load =  $row['count(main_status)'];
}

$query_loading = "SELECT count(main_status) from cntr where main_status = 'CARGANDO'";
$result_loading = mysqli_query($conn, $query_loading);
if (mysqli_num_rows($result_loading) == 1) {
    $row = mysqli_fetch_array($result_loading);
    $cantidad_loading =  $row['count(main_status)'];
}

$query_custom_place = "SELECT count(main_status) from cntr where  main_status = 'CUSTOM PLACE'";
$result_custom_place = mysqli_query($conn, $query_custom_place);
if (mysqli_num_rows($result_custom_place) == 1) {
    $row = mysqli_fetch_array($result_custom_place);
    $cantidad_custom_place =  $row['count(main_status)'];
}

$query_go_to_unload = "SELECT count(main_status) from cntr where main_status = 'YENDO A DESCARGAR'";
$result_go_to_unload = mysqli_query($conn, $query_go_to_unload);
if (mysqli_num_rows($result_go_to_unload) == 1) {
    $row = mysqli_fetch_array($result_go_to_unload);
    $cantidad_go_to_unload =  $row['count(main_status)'];
}

$query_staking = "SELECT count(main_status) from cntr where main_status = 'STAKING'";
$result_staking = mysqli_query($conn, $query_staking);
if (mysqli_num_rows($result_staking) == 1) {
    $row = mysqli_fetch_array($result_staking);
    $cantidad_staking =  $row['count(main_status)'];
}
?>

<div class="breadcrumbs">
    <h2 style="text-align: center; background:#17A589; color:white; padding-top:0.5%;">Cargas por Status</h2>
    <div class="breadcrumbs-inner">
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#go_to_load" class="stat-icon dib flat-color-3">
                                <i class="ti-truck"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_go_to_load; ?></span></div>
                                    <div class="stat-heading">Yendo a cargar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#loading" class="stat-icon dib flat-color-3">
                                <i class="ti-package"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_loading; ?></span></div>
                                    <div class="stat-heading">Cargando</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#custom" class="stat-icon dib flat-color-3">
                                <i class="ti-home"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_custom_place; ?></span></div>
                                    <div class="stat-heading">Aduana</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#go_to_unload" class="stat-icon dib flat-color-3">
                                <i class="ti-check"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_go_to_unload; ?></span></div>
                                    <div class="stat-heading">Yendo a descargar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#staking" class="stat-icon dib flat-color-3">
                                <i class="ti-shortcode"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_staking; ?></span></div>
                                    <div class="stat-heading">Staking</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#on_board" class="stat-icon dib flat-color-3">
                                <i class="ti-check-box"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_on_board; ?></span></div>
                                    <div class="stat-heading">On Board</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>