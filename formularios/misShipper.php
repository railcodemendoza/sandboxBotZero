<?php include("../db.php"); ?>

<?php

$user = $_SESSION['user'];
$company = $_SESSION['company'];

if (isset($_POST['cargar_shipper'])){

$razon_social= $_POST['razon_social'];
$tax_id =  $_POST['tax_id'];
$address =  $_POST['address'];
$city =  $_POST['city'];
$country =  $_POST['country'];
$postal_code =  $_POST['postal_code'];
$remarks =  $_POST['remarks'];

$query = "INSERT INTO `customer.shipper` (`razon_social`, `tax_id`, `address`, `city`, `country`, `postal_code`, `create_user`, `company`, `remarks`) VALUES ('$razon_social','$tax_id','$address','$city','$country','$postal_code','$user','$company','$remarks')";
$result = mysqli_query($conn, $query);


if(!$result){

  $_SESSION['message'] = 'el Shipper' . $razon_social. ' no se creo';
  $_SESSION['message_type'] = 'danger';
 header('location:../views/misShipper.php'); 

}else{

  $_SESSION['message'] = 'Se agregó correctamente el Shipper '. $razon_social;
  $_SESSION['message_type'] = 'success';
  header('location:../views/misShipper.php'); 
}

}

?>