<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_agencia'])) {

    $description= $_POST['description'];
    $razon_social= $_POST['razon_social'];
    $tax_id =  $_POST['tax_id'];
    $puerto =  $_POST['puerto'];
    $contact_name =  $_POST['countact_name'];
    $contact_phone =  $_POST['contact_phone'];
    $contact_mail =  $_POST['contact_mail'];
    $observation_gral  =  $_POST['observation_gral'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `agencias` SET `description` = '$description' ,`razon_social`= '$razon_social' ,`tax_id`= '$tax_id',`puerto`= '$puerto',`contact_name`= '$contact_name',`contact_phone`= '$contact_phone',`contact_mail`= '$contact_mail',`user`='$user',`empresa`='$company',`observation_gral`='$observation_gral' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

  }

  if(!$result){

    $_SESSION['message'] = 'la agencia' . $razon_social. ' no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
   header('location:../views/agencias_super_user.php'); 

  }else{

    $_SESSION['message'] = 'Se editó correctamente la agencia '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/agencias_super_user.php'); 
  }
  
  }

  
if (isset($_POST['agregar_agencia'])){

    $description= $_POST['description'];
    $razon_social= $_POST['razon_social'];
    $tax_id =  $_POST['tax_id'];
    $puerto =  $_POST['puerto'];
    $contact_name =  $_POST['contact_name'];
    $contact_phone =  $_POST['contact_phone'];
    $contact_mail =  $_POST['contact_mail'];
    $observation_gral  =  $_POST['observation_gral'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
  
  $query = "INSERT INTO `agencias`(`description`, `razon_social`, `tax_id`, `puerto`, `contact_name`, `contact_phone`, `contact_mail`,`user`, `empresa`, `observation_gral`) VALUES ('$description', '$razon_social', '$tax_id', '$puerto', '$contact_name', '$contact_phone', '$contact_mail', '$user', '$empresa', '$observation_gral')";
  $result = mysqli_query($conn, $query);
  
  if(!$result){

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Agencia';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/agencias_super_user.php'); 
  }else{

    $_SESSION['message'] = 'Se cargó correctamente la agencia '. $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/agencias_super_user.php'); 
  }
  }



?>

