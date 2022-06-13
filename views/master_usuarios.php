<?php

include('../db.php');
$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso = 'Master') { 
    include("master_usuarios_header.php");
    include("../includes/super_user/pannel_left_super_user.php");
    include('../fijos/Pannel_right_header.php');
    include("master_usuarios_vista.php");
    include("master_usuarios_footer.php");


 
}else{

    include('noPermitido_view_super_user.php'); 
  
  } ?>

