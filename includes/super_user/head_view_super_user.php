
<?php    
    $usuario = $_SESSION['user']; 
    $hoy = getdate();    
?>
    
<br>
 <div style="background:linear-gradient(to left, #17A589, #2E303E );" class="breadcrumbs">
    <div style="border-radius: 1rem;" class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $usuario; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="../includes/view_super_user.php">Usuarios</a></li>
                            <li><a href="../super_user/cargas_super_user.php">Contenedores</a></li>
                            <li><a href="#">Proveedores</a></li>
                            <li><a href="#">Commodities</a></li>
                            <li><a href="#">Origenes y Destinos</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> 
</div>
   