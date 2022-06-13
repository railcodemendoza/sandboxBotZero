<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Traffic' || $permiso =='Master') { 

  if($permiso =='Traffic'){

    include('../fijos/Pannel_right_header.php'); 

    include('../fijos/headerdirect.php');
    include("../includes/user_basic/pannel_left_user_basic.php");
    include("../includes/user_basic/head_view_traffic.php");

  }else{
    
    include('../fijos/header.php');
    include('../fijos/Pannel_right_header.php');
    include("../includes/super_user/pannel_left_super_user.php");

  }

    
    include("tabla_instructivos.php");
    include('../fijos/footerdirect.php');
}else{

  include('noPermitido_view_super_user.php'); 

}
?>

