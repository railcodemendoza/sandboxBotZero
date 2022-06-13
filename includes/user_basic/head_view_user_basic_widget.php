 <!-- Widgets  -->

 <?php 

$user = $_SESSION['user'];

        
  
        $query_detalles_activas = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking WHERE cntr.main_status != 'NO ASIGNADA' AND cntr.main_status != 'ON BOARD' AND cntr.main_status != 'TERMINADA' ORDER BY cntr.created_at DESC limit 10";
        $result_detalles_activas= mysqli_query($conn, $query_detalles_activas);

        $query_detalles_sin_asignar = "SELECT * from cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE cntr.main_status = 'NO ASIGNADA'";
        $result_detalles_sin_asignar = mysqli_query($conn, $query_detalles_sin_asignar);
        
        $query_detalles_on_board = "SELECT * from cntr INNER JOIN carga ON carga.booking = cntr.booking where cntr.main_status = 'ON BOARD'";
        $result_detalles_on_board= mysqli_query($conn, $query_detalles_on_board);

        $query_detalles_asignadas = "SELECT cntr.booking, cntr.cntr_number, carga.unload_place, carga.custom_place, cntr.status_cntr, asign.transport, carga.Empresa from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'ASIGNADA'";
        $result_detalles_asignadas= mysqli_query($conn, $query_detalles_asignadas);

        
        $query_detalles_con_problema = "SELECT cntr.booking, cntr.cntr_number, carga.unload_place, carga.custom_place, cntr.status_cntr, asign.transport, carga.Empresa from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'CON PROBLEMA'";
        $result_detalles_con_problema= mysqli_query($conn, $query_detalles_con_problema);

        $query_detalles_go_to_load = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'YENDO A CARGAR'";
        $result_detalles_go_to_load = mysqli_query($conn, $query_detalles_go_to_load);

        $query_detalles_loading = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'CARGANDO'";
        $result_detalles_loading = mysqli_query($conn, $query_detalles_loading);

        $query_detalles_custom_place = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'CUSTOM PLACE'";
        $result_detalles_custom_place = mysqli_query($conn, $query_detalles_custom_place);

        $query_detalles_go_to_unload = "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'YENDO A DESCARGAR'";
        $result_detalles_go_to_unload = mysqli_query($conn, $query_detalles_go_to_unload);

        $query_detalles_stacking= "SELECT * from cntr INNER JOIN asign INNER JOIN carga ON cntr.cntr_number = asign.cntr_number AND cntr.booking = carga.booking where cntr.main_status = 'STACKING'";
        $result_detalles_stacking = mysqli_query($conn, $query_detalles_stacking);

        
        $date= date('l jS \of F Y') ;
?>
 

<div class="breadcrumbs">
    <div  class="breadcrumbs-inner">  
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div  data-toggle="modal" data-target="#noticias" class="stat-icon dib flat-color-3">
                                <i class="ti-announcement"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="text"><?php echo $date;?></span></div>
                                    <div class="stat-heading">NOTICIAS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pt-2">
                <div class="card">
                    <img src="../images/tcargo/tcargo.png"  alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div  data-toggle="modal" data-target="#clima" class="stat-icon dib flat-color-3">
                                <i class="fa fa-sun-o"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="text">Paso Fronterizo</span></div>
                                    <div class="stat-heading">CLIMA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        <!-- /Widgets -->