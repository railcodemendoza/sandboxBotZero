<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM `users` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Usuario';
    $_SESSION['message_type'] = 'success';
    header('location:../views/master_usuarios.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar el Usuario. Por favor reintente';
        $_SESSION['message_type'] = 'warning';
        header('location:../views/master_usuarios.php');

  }
}
?>
