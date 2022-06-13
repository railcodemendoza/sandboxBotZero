<?php
if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
    $id = $_GET['id'];
    $query_carga = "SELECT * FROM carga where id = $id";
    $datos_carga = mysqli_query($conn, $query_carga);
    if (mysqli_num_rows($datos_carga) == 1) {
        $row = mysqli_fetch_array($datos_carga);
        $shipper = $row['shipper'];
        $booking = $row['booking'];
        $commodity = $row['commodity'];
        $Cliente = $row['Cliente'];
        $load_place = $row['load_place'];
        $load_date = $row['load_date'];
        $unload_place = $row['unload_place'];
        $cut_off_fis = $row['cut_off_fis'];
        $cut_off_doc = $row['cut_off_doc'];
        $oceans_line = $row['oceans_line'];
        $vessel = $row['vessel'];
        $voyage = $row['voyage'];
        $final_point = $row['final_point'];
        $ETA = $row['ETA'];
        $ETD = $row['ETD'];
        $consignee = $row['consignee'];
        $notify = $row['notify'];
        $custom_place = $row['custom_place'];
        $custom_agent = $row['custom_agent'];
        $ref_customer = $row['ref_customer'];
        $status = $row['status'];
        $observation_customer = $row['observation_customer'];
        //$retiro_place =$row ['retiro_place'];
    }
    $query_cantidad = "SELECT count(id_cntr) from cntr where `booking` = '$booking'";
    $result_cantidad = mysqli_query($conn, $query_cantidad);
    if (mysqli_num_rows($result_cantidad) == 1) {
        $row = mysqli_fetch_array($result_cantidad);
        $cantidad = $row['count(id_cntr)'];
    }
}
?>
