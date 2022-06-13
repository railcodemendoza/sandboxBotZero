<?php

include("../db.php");

if(isset($_GET['id'])) {

  $id = $_GET['id'];
  $query = "DELETE FROM `customer.shipper` WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if(!$result){

    $_SESSION['message'] = 'el Shipper ' . $razon_social. ' no se pudo eliminar';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/misShipper.php'); 
    
    }else{
    
      $_SESSION['message'] = 'Se eliminó correctamente el Shipper '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/misShipper.php'); 
          
  }

}

?>
