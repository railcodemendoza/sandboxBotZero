<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `choferes` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Chofer';
    $_SESSION['message_type'] = 'success';
    header('location:../views/choferes.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Chofer. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/choferes.php');

  }
    
}


?>
