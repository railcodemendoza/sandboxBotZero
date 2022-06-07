<?php 

session_start();

header("location:../mensajes/index.php");

session_destroy();



exit();

?>