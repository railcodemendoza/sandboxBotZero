<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];
$user = $_SESSION['user'];

if ($permiso =='Customer') { 
    
    include('../fijos/headerdirect.php');
    include('../includes/customer/pannel_left_customer.php');
    include('../fijos/Pannel_right_header.php');
    include('../includes/barra_status.php');
    include('view_cargarDocsCntr_vista.php');
    include('../fijos/footerdirect.php');
    
}elseif ($permiso =='Traffic') { 
    
  include("../fijos/headerdirect.php"); 
  include("../includes/user_basic/pannel_left_user_basic.php"); 
  include('../fijos/Pannel_right_header.php');

  include('view_cargarDocsCntr_vista.php');
  include('../fijos/footerdirect.php');
  
}else{

  include('noPermitido_view_super_user.php'); 

} 
?>




