<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Traffic') { 
    
    include('../fijos/header.php');
    include('../includes/user_basic/pannel_left_user_basic.php');
    include('../fijos/Pannel_right_header.php');
    include('../includes/user_basic/head_view_traffic.php');
    include('formularioInstructivo_controller.php');
    include('formularioInstructivo_vista.php');
    include('../fijos/footer.php');

}else{

  include('noPermitido_view_super_user.php'); 

}
?>
