<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_despachante'])) {

    $razon_social= $_POST['razon_social'];
    $tax_id =  $_POST['tax_id'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $mail =  $_POST['mail'];
    $phone =  $_POST['phone'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `custom_agent`
              SET 
                `razon_social`='$razon_social',
                `tax_id`= '$tax_id',
                `pais`= '$country',
                `provincia`= '$ciudad',
                `mail`= '$mail',
                `phone`= '$phone',
                `user`= '$user',
                `empresa`= '$company'  
              WHERE  
                id = '$id'";

    $result = mysqli_query($conn, $query);

  }

  if(!$result){

    $_SESSION['message'] = 'el despachante' . $razon_social. ' no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
   header('location:../views/despa_user_basic.php'); 

  }else{

    $_SESSION['message'] = 'Se edito correctamente el despachante '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/despa_user_basic.php'); 
  }
  
  }

  
if (isset($_POST['agregar_despachante'])){

  $razon_social= $_POST['razon_social'];
  $tax_id =  $_POST['tax_id'];
  $ciudad =  $_POST['ciudad'];
  $country =  $_POST['country'];
  $mail =  $_POST['mail'];
  $phone =  $_POST['phone'];
  $user = $_SESSION['user'];
  $company = $_SESSION['company'];
  
  $query = "INSERT INTO `custom_agent`
              (`razon_social`, 
              `tax_id`, 
              `provincia`, 
              `pais`,
              `mail`, 
              `phone`, 
              `empresa`, 
              `user`) VALUES (
                '$razon_social',
                '$tax_id',
                '$ciudad',
                '$country',
                '$mail',
                '$phone',
                '$company',
                '$user')";
  $result = mysqli_query($conn, $query);
  
  if(!$result){

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Despachante';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/despa_user_basic.php'); 
  }else{

    $_SESSION['message'] = 'Se cargó correctamente el despachante '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/despa_user_basic.php'); 
  }
  
}



?>

