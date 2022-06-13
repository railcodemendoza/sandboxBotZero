<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `depositos_de_retiro` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Depósito';
    $_SESSION['message_type'] = 'success';
    header('location:../views/misDepositos_user_basic.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Depósito. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/misDepositos_user_basic.php');

  }
    
}


?>
