<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `agencias` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente la Agencia';
    $_SESSION['message_type'] = 'success';
    header('location:../views/agencias_super_user.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Agencia. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/agencias_super_user.php');

  }
    
}


?>
