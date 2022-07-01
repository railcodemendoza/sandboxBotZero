<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
       
  $query = "DELETE FROM `custom_agent` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  if($result) {

    $_SESSION['message'] = 'Se eliminó correctamente el Despachante';
    $_SESSION['message_type'] = 'success';
    header('location:../views/despa_user_basic.php');

  }else{
    
        $_SESSION['message'] = 'No se pudo eliminar Despachante. Por favor reintente';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/despa_user_basic.php');

  }
    
}


?>
