<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `ata` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el ATA';
    $_SESSION['message_type'] = 'success';
    header('location:../views/misAtas.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar ATA. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/misAtas.php');

  }
    
}


?>
