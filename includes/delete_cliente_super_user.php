<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];  
  
  $query = "DELETE FROM `empresas` WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if($result) {
    $_SESSION['message'] = 'Se eliminó correctamente el Cliente';
    $_SESSION['message_type'] = 'success';
    header('location:../views/Clientes_super_user.php');
  }else{
    $_SESSION['message'] = 'No se pudo eliminar el Cliente. Por favor reintente';
    $_SESSION['message_type'] = 'warning';
    header('location:../views/Clientes_super_user.php');
  }    
}


?>
