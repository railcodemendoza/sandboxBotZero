<?php

include("../db.php"); // aca me traigo la base de datos. 

// revisar si tiene aplicaciones en asignacion.

if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 

  $id = $_GET['id'];

  foreach ($_POST['transporte'] as $transporte);

  if (isset($_POST['editar_chofer'])) {

    $nombre = $_POST['nombre'];
    $vto_carnet =  $_POST['vto_carnet'];
    $documento =  $_POST['documento'];
    $WhatsApp =  $_POST['WhatsApp'];
    $mail =  $_POST['mail'];

    $Observaciones =  $_POST['Observaciones'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `choferes` SET `nombre`='$nombre',`documento`= '$documento',`vto_carnet`= '$vto_carnet',`WhatsApp`= '$WhatsApp',`mail`= '$mail',`transporte`= '$transporte',`Observaciones`= '$Observaciones', `user`= '$user',`empresa`= '$company'  WHERE   id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {

      $_SESSION['message'] = 'el Chofer ' . $nombre . ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/choferes.php');
    } else {

      $_SESSION['message'] = 'Se editó correctamente el Chofer ' . $nombre;
      $_SESSION['message_type'] = 'success';
      header('location:../views/choferes.php');
    }
  }

  if (isset($_POST['editar_status_chofer'])) {

    foreach ($_POST['status_chofer'] as $status_chofer);
    $place =  $_POST['place'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `choferes` SET `status_chofer`='$status_chofer',`place`= '$place', `user`= '$user',`empresa`= '$company'  WHERE   id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {

      $_SESSION['message'] = 'el stataus no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/control_flota.php');
    } else {

      $_SESSION['message'] = 'Se editó correctamente el status';
      $_SESSION['message_type'] = 'success';
      header('location:../views/control_flota.php');
    }
  }

  // Super User 
  if (isset($_POST['editar_transporte_super_user'])) {

    $razon_social = $_POST['razon_social'];
    $cuit =  $_POST['cuit'];
    $direccion =  $_POST['direccion'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $contacto_logistica_nombre =  $_POST['contacto_logistica_nombre'];
    $contacto_logistica_celular =  $_POST['contacto_logistica_celular'];
    $contacto_logistica_mail =  $_POST['contacto_logistica_mail'];
    $contacto_admin_nombre =  $_POST['contacto_admin_nombre'];
    $contacto_admin_celular =  $_POST['contacto_admin_celular'];
    $contacto_admin_mail =  $_POST['contacto_admin_mail'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    $query = "UPDATE `transporte` SET `razon_social`= '$razon_social',`CUIT`= '$cuit',`Direccion`= '$direccion',`Provincia`= '$ciudad',`Pais`= '$country',`contacto_logistica_nombre`='$contacto_logistica_nombre',`contacto_logistica_celular`='$contacto_logistica_celular',`contacto_logistica_mail`='$contacto_logistica_mail',`contacto_admin_nombre`='$contacto_admin_nombre',`contacto_admin_celular`='$contacto_admin_celular',`contacto_admin_mail`='$contacto_admin_mail',`empresa`= '$company',`user`= '$user' WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {

      $_SESSION['message'] = 'el transporte' . $razon_social . ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/Transportes_super_user.php');
    } else {

      $_SESSION['message'] = 'Se edito correctamente el transporte' . $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/Transportes_super_user.php');
    }
  }
}
if (isset($_POST['agregar_chofer'])) {

  foreach ($_POST['transporte'] as $transporte);


  $nombre = $_POST['nombre'];
  $vto_carnet =  $_POST['vto_carnet'];
  $documento =  $_POST['documento'];
  $WhatsApp =  $_POST['WhatsApp'];
  $mail =  $_POST['mail'];
  $Observaciones =  $_POST['Observaciones'];
  $user = $_SESSION['user'];
  $company = $_SESSION['company'];

  $query = "INSERT INTO `choferes`(`nombre`, `documento`, `vto_carnet`, `WhatsApp`,`mail`,`transporte`, `Observaciones`, `empresa`, `user`) VALUES ( '$nombre','$documento','$vto_carnet','$WhatsApp',  '$mail', '$transporte', '$Observaciones', '$company', '$user')";
  $result = mysqli_query($conn, $query);

  if (!$result) {

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Chofer';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/choferes.php');
  } else {

    $_SESSION['message'] = 'Se cargó correctamente el Chofer ' . $nombre;
    $_SESSION['message_type'] = 'success';
    header('location:../views/choferes.php');
  }
}
