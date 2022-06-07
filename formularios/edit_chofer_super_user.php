<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
  foreach ($_POST['transporte'] as $transporte);

  if (isset($_POST['editar_chofer'])) {

    $nombre= $_POST['nombre'];
    $vto_carnet =  $_POST['vto_carnet'];
    $documento =  $_POST['documento'];
    $WhatsApp =  $_POST['WhatsApp'];
    $mail =  $_POST['mail'];

    $Observaciones =  $_POST['Observaciones'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `choferes` SET `nombre`='$nombre',`documento`= '$documento',`vto_carnet`= '$vto_carnet',`WhatsApp`= '$WhatsApp',`mail`= '$mail',`transporte`= '$transporte',`Observaciones`= '$Observaciones', `user`= '$user',`empresa`= '$company'  WHERE   id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){

      $_SESSION['message'] = 'el Chofer ' . $nombre. ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
    header('location:../views/choferes_user_basic.php'); 

    }else{

      $_SESSION['message'] = 'Se editó correctamente el Chofer '. $nombre;
      $_SESSION['message_type'] = 'success';
      header('location:../views/choferes_user_basic.php'); 
    }
  }
  if (isset($_POST['editar_status_chofer'])) {
    
    foreach ($_POST['status_chofer'] as $status_chofer);
    $place =  $_POST['place'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `choferes` SET `status_chofer`='$status_chofer',`place`= '$place', `user`= '$user',`empresa`= '$company'  WHERE   id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){

      $_SESSION['message'] = 'el stataus no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
    header('location:../views/control_flota.php'); 

    }else{

      $_SESSION['message'] = 'Se editó correctamente el status';
      $_SESSION['message_type'] = 'success';
      header('location:../views/control_flota.php'); 
    }
  }
  

  if (isset($_POST['agregar_chofer'])){

    $nombre= $_POST['nombre'];
    $vto_carnet =  $_POST['vto_carnet'];
    $documento =  $_POST['documento'];
    $WhatsApp =  $_POST['WhatsApp'];
    $mail =  $_POST['mail'];
    $Observaciones =  $_POST['Observaciones'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    
    $query = "INSERT INTO `choferes`(`nombre`, `documento`, `vto_carnet`, `WhatsApp`,`mail`,`transporte`, `Observaciones`, `empresa`, `user`) VALUES ( '$nombre','$documento','$vto_carnet','$WhatsApp',  '$mail', '$transporte', '$Observaciones', '$company', '$user')";
    $result = mysqli_query($conn, $query);
    
    if(!$result){

      $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Chofer';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/choferes_user_basic.php'); 
    }else{

      $_SESSION['message'] = 'Se cargó correctamente el Chofer '. $nombre;
      $_SESSION['message_type'] = 'success';
      header('location:../views/choferes_user_basic.php'); 
    }
  }
}

?>

