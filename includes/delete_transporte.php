<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  
  $query_exist = "SELECT asign.transport FROM asign INNER JOIN transporte ON transporte.razon_social = asign.transport WHERE transporte.id = $id";
  $result_exist = mysqli_query($conn, $query_exist);
  
  if (mysqli_num_rows($result_exist) >= 1) {

    $_SESSION['message'] = 'El transporte tiene aplicaciones. No se puede eliminar';
    $_SESSION['message_type'] = 'danger';
    
    header('location:../views/transportes_traffic.php');
  
  } else {
       
    $query = "DELETE FROM `transporte` WHERE id = $id";
    $result = mysqli_query($conn, $query);
  
    if($result) {

      $_SESSION['message'] = 'Se eliminó correctamente el Transporte';
      $_SESSION['message_type'] = 'success';
      header('location:../views/transportes_traffic.php');

    } else {
    
        $_SESSION['message'] = 'No se pudo eliminar transporte. Por favor reintente';
        $_SESSION['message_type'] = 'warning';
        header('location:../views/transportes_traffic.php');

    }
    
  } 
}

?>
