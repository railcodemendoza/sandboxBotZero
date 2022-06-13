<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM  `cntr_type` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Tipo de Contenedor';
    $_SESSION['message_type'] = 'success';
    header('location:../views/tipos_de_cntr.php'); 

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar el Tipo de Contenedor. Por favor reintente';
        $_SESSION['message_type'] = 'warning';
        header('location:../views/tipos_de_cntr.php'); 


  }
}
?>
