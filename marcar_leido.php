<?php

include('db.php');

$cntr_number = $_GET['cntr_number'];
$booking = $_GET['booking'];
$id = $_GET['id'];

$query = "UPDATE notification SET `status` = 'Leido' WHERE `cntr_number` = '$cntr_number' AND `booking` = '$booking' AND `sta_carga` = 'CON PROBLEMA'";
$result = mysqli_query($conn, $query);
  
    if(!$result) {

        $_SESSION['message'] = 'Algo salió mal';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/view_customer.php');
    }else{

        header('location:includes/view_carga.php?id='.$id.'#detalleCNTR');       

    }

?>