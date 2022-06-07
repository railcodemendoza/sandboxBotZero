<?php 

include("../db.php");

foreach ($_POST['type_instruction'] as $type_instruction);
foreach ($_POST['cntr_seleccionado'] as $cntr_number);
foreach ($_POST['transport'] as $transport);


if (isset($_POST['instruction'])) {

    $invoice_number = $_POST['invoice_number'];
    $packing_number = $_POST['packing_number'];
    $transport_agent = $_POST['transport_agent'];
    $port_agent = $_POST['port_agent'];
    $out_usd = $_POST['out_usd'];
    $rs_invoice_out = $_POST['rs_invoice_out'];
    $modo_de_pago_out = $_POST['modo_de_pago_out'];
    $plazo_de_pago_out = $_POST['plazo_de_pago_out'];
    $observation_payment_out = $_POST['observation_payment_out'];
    $user_instruction = $_SESSION['user'];
    $booking = $_COOKIE ["booking"];
    
$query = "INSERT INTO `instruction`(`booking`, `cntr_number`, `type_instruction`, `invoice_number`, `packing_number`, `Transport`, `transport_agent`, `port_agent`, `out_usd`, `rs_invoice_out`, `modo_de_pago_out`, `plazo_de_pago_out`, `observation_payment_out`, `user_instruction`) VALUES ('$booking', '$cntr_number', '$type_instruction' , '$invoice_number', '$packing_number', '$transport', '$transport_agent', '$port_agent', '$out_usd', '$rs_invoice_out', '$modo_de_pago_out', '$plazo_de_pago_out', '$observation_payment_out', '$user_instruction')";
$result = mysqli_query($conn, $query);

$query_id="SELECT id FROM `instruction` WHERE `booking`= '$booking' and `cntr_number`='$cntr_number'";
$result_id = mysqli_query($conn, $query_id);

if (mysqli_num_rows($result_id) == 1) { // si existe una fila. 
    $row = mysqli_fetch_array($result_id); // Transformo en variable todo el resultado.  
    $id = $row['id']; // sacamos el deato de la columna de la fila que nos habiamos traido. 

    header('Location: print_instuctivo.php?id='.$id);

  }

if(!$result) {

  die("Query Failed.");}
             
}




    ?>