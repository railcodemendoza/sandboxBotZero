<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right_header.php'); ?> <!-- estas son las que se modifican -->

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<?php include('../includes/user_basic/head_view_user_basic.php'); ?>

<?php

include "../mensajes/includes/config.php";
include "../mensajes/includes/funciones.php";

if(!isset($_SESSION['user'])) {
	header("Location:../mensajes/login.php");
}

ini_set('error_reporting',0);
?>



<?php

if(isset($_GET['id'])){


  $query = "SELECT * FROM mensajes WHERE id = '".$_GET['id']."'";
  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  $query_msg ="UPDATE mensajes SET leido = '0' WHERE id = '".$_GET['id']."'";
  $result_msg = mysqli_query($conn, $query_msg);

 
?>
<div class="container">
  <div class="content">
    <div class="card">
      <div class="card-header">
        Título: <?php echo $row['titulo']; ?>
      </div>  
      <div class="card-body">
      Mensaje: <?php echo $row['mensaje']; ?>

    </div>


<?php
}
?>
<a href="../mensajes/index.php">salir</a>
</div>
</div></div>