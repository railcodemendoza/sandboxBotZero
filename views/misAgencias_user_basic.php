<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if($permiso =='Traffic' || $permiso =='Master') { 

    if($permiso =='Traffic'){
  
      include("../fijos/headerdirect.php"); 
      include("../includes/user_basic/pannel_left_user_basic.php"); 
      include('../fijos/Pannel_right_header.php'); 
  
    }else{
      
      include('../fijos/header.php');
      include('../fijos/Pannel_right_header.php');
      include("../includes/super_user/pannel_left_super_user.php");
  
    }
    
    include('misAgencias_vista.php');
    include('../fijos/footerdirect.php');

}else{

  include('noPermitido_view_super_user.php'); 

}
?>
