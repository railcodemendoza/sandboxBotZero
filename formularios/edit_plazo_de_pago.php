<?php

include("../db.php"); // aca me traigo la base de datos. 


// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
  if (isset($_POST['editar_modo_de_pago'])) {
    
    $title = $_POST['title'];
    $description  =  $_POST['description'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];


    $query = "UPDATE `modos_de_pago` SET `title`='$title',`description`='$description',`user`='$user',`empresa`='$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
      $_SESSION['message'] = 'el modo de Pago ' . $title. ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/modos_de_pago.php'); 
    }else{
      $_SESSION['message'] = 'Se edito correctamente el Modo de Pago '. $title;
      $_SESSION['message_type'] = 'success';
      header('location:../views/modos_de_pago.php'); 
    }
  }
  if (isset($_POST['agregar_modo_de_pago'])){

    $title = $_POST['title'];
    $description  =  $_POST['description'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    
    $query = "INSERT INTO `modos_de_pago`(`title`, `description`, `user`, `empresa`) VALUES ('$title', '$description', '$user', '$company')";
    $result = mysqli_query($conn, $query);
  
    if(!$result){
      $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar el Modo de Pago';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/modos_de_pago.php'); 
    }else{
      $_SESSION['message'] = 'Se cargó correctamente el Modo de Pago '. $title;
      $_SESSION['message_type'] = 'success';
      header('location:../views/modos_de_pago.php'); 
    }       
  }




  if (isset($_POST['editar_plazo_de_pago'])) {
    
    $title = $_POST['title'];
    $description  =  $_POST['description'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];


    $query = "UPDATE `plazos_de_pago` SET `title`='$title',`description`='$description',`user`='$user',`empresa`='$company' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
      $_SESSION['message'] = 'el Plazo de Pago ' . $title. ' no pudo ser actualizado';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/modos_de_pago.php#Plazos'); 
    }else{
      $_SESSION['message'] = 'Se edito correctamente el Plazo de Pago '. $title;
      $_SESSION['message_type'] = 'success';
      header('location:../views/modos_de_pago.php#Plazos'); 
    }
  }
  if (isset($_POST['agregar_plazo_de_pago'])){

    $title = $_POST['title'];
    $description  =  $_POST['description'];
    $user = $_SESSION['user'];
    $company = $_SESSION['company'];

    
    $query = "INSERT INTO `plazos_de_pago`(`title`, `description`, `user`, `empresa`) VALUES ('$title', '$description', '$user', '$company')";
    $result = mysqli_query($conn, $query);
  
    if(!$result){
      $_SESSION['message'] = 'Algo falló. Intenta nuevamente cargar el Plazo de Pago';
      $_SESSION['message_type'] = 'danger';
      header('location:../views/modos_de_pago.php#Plazos'); 
    }else{
      $_SESSION['message'] = 'Se cargó correctamente el Plazo de Pago '. $title;
      $_SESSION['message_type'] = 'success';
      header('location:../views/modos_de_pago.php#Plazos'); 
    }       
  }
}
