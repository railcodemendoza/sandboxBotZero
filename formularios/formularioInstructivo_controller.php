<?php

$cntr_number = $_GET['cntr_number'];
$id_cntr = $_GET['id_cntr'];

if ($cntr_number == "") {

    $_SESSION['message'] = 'para ir a Instrcutivo de carga debe informar número de Contenedor.';
    $_SESSION['message_type'] = 'danger';

    header('location:../formularios/formularioderetiro.php?id_cntr=' . $id_cntr);
} else {

    $query = "SELECT * FROM cntr INNER JOIN carga INNER JOIN `asign` ON cntr.booking = carga.booking AND asign.cntr_number = cntr.cntr_number WHERE cntr.cntr_number = '$cntr_number'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        $query_id = "SELECT id FROM carga INNER JOIN CNTR ON carga.booking = cntr.booking WHERE cntr.cntr_number = '$cntr_number'";
        $result_id = mysqli_query($conn, $query_id);

        if (mysqli_num_rows($result_id) == 1) {
            $row = mysqli_fetch_array($result_id);
            $id = $row['id'];
        }

        $_SESSION['message'] = 'Primero hay que asignar unidad a ' . $cntr_number;
        $_SESSION['message_type'] = 'danger';
        header('Location:' . getenv('HTTP_REFERER')); // volver  
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $booking = $row['booking'];
        $shipper = $row['shipper'];
        $cntr_number = $row['cntr_number'];
        $cntr_type = $row['cntr_type'];
        $retiro_place = $row['retiro_place'];
        $net_weight = $row['net_weight'];
        $load_date = $row['load_date'];
        $load_place = $row['load_place'];
        $direccion_de_carga = 'Corredor de las Aguilas.';
        $document_invoice = $row['document_invoice'];
        $document_packing = $row['document_packing'];
        $custom_place = $row['custom_place'];
        $custom_agent = $row['custom_agent'];
        $vessel = $row['vessel'];
        $cut_off_fis = $row['cut_off_fis'];
        $oceans_line = $row['oceans_line'];
        $unload_place = $row['unload_place'];
        $final_point = $row['final_point'];
        $commodity = $row['commodity'];
        $transport = $row['transport'];
        $transport_agent = $row['transport_agent'];
        $voyage = $row['voyage'];
        $type = $row['type'];
    }
}
?>

 
