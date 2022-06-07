<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
  if (isset($_POST['editar_cliente'])) {
    $razon_social= $_POST['razon_social'];
    $cuit =  $_POST['cuit'];
    $iibb =  $_POST['iibb'];
    $direccion=  $_POST['direccion'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $name_logistic = $_POST['name_logistic'];
    $cel_logistic = $_POST['cel_logistic'];
    $mail_logistic = $_POST['mail_logistic'];
    $name_admin = $_POST['name_admin'];
    $cel_admin = $_POST['cel_admin'];
    $mail_admin = $_POST['mail_admin'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    $query = "UPDATE `empresas` SET `razon_social`='$razon_social',`CUIT`='$cuit',`IIBB`='$iibb',`mail_admin`='$mail_admin',`mail_logistic`='$mail_logistic',`name_admin`='$name_admin',`name_logistic`='$name_logistic',`cel_admin`='$cel_admin',`cel_logistic`='$cel_logistic',`direccion`='$direccion',`pais`='$country',`Provincia`='$ciudad',`user`='$user',`empresa`='$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
      $_SESSION['message'] = 'el cliente ' . $razon_social. ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/clientes.php'); 
    }else{
      $_SESSION['message'] = 'Se edito correctamente el cliente '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/clientes.php'); 
    }
  }
  

  if (isset($_POST['editar_cliente_super_user'])) {
    $razon_social= $_POST['razon_social'];
    $cuit =  $_POST['cuit'];
    $iibb =  $_POST['iibb'];
    $direccion=  $_POST['direccion'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $name_logistic = $_POST['name_logistic'];
    $cel_logistic = $_POST['cel_logistic'];
    $mail_logistic = $_POST['mail_logistic'];
    $name_admin = $_POST['name_admin'];
    $cel_admin = $_POST['cel_admin'];
    $mail_admin = $_POST['mail_admin'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    $query = "UPDATE `empresas` SET `razon_social`='$razon_social',`CUIT`='$cuit',`IIBB`='$iibb',`mail_admin`='$mail_admin',`mail_logistic`='$mail_logistic',`name_admin`='$name_admin',`name_logistic`='$name_logistic',`cel_admin`='$cel_admin',`cel_logistic`='$cel_logistic',`direccion`='$direccion',`pais`='$country',`Provincia`='$ciudad',`user`='$user',`empresa`='$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
      $_SESSION['message'] = 'el cliente ' . $razon_social. ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/clientes_super_user.php'); 
    }else{
      $_SESSION['message'] = 'Se edito correctamente el cliente '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/clientes_super_user.php'); 
    }
  }
}else{
  
  if (isset($_POST['agregar_cliente'])){

    $razon_social= $_POST['razon_social'];
    $cuit =  $_POST['cuit'];
    $iibb =  $_POST['iibb'];
    $direccion=  $_POST['direccion'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $name_logistic = $_POST['name_logistic'];
    $cel_logistic = $_POST['cel_logistic'];
    $mail_logistic = $_POST['mail_logistic'];
    $name_admin = $_POST['name_admin'];
    $cel_admin = $_POST['cel_admin'];
    $mail_admin = $_POST['mail_admin'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    
    $query = "INSERT INTO `empresas`(`razon_social`, `CUIT`, `IIBB`, `mail_admin`, `mail_logistic`, `name_admin`, `name_logistic`, `cel_admin`, `cel_logistic`, `direccion`, `user`, `empresa`, `pais`, `Provincia`) VALUES ('$razon_social', '$cuit', '$iibb', '$mail_admin', '$mail_logistic', '$name_admin', '$name_logistic', '$cel_admin', '$cel_logistic', '$direccion', '$user', '$company', '$country', '$ciudad')";
    $result = mysqli_query($conn, $query);
  
    if(!$result){
      $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar el Cliente';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/clientes.php'); 
    }else{
      $_SESSION['message'] = 'Se cargó correctamente el cliente '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/clientes.php'); 
    }       
  }
  if (isset($_POST['agregar_cliente_super_user'])){

    $razon_social= $_POST['razon_social'];
    $cuit =  $_POST['cuit'];
    $iibb =  $_POST['iibb'];
    $direccion=  $_POST['direccion'];
    $ciudad =  $_POST['ciudad'];
    $country =  $_POST['country'];
    $name_logistic = $_POST['name_logistic'];
    $cel_logistic = $_POST['cel_logistic'];
    $mail_logistic = $_POST['mail_logistic'];
    $name_admin = $_POST['name_admin'];
    $cel_admin = $_POST['cel_admin'];
    $mail_admin = $_POST['mail_admin'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    
    $query = "INSERT INTO `empresas`(`razon_social`, `CUIT`, `IIBB`, `mail_admin`, `mail_logistic`, `name_admin`, `name_logistic`, `cel_admin`, `cel_logistic`, `direccion`, `user`, `empresa`, `pais`, `Provincia`) VALUES ('$razon_social', '$cuit', '$iibb', '$mail_admin', '$mail_logistic', '$name_admin', '$name_logistic', '$cel_admin', '$cel_logistic', '$direccion', '$user', '$company', '$country', '$ciudad')";
    $result = mysqli_query($conn, $query);
  
    if(!$result){
      $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar el Cliente';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/clientes_super_user.php'); 
    }else{
      $_SESSION['message'] = 'Se cargó correctamente el cliente '. $razon_social;
      $_SESSION['message_type'] = 'success';
      header('location:../views/clientes_super_user.php'); 
    }       
  }

}

?>

