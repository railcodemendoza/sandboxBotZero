
<?php

include('../db.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];

if ($permiso =='Traffic') { 
 
    include('../fijos/headerdirect.php');
    include("../includes/user_basic/pannel_left_user_basic.php");
    include('../fijos/Pannel_right_header.php');
    include('misDatos_controller.php');
    include('misDatos_vista.php');
    include('../fijos/footerdirect.php');

}else{

  include('noPermitido_view_super_user.php'); 

}
?>



            