<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Customer') { 
    
    include('../fijos/headerdirect.php');
    include('../includes/customer/pannel_left_customer.php');
    include('../fijos/Pannel_right_header.php');
    include('../includes/customer/head_view_customer.php');
    include('view_carga_controller.php');
    include('../includes/barra_status.php');
    include('view_carga_vista.php');
    include('../fijos/footerdirect.php');
    
}else{

  include('noPermitido_view_super_user.php'); 

}
?>




