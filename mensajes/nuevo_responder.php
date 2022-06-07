<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right_header.php'); ?> <!-- estas son las que se modifican -->

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<?php include('../includes/user_basic/head_view_user_basic.php'); ?>

<?php

include "../mensajes/includes/config.php";
include "../mensajes/includes/funciones.php";

if(!isset($_SESSION['user'])) {
	header("Location: ../mensajes/login.php");
}

ini_set('error_reporting',0);

$para = $_GET['para'];
$titulo = $_GET['titulo'];
$mensaje = $_GET['mensaje'];

?>
 
<div class="container" >
<div class="content" >
  <div class="card">
    <div class="card-header">
        <h4 style="text-align: center;">Responder <?php echo $titulo;?> </h4>
    </div>
    <div class="card-body">
  <form method="post" action="">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-1"><label class="form-control-label">Para:</label></div>
      <div class="col-sm-3"><input class="form-control" type="text" value="<?php echo $para;?>"name="para" placeholder="Usuario"></div>
    </div>
    <br>
    <div class="row">
    <div class="col-sm-1"></div>

      <div class="col-sm-1"><label class="form-control-label">Asunto</label></div>
      <div class="col-sm-8"><input class="form-control" type="text" value="RE:<?php echo $titulo;?>" name="titulo" placeholder="Hola, cómo andás?"></div>
    </div>
    <br><br>
    <div class="row">
    <div class="col-sm-1"></div>

      <div class="col-sm-10"><textarea cols="100" rows="10" name="mensaje" >
      
      <?php echo  ' @'. $_SESSION['user'] .  "\n";?>
      <?php echo "\n" ;?>
      <?php echo ':::::::::::: Mensaje Anterior:::::::::::::' . "\n" . "\n" ;?>
      <?php echo $mensaje;?>
      </textarea></div>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-2"><input type="submit" class="btn btn-primary" name="guardar" value="Enviar Mensaje">
      <div class="col-sm-5"></div>
    
    
    </div>
    </div>

  </form>
  </div>
  </div>
</div>
</div>
<?php
  
  if(isset($_POST['guardar'])) {

    $para = $_POST['para'];
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    $query = "SELECT * FROM usuarios WHERE usuario = '$para'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    $contar = mysqli_num_rows($result);

    if($contar != 0) {

      $query_ins ="INSERT INTO mensajes (titulo,mensaje,de,para,fecha,leido,estado) values ('$titulo','$mensaje','".$_SESSION['id']."','".$row['id']."',now(),'1','normal')";
      $result_ins = mysqli_query($conn, $query_ins);

      
      if($result_ins) {
        
    
        $_SESSION['message'] = 'El mensaje se ha enviado';
        $_SESSION['message_type'] = 'success';
        header('location:../mensajes/index.php');
      
      } else { 
        
        $_SESSION['message'] = 'Algo Salió mal';
        $_SESSION['message_type'] = 'danger';
        header('location:../mensajes/nuevo.php');
      }

    } else {$_SESSION['message'] = 'El usuario no existe';
        $_SESSION['message_type'] = 'danger';
        header('location:../mensajes/nuevo.php'); }

  } 

?>
<?php include('../fijos/footer.php'); ?>