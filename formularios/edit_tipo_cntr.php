<?php

include("../db.php"); // aca me traigo la base de datos. 

// revisar si tiene aplicaciones en asignacion.


if (isset($_GET['id'])) {   // me traigo la informacion segun ID seleccionada. 
  
  $id = $_GET['id'];
   
   if (isset($_POST['editar_tipo'])) {


      $title =$_POST['title']; 
      $teu = $_POST['teu'];
      $weight = $_POST['weight'];
      $height = $_POST['height'];
      $width = $_POST['width'];
      $long = $_POST['longitud'];
      $observation = $_POST['observation'];
      $user = $_SESSION['user'];
      

      $query ="UPDATE `cntr_type` SET `title`='$title',`teu`='$teu', `weight`='$weight',`height`='$height',`width`='$width',`longitud`= '$long',`observation`='$observation',`user`='$user' WHERE id = '$id'";
      $result = mysqli_query($conn, $query);

      if(!$result){

        $_SESSION['message'] = 'El Tipo de Contenedor no pudo ser actualizado';
        $_SESSION['message_type'] = 'danger';
      header('location:../views/tipos_de_cntr.php'); 

      }else{

        $_SESSION['message'] = 'Se editó correctamente tipo de Contenedor';
        $_SESSION['message_type'] = 'success';
        header('location:../views/tipos_de_cntr.php'); 
      }
  }

   if (isset($_POST['agregar_tipo'])) {

   
      $title =$_POST['title']; 
      $teu = $_POST['teu'];
      $weight = $_POST['weight'];
      $height = $_POST['height'];
      $width = $_POST['width'];
      $long = $_POST['longitud'];
      $observation = $_POST['observation'];
      $user = $_SESSION['user'];
      

      $query ="INSERT INTO `cntr_type`(`title`, `teu`, `weight`, `height`, `width`, `longitud`, `observation`, `user`) VALUES ( '$title', '$teu', '$weight', '$height', '$width', '$long', '$observation', '$user')";
      $result = mysqli_query($conn, $query);

      if(!$result){

        $_SESSION['message'] = 'El Tipo de Contenedor no se pudo agregar';
        $_SESSION['message_type'] = 'danger';
      header('location:../views/tipos_de_cntr.php'); 

      }else{

        $_SESSION['message'] = 'Se agregó correctamente tipo de Contenedor';
        $_SESSION['message_type'] = 'success';
        header('location:../views/tipos_de_cntr.php'); 
      }
  
    }
}


?>

