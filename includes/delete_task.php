<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM carga WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó Carga Correctamente';
    $_SESSION['message_type'] = 'success';
    header('location:../views/view_customer.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Carga. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/view_customer.php');

  }
  
}

?>
