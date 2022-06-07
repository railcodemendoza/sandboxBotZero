<?php

include('../db.php');



// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 

  $id = $_GET['id'];

  if (isset($_POST['editar_transporte'])) {

    echo 'hola editar transporte';

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

    $query = "UPDATE `transporte` SET `razon_social`= '$razon_social', `CUIT`= '$cuit',`Direccion`= '$direccion',`Provincia`= '$ciudad',`Pais`= '$country',`contacto_logistica_nombre`='$contacto_logistica_nombre',`contacto_logistica_celular`='$contacto_logistica_celular',`contacto_logistica_mail`='$contacto_logistica_mail',`contacto_admin_nombre`='$contacto_admin_nombre',`contacto_admin_celular`='$contacto_admin_celular',`contacto_admin_mail`='$contacto_admin_mail',`empresa`= '$company',`user`= '$user' WHERE id = '$id'";

    $result = mysqli_query($conn, $query);
  }

  if (!$result) {

    $_SESSION['message'] = 'el transporte' . $razon_social . ' no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/Transportes_user_basic.php');
  } else {

    $_SESSION['message'] = 'Se edito correctamente el transporte' . $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/Transportes_user_basic.php');
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


if (isset($_POST['agregar_transporte'])) {

  echo 'hola agregar transporte';

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

  $query = "INSERT INTO `transporte`(`razon_social`, `CUIT`, `Direccion`, `Provincia`, `Pais`, `contacto_logistica_nombre`, `contacto_logistica_celular`, `contacto_logistica_mail`, `contacto_admin_nombre`, `contacto_admin_celular`, `contacto_admin_mail`, `empresa`, `user`) VALUES ('$razon_social','$cuit','$direccion','$ciudad','$country','$contacto_logistica_nombre','$contacto_logistica_celular','$contacto_logistica_mail','$contacto_admin_nombre','$contacto_admin_celular','$contacto_logistica_mail','$company','$user')";
  $result = mysqli_query($conn, $query);


  if (!$result) {

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Tranporte';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/Transportes_user_basic.php');
  } else {

    $_SESSION['message'] = 'Se cargó correctamente el transporte' . $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/Transportes_user_basic.php');
  }
}



if (isset($_POST['agregar_transporte_super_user'])) {

  echo 'hola editar transporte super user';


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

  $query = "INSERT INTO `transporte`(`razon_social`, `CUIT`, `Direccion`, `Provincia`, `Pais`, `contacto_logistica_nombre`, `contacto_logistica_celular`, `contacto_logistica_mail`, `contacto_admin_nombre`, `contacto_admin_celular`, `contacto_admin_mail`, `empresa`, `user`) VALUES ('$razon_social','$cuit','$direccion','$ciudad','$country','$contacto_logistica_nombre','$contacto_logistica_celular','$contacto_logistica_mail','$contacto_admin_nombre','$contacto_admin_celular','$contacto_logistica_mail','$company','$user')";
  $result = mysqli_query($conn, $query);

  if (!$result) {

    $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar Tranporte';
    $_SESSION['message_type'] = 'danger';
    header('location:../views/Transportes_super_user.php');
  } else {

    $_SESSION['message'] = 'Se cargó correctamente el transporte' . $razon_social;
    $_SESSION['message_type'] = 'success';
    header('location:../views/Transportes_super_user.php');
  }
}
