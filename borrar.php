<?php
session_start();
include "../mensajes/includes/config.php";
include "../mensajes/includes/funciones.php";

if(!isset($_SESSION['user'])) {
	header("Location: ../mensajes/login.php");
}

ini_set('error_reporting',0);
?>



<?php

if(isset($_GET['id'])) {

$query = "UPDATE mensajes SET estado = 'eliminado' WHERE id = '".$_GET['id']."'";
$result = mysqli_query($conn, $query);
header("Location: ../mensajes/index.php");

}
?>