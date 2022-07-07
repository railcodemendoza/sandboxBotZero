<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `plazos_de_pago` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Plazo de Pago';
    $_SESSION['message_type'] = 'success';
    header('location:../views/plazos_de_pago.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Modo de Pago. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
      header('location:../views/plazos_de_pago.php');

  }
    
}


?>
