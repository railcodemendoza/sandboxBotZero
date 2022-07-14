<?php

$id = $_GET['id'];

$query_2 = "SELECT booking FROM carga where id='$id'";
$result_2 =  mysqli_query($conn, $query_2);
if (mysqli_num_rows($result_2) == 1) {
    $row = mysqli_fetch_array($result_2);
    $booking = $row['booking'];
}


$query_status_gral = "SELECT status_type.id, carga.custom_place, carga.load_place, carga.unload_place FROM `carga` INNER JOIN status_type on carga.status = status_type.STATUS WHERE carga.booking = '$booking'";
$result_status_gral =  mysqli_query($conn, $query_status_gral);

if (mysqli_num_rows($result_status_gral) == 1) {
    $row = mysqli_fetch_array($result_status_gral);
    $status_num = $row['id'];
    $custom_place  = $row['custom_place'];
    $load_place = $row['load_place'];
    $unload_place = $row['unload_place'];
}


/* STATUS NUMBER 

1 - ASIGNADA
2 - YENDO A CARGAR
3 - CARGANDO
4 - CUSTOM PLACE
5 - YENDO A DESCARGAR
6 - STACKING
7 - CON PROBLEMA.
8 - ON BOARD
9 - NO ASIGNADA.

*/

if ($status_num != 9) {
    // el Status que ha qudado completado.
    for ($i = 1; $i < $status_num; $i++) {
        ${'class_' . $i} = 'ti-check-box';
    }
    // lo que todavia no pasa
    for ($i = 6; $i > $status_num; $i--) {
        ${'class_' . $i} = 'ti-na';
    }
    // lo que esta pasando
    ${'class_' . $status_num} = 'ti-reload';

    for ($i = 1; $i < $status_num; $i++) {
        ${'color_' . $i} = '#7aec82';
    }

    // Lo que todavia no es
    for ($i = 6; $i > $status_num; $i--) {
        ${'color_' . $i} = '#c5cdea';
    }

    ${'color_' . $status_num} = '#0ce6be';

    for ($i = 1; $i < $status_num; $i++) {
        ${'shadow_' . $i} = 'none';
    }
    for ($i = 6; $i > $status_num; $i--) {
        ${'shadow_' . $i} = 'none';
    }
    ${'shadow_' . $status_num} = '1px 1px 9px 1px rgba(40, 210, 218, 0.7)';

    for ($i = 1; $i < $status_num; $i++) {
        ${'shadow_t' . $i} = 'none';
    }
    for ($i = 6; $i > $status_num; $i--) {
        ${'shadow_t' . $i} = 'none';
    }
    ${'shadow_t' . $status_num} = '1px 1px 9px rgba(40, 210, 218, 0.7)';
} else {
    $class_1 = 'ti-na';
    $class_2 = 'ti-na';
    $class_3 = 'ti-na';
    $class_4 = 'ti-na';
    $class_5 = 'ti-na';
    $class_6 = 'ti-na';

    $shadow_t1 = 'none';
    $shadow_t2 = 'none';
    $shadow_t3 = 'none';
    $shadow_t4 = 'none';
    $shadow_t5 = 'none';
    $shadow_t6 = 'none';

    $color_1 = '#c5cdea';
    $color_2 = '#c5cdea';
    $color_3 = '#c5cdea';
    $color_4 = '#c5cdea';
    $color_5 = '#c5cdea';
    $color_6 = '#c5cdea';

    $shadow_1 = 'none';
    $shadow_2 = 'none';
    $shadow_3 = 'none';
    $shadow_4 = 'none';
    $shadow_5 = 'none';
    $shadow_6 = 'none';
}

?>
<div class="container mt-5 pt-3">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <div class="row">
                <div class="col-sm-5">
                    <hr class="mt-2">
                </div>
                <div class="col-sm-2">
                    <h5 class="text-center text-secondary">Estado de Carga</h5>
                </div>
                <div class="col-sm-5">
                    <hr class="mt-2">
                </div>
            </div>
            <div class="card-group">
                <div class="card col no-padding mr-1 " style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center; color:<?php echo $color_1; ?>">Retiro de Vacio</h4>
                        <h5 style="text-align: center; min-height: 2.5rem;">--</h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_1; ?>; text-shadow:<?php echo $shadow_t1; ?>;" class="<?php echo  $class_1 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px; background:<?php echo $color_1; ?>; box-shadow: <?php echo $shadow_1; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="card col no-padding mr-1 " style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center; color:<?php echo $color_2; ?> ">Yendo a Cargar</h4>
                        <h5 style="text-align: center; min-height: 2.5rem;"><?php echo $load_place; ?></h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_2; ?>; text-shadow:<?php echo $shadow_t2; ?>;" class="<?php echo  $class_2 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px;  background:<?php echo $color_2; ?>; box-shadow: <?php echo $shadow_2; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="card col no-padding mr-1" style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center; color:<?php echo $color_3; ?>">Cargando</h4>
                        <h5 style="text-align: center; min-height: 2.5rem; "><?php echo $load_place; ?></h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_3; ?>; text-shadow:<?php echo $shadow_t3; ?>;" class="<?php echo  $class_3 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px;  background:<?php echo $color_3; ?>; box-shadow: <?php echo $shadow_3; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="card col no-padding mr-1 " style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center; color:<?php echo $color_4; ?>">Aduana</h4>
                        <h5 style="text-align: center ; min-height: 2.5rem;"><?php echo $custom_place; ?></h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_4; ?>; text-shadow:<?php echo $shadow_t4; ?>;" class="<?php echo  $class_4 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px;  background:<?php echo $color_4; ?>; box-shadow:  <?php echo $shadow_4; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="card  no-padding mr-1 " style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center;color:<?php echo $color_5; ?>">On Way</h4>
                        <h5 style="text-align: center; min-height: 2.5rem;"><?php echo $unload_place; ?></h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_5; ?>; text-shadow:<?php echo $shadow_t5; ?>;" class="<?php echo  $class_5 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px;  background:<?php echo $color_5; ?>; box-shadow:  <?php echo $shadow_5; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="card  no-padding mr-1" style="box-shadow: none; border-right: 1px solid #80808040;">
                    <div class="card-body">
                        <h4 style="text-align: center; color:<?php echo $color_6; ?>">En Stacking</h4>
                        <h5 style="text-align: center; min-height: 2.5rem;"><?php echo $unload_place; ?></h5>
                        <div style="text-align: center; color:green;">
                            <i style="color:<?php echo $color_6; ?>; text-shadow:<?php echo $shadow_t6; ?>;" class="<?php echo  $class_6 ?>"></i>
                            <div class="progress progress-xs mt-3 mb-0" style="width: 100%; height: 5px;  background:<?php echo $color_6; ?>; box-shadow:  <?php echo $shadow_6; ?>;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div>