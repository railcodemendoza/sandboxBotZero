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
