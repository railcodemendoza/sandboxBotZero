<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Traffic') { 
    
    include('../fijos/header.php');
    include('../fijos/Pannel_right_header.php');
    include('../includes/user_basic/pannel_left_user_basic.php');
    include('../includes/user_basic/head_view_traffic.php');
    include('vistaCarga/view_carga_user_controller.php');
    include('barraStatus/component_barra_status.php');
    include('vistaCarga/view_carga_user_vista.php');
    include('../fijos/footerdirect.php');

}else{

  include('noPermitido_view_super_user.php'); 

}
?>

