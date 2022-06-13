<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM `customer_load_place` WHERE id = $id";
  $result = mysqli_query($conn, $query);

}


if(!$result){

  $_SESSION['message'] = 'el Lugar de Carga con ID: ' . $id. ' no se pudo editar';
  $_SESSION['message_type'] = 'danger';
  header('location:../views/misLugaresDeCarga.php'); 
  
  }else{
  
    $_SESSION['message'] = 'Se eliminó correctamente el Lugar de Carga con ID: '. $id;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misLugaresDeCarga.php'); 
  }



?>
