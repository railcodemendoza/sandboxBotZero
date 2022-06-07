<?php

include("../db.php"); // aca me traigo la base de datos. 


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_lugarDeCarga'])) {

    $description= $_POST['description'];
    $address=  $_POST['address'];
    $city =  $_POST['city'];
    $country =  $_POST['country'];
    $lat_lon =  $_POST['lat_lon'];
    $km_from_town =  $_POST['km_from_town'];
    $remarks =  $_POST['remarks'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `customer_load_place` set description = '$description' , lat_lon = '$lat_lon' ,address = '$address' ,city = '$city' ,country = '$country' ,km_from_town = '$km_from_town',remarks = '$remarks' ,created_at = '$user' ,company = '$company' WHERE id = '$id'";
$result = mysqli_query($conn, $query);
  
  
  if(!$result){

    $_SESSION['message'] = 'el lugar de Carga no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
   header('location:../views/misLugaresDeCarga.php'); 
  }else{

    $_SESSION['message'] = 'Se creó correctamente el lugar de carga' . $description;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misLugaresDeCarga.php');
  }



}
}
?>

