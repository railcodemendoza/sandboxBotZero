<?php

include("../db.php"); // aca me traigo la base de datos. 

// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_user'])) {

    foreach ($_POST['permiso'] as $permiso);
    foreach ($_POST['empresa'] as $empresa);

    $username= $_POST['username'];
    $email = $_POST['email'];
    $celular =  $_POST['celular'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];
    

    $query ="UPDATE `users` SET `username`= '$username', `email`= '$email', `celular`='$celular' ,`empresa`='$empresa', `permiso`= '$permiso' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

  }

  if(!$result){

    $_SESSION['message'] = 'El usuario' . $username. ' no pudo ser actualizado';
    $_SESSION['message_type'] = 'danger';
   header('location:../views/master_usuarios.php'); 

  }else{

    $_SESSION['message'] = 'Se editó correctamente el usuario '. $username;
    $_SESSION['message_type'] = 'success';
    header('location:../views/master_usuarios.php'); 
  }
  
}


?>

