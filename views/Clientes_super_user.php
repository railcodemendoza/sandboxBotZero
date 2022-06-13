


<?php

include('../db.php');
include('../fijos/header.php');

$permiso = $_SESSION['permiso'];
$empresa = $_SESSION['company'];


if ($permiso = 'Master') {

    include("../includes/super_user/pannel_left_super_user.php");
    include('../fijos/Pannel_right_header.php');
    include('Clientes_super_user_vista.php');
    include('../fijos/footer.php');

} ?>