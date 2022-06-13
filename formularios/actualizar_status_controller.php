<?php

if  (isset($_GET['id_cntr'])) { // me traigo la informacion segun ID seleccionada. 
    $id_cntr = $_GET['id_cntr'];
    $query = "SELECT * FROM cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE id_cntr = $id_cntr";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $booking = $row['booking'];
      $shipper = $row['shipper'];
      $commodity = $row['commodity'];
      $cntr_number = $row['cntr_number'];
      $ref_customer = $row['ref_customer'];
      $unload_place = $row['unload_place'];
      $user = $row['user'];
      $load_place = $row ['load_place'];
      $retiro_place = $row['retiro_place'];
    } 

}
?>