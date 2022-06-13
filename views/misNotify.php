<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];


  if ($permiso =='Customer' || $permiso =='Master') { 

    if($permiso =='Customer'){
  
      include('../fijos/headerdirect.php');
      include("../includes/customer/pannel_left_customer.php");
      include('../fijos/Pannel_right_header.php');

    }else{
      
      include('../fijos/header.php');
      include('../fijos/Pannel_right_header.php');
      include("../includes/super_user/pannel_left_super_user.php");
  
    }

    include('misNotify_vista.php');
    include('../fijos/footerdirect.php');
    
}else{

  include('noPermitido_view_super_user.php'); 

}
