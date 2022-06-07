<?php

include("../db.php"); // aca me traigo la base de datos. 


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_consignee'])) {

    $razon_social= $_POST['razon_social'];
    $tax_id =  $_POST['tax_id'];
    $address =  $_POST['address'];
    $city =  $_POST['city'];
    $country =  $_POST['country'];
    $postal_code =  $_POST['postal_code'];
    $remarks =  $_POST['remarks'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `customer.cnee` set razon_social = '$razon_social' , tax_id = '$tax_id' ,address = '$address' ,city = '$city' ,country = '$country' ,postal_code = '$postal_code',remarks = '$remarks'  ,create_user = '$user' ,company = '$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);


  if(!$result){

    $_SESSION['message'] = 'el Consignee ' . $razon_social. ' no se pudo editar';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/misConsignee.php'); 
    
    }else{
    
      $_SESSION['message'] = 'Se editó correctamente el Consignee '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/misConsignee.php'); 
    }
  }

  }



?>

