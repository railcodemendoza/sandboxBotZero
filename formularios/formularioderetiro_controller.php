
<?php 

$id_cntr = $_GET['id_cntr'];
$query = "SELECT carga.id, carga.booking, carga.cliente, carga.vessel, carga.voyage, carga.unload_place, carga.final_point, carga.commodity, cntr.retiro_place, carga.oceans_line, cntr.cntr_type FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE cntr.id_cntr = '$id_cntr'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    
    $booking = $row['booking'];
    $cliente = $row['cliente'];
    $vessel = $row['vessel'];
    $voyage = $row['voyage'];
    $unload_place = $row['unload_place'];
    $final_point = $row['final_point'];
    $commodity = $row['commodity'];
    $retiro_place = $row['retiro_place'];
    $oceans_line = $row['oceans_line'];
    $cntr_type = $row['cntr_type'];
    $id = $row['id'];   
}

?>