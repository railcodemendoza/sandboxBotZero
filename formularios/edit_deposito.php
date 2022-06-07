<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_deposito'])) {

    $title= $_POST['title'];
    $address=  $_POST['address'];
    $city =  $_POST['city'];
    $country =  $_POST['country'];
    $lat_lon =  $_POST['lat_lon'];
    $link_maps = 'https://www.google.es/maps?q='.$lat_lon;
    $km_from_town =  $_POST['km_from_town'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `depositos_de_retiro` SET `title`='$title',`address`= '$address',`country`='$country' ,`city`='$city',`km_from_town`='$km_from_town',`lat_lon`='$lat_lon',`link_maps`='$link_maps',`user`='$user',`empresa`='$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

  }

  if(!$result){

    $_SESSION['message'] = 'El depósito' . $title. ' no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
   header('location:../views/misDepositos_user_basic.php'); 

  }else{

    $_SESSION['message'] = 'Se editó correctamente el depósito '. $title;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misDepositos_user_basic.php'); 
  }
  
  }

  
if (isset($_POST['agregar_deposito'])){

  $title= $_POST['title'];
  $address=  $_POST['address'];
  $city =  $_POST['city'];
  $country =  $_POST['country'];
  $lat_lon =  $_POST['lat_lon'];
  $link_maps = 'https://www.google.es/maps?q='.$_POST['lat_lon'];
  $km_from_town =  $_POST['km_from_town'];
  $user = $_SESSION['user'];
  $company = $_SESSION['company'];
    
  $query = "INSERT INTO `depositos_de_retiro` (`title`, `address`, `city`, `country`, `lat_lon`, `link_maps`, `km_from_town`,`user`, `empresa`) 
    VALUES ('$title','$address','$city','$country','$lat_lon','$link_maps','$km_from_town','$user','$empresa')";
    $result = mysqli_query($conn, $query);
    
  if(!$result){

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Depósito';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/misDepositos_user_basic.php'); 
  }else{

    $_SESSION['message'] = 'Se cargó correctamente el Depósito '. $title;
    $_SESSION['message_type'] = 'success';
    header('location:../views/misDepositos_user_basic.php'); 
  }
  }



?>

