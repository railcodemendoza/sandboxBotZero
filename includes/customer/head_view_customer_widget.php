<?php 

$user = $_SESSION['user'];



        $query_asigned = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'ASIGNADA'";
        $result_asigned= mysqli_query($conn, $query_asigned);
        if (mysqli_num_rows($result_asigned) == 1) {
            $row = mysqli_fetch_array($result_asigned);
            $cantidad_asigned = $row['count(main_status)'];}

        $query_go_to_load = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'YENDO A CARGAR'";
        $result_go_to_load = mysqli_query($conn, $query_go_to_load);
        if (mysqli_num_rows($result_go_to_load) == 1) {
            $row = mysqli_fetch_array($result_go_to_load);
            $cantidad_go_to_load =  $row['count(main_status)'];}

        $query_loading = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'CARGANDO'";
        $result_loading= mysqli_query($conn, $query_loading);
        if (mysqli_num_rows($result_loading) == 1) {
            $row = mysqli_fetch_array($result_loading);
            $cantidad_loading =  $row['count(main_status)'];}

        $query_custom_place = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'CUSTOM PLACE'";
        $result_custom_place= mysqli_query($conn, $query_custom_place);
        if (mysqli_num_rows($result_custom_place) == 1) {
            $row = mysqli_fetch_array($result_custom_place);
            $cantidad_custom_place =  $row['count(main_status)'];}
        
        $query_go_to_unload = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'YENDO A DESCARGAR'";
        $result_go_to_unload= mysqli_query($conn, $query_go_to_unload);
        if (mysqli_num_rows($result_go_to_unload) == 1) {
            $row = mysqli_fetch_array($result_go_to_unload);
            $cantidad_go_to_unload =  $row['count(main_status)'];}
        
        $query_staking = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'STAKING'";
        $result_staking= mysqli_query($conn, $query_staking);
        if (mysqli_num_rows($result_staking) == 1) {
            $row = mysqli_fetch_array($result_staking);
            $cantidad_staking =  $row['count(main_status)'];}
        
        $query_on_board = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status = 'ON BOARD'";
        $result_on_board= mysqli_query($conn, $query_on_board);
        if (mysqli_num_rows($result_on_board) == 1) {
            $row = mysqli_fetch_array($result_on_board);
            $cantidad_on_board =  $row['count(main_status)'];}   
        
        $query_all = "SELECT count(main_status) from cntr where `user_cntr` = '$user' AND main_status != 'TERMINADA'";
        $result_all= mysqli_query($conn, $query_all);
        if (mysqli_num_rows($result_all) == 1) {
            $row = mysqli_fetch_array($result_all);
            $cantidad_all =  $row['count(main_status)'];}  
            
        $query_detalles_go_to_load = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'YENDO A CARGAR'";
        $result_detalles_go_to_load= mysqli_query($conn, $query_detalles_go_to_load);

        $query_detalles_loading = "SELECT cntr.cntr_number , cntr.cntr_type, carga.load_place, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'CARGANDO'";
        $result_detalles_loading= mysqli_query($conn, $query_detalles_loading);
        
        $query_detalles_custom_place = "SELECT cntr.cntr_number , cntr.cntr_type, carga.custom_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'CUSTOM PLACE'";
        $result_detalles_custom_place= mysqli_query($conn, $query_detalles_custom_place);
        
        $query_detalles_go_to_unload = "SELECT cntr.cntr_number , cntr.cntr_type, carga.unload_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'YENDO A DESCARGAR'";
        $result_detalles_go_to_unload= mysqli_query($conn, $query_detalles_go_to_unload);

        $query_detalles_staking = "SELECT cntr.retiro_place, carga.vessel, carga.voyage, cntr.cntr_number , cntr.cntr_type, carga.unload_place, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'STAKING'";
        $result_detalles_staking= mysqli_query($conn, $query_detalles_staking);

        $query_detalles_on_board = "SELECT carga.final_point , cntr.cntr_number, cntr.cntr_type, carga.vessel, carga.voyage, cntr.status_cntr, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'ON BOARD'";
        $result_detalles_on_board= mysqli_query($conn, $query_detalles_on_board);

        $query_detalles_all = "SELECT cntr.cntr_number , cntr.cntr_type, carga.shipper, cntr.main_status from cntr INNER JOIN carga ON carga.booking = cntr.booking where `user_cntr` = '$user' and cntr.main_status != 'TERMINADA' ORDER BY `cntr`.`main_status` ASC";
        $result_detalles_all= mysqli_query($conn, $query_detalles_all);

        $query_detalles_asigned = "SELECT cntr.cntr_number , cntr.cntr_type, cntr.retiro_place, carga.shipper from cntr INNER JOIN carga ON carga.booking = cntr.booking where  cntr.user_cntr = '$user' AND cntr.main_status = 'ASIGNADA'";
        $result_detalles_asigned= mysqli_query($conn, $query_detalles_asigned);
?>
 
 
 <!-- Widgets  -->

<div class="breadcrumbs">
    <div  class="breadcrumbs-inner">  
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div data-toggle="modal" data-target="#gotoload" class="stat-icon dib flat-color-5">
                                <i class="ti-truck"></i>
                            </div>
                            <div class="stat-content" >
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_go_to_load; ?></span></div>
                                    <div class="stat-heading">YENDO A CARGAR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-lg-3 col-md-6">
                <div   class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#loading" class="stat-icon dib flat-color-5">
                                <i class="ti-package"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_loading; ?></span></div>
                                    <div class="stat-heading">Loading</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="col-lg-3 col-md-6">
                <div   class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#customPlace" class="stat-icon dib flat-color-5">
                                <i class="ti-home"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_custom_place; ?></span></div>
                                    <div class="stat-heading">Custom Place</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
            <div class="col-lg-3 col-md-6">
                <div    class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#goToUnload" class="stat-icon dib flat-color-5">
                                <i class="ti-check"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_go_to_unload; ?></span></div>
                                    <div class="stat-heading">YENDO A DESCARGAR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                
            </div>
        
            <div class="col-lg-3 col-md-6">
                <div    class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#Staking" class="stat-icon dib flat-color-5">
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

            <div class="col-lg-3 col-md-6">
                <div   class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#onBoard" class="stat-icon dib flat-color-5">
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
            <div class="col-lg-3 col-md-6">
                <div   class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#all" class="stat-icon dib flat-color-3">
                                <i class="fa fa-th-large"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_all; ?></span></div>
                                    <div class="stat-heading">All</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="col-lg-3 col-md-6">
                <div  class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                        <div data-toggle="modal" data-target="#ASIGNADA" class="stat-icon dib flat-color-3">
                                <i class="ti-hand-point-up"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $cantidad_asigned; ?></span></div>
                                    <div class="stat-heading">Assigned</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>                        
        </div>
    </div> 
</div>        <!-- /Widgets --> 



 
 