<?php include("../db.php"); ?>

<?php

$user = $_SESSION['user'];
$company = $_SESSION['company'];

if (isset($_POST['cargar_consignee'])){

$razon_social= $_POST['razon_social'];
$tax_id =  $_POST['tax_id'];
$address =  $_POST['address'];
$city =  $_POST['city'];
$country =  $_POST['country'];
$postal_code =  $_POST['postal_code'];
$remarks =  $_POST['remarks'];

$query = "INSERT INTO `customer.cnee` (`razon_social`, `tax_id`, `address`, `city`, `country`, `postal_code`, `create_user`, `company`, `remarks`) VALUES ('$razon_social','$tax_id','$address','$city','$country','$postal_code','$user','$company','$remarks')";
$result = mysqli_query($conn, $query);

if(!$result){

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Consignee';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/misConsignee.php'); 
  }else{

    $_SESSION['message'] = 'Se cargó correctamente el Consignee '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misConsignee.php'); 
  }


}

?>