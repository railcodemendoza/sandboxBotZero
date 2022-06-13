<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM `customer.ntfy` WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
   if(!$result){

        $_SESSION['message'] = 'Algo falló. Intenta nuevamente eliminar';
        $_SESSION['message_type'] = 'danger';
        header('location:../views/misNotify.php'); 
    }else{

        $_SESSION['message'] = 'Se cargó correctamente el Notify';
        $_SESSION['message_type'] = 'success';
        header('location:../views/misNotify.php');  
  }
}


?>
