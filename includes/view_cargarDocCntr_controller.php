<?php


    $id = $_GET['id'];

    $query_cntr = "SELECT id_cntr,cntr_number,booking FROM cntr where id_cntr = 1";
    $datos_cntr = mysqli_query($conn, $query_cntr);

    if (mysqli_num_rows($datos_cntr) == 1) {
        $row = mysqli_fetch_array($datos_cntr);

        $booking = $row['booking'];
        $cntr = $row['cntr_number'];
        $id = $row['id_cntr'];
    }

echo $cntr;
?>
