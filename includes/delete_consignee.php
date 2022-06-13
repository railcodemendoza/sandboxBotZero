<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM `customer.cnee` WHERE id = $id";
  $result = mysqli_query($conn, $query);

if(!$result){

  $_SESSION['message'] = 'el Consignee ' . $razon_social. ' no se pudo eliminar';
  $_SESSION['message_type'] = 'danger';
  header('location:../views/misConsignee.php'); 
  
  }else{
  
    $_SESSION['message'] = 'Se eliminó correctamente el Consignee '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misConsignee.php'); 
  }
}


?>
