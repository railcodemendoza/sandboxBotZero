
    <?php

    $query_doc = "SELECT id_cntr, document_invoice, document_packing, interchange, cntr_crt, cntr_micdta FROM cntr WHERE cntr_number = '$cntr_number'";
    $result_doc = mysqli_query($conn, $query_doc);
    $row = mysqli_fetch_array($result_doc);

    $id_cntr = $row['id_cntr'];
    $document_invoice = $row['document_invoice'];
    $document_packing = $row['document_packing'];
    $interchange = $row['interchange'];
    $cntr_crt = $row['cntr_crt'];
    $cntr_micdta = $row['cntr_micdta'];

    if ($interchange == null) {
        $estado_interchange  = 'disabled';
        $title_interchange  = 'No hay Documeto';
        $class_interchange  = 'secondary';
        $color_interchange = 'gray';
        $href_interchange = '';
        $down_interchange = '';
    } else {
        $estado_interchange  = '';
        $class_interchange  = 'primary';
        $color_interchange = 'blue';
        $title_interchange = $interchange;
        $href_interchange = 'href=' . '"../formularios/interchange/<?php echo $booking' . '/' . '$cntr_number' . '/' . '$interchange; ?>' . '"';
        $down_interchange = 'download = "$interchange"';
    };

    if ($document_packing == null) {
        $estado_document_packing  = 'disabled';
        $title_document_packing  = 'No hay Documeto';
        $class_document_packing  = 'secondary';
        $color_document_packing = 'gray';
        $href_packing = '';
        $down_packing = '';
    } else {
        $estado_document_packing  = '';
        $class_document_packing  = 'primary';
        $color_document_packing = 'blue';
        $title_document_packing = $document_packing;
        $href_packing = 'href=' . '"../formularios/archivos_packing/' . $booking . '/' . $id_cntr . '/' . $document_packing . '"';
        $down_packing = 'download = ' . $document_packing;
    };
    if ($document_invoice == null) {
        $estado_document_invoice  = 'disabled';
        $title_document_invoice  = 'No hay Documeto';
        $class_document_invoice  = 'secondary';
        $color_document_invoice = 'gray';
        $href_invoice = '';
        $down_invoice = '';
    } else {
        $estado_document_invoice  = '';
        $class_document_invoice  = 'primary';
        $color_document_invoice = 'blue';
        $title_document_invoice = $document_invoice;
        $href_invoice = 'href=' . '"../formularios/archivos_invoice/' . $booking . '/' . $id_cntr . '/' . $document_invoice . '"';
        $down_invoice = 'download = ' . $document_invoice;
    };
    if ($cntr_crt == null) {
        $estado_cntr_crt  = 'disabled';
        $title_cntr_crt  = 'No hay Documeto';
        $class_cntr_crt  = 'secondary';
        $color_cntr_crt = 'gray';
        $href_cntr_crt = '';
        $down_cntr_crt = '';
    } else {
        $estado_cntr_crt  = '';
        $class_cntr_crt = 'primary';
        $color_cntr_crt = 'blue';
        $title_cntr_crt = $cntr_crt;
        $href_cntr_crt = 'href=' . '"../formularios/cntr_crt/<?php echo $booking' . '/' . '$cntr_number' . '/' . '$cntr_crt; ?>' . '"';
        $down_cntr_crt = 'download = "$cntr_crt"';
    };
    if ($cntr_micdta == null) {
        $estado_cntr_micdta  = 'disabled';
        $title_cntr_micdta  = 'No hay Documeto';
        $class_cntr_micdta  = 'secondary';
        $color_cntr_micdta = 'gray';
        $href_cntr_micdta = '';
        $down_cntr_micdta = '';
    } else {
        $estado_cntr_micdta  = '';
        $class_cntr_micdta = 'primary';
        $color_cntr_micdta = 'blue';
        $title_cntr_micdta = $cntr_micdta;
        $href_cntr_micdta = 'href=' . '"../formularios/cntr_micdta/<?php echo $booking' . '/' . '$cntr_number' . '/' . '$cntr_micdta; ?>' . '"';
        $down_cntr_micdta = 'download = "$cntr_micdta"';
    };



    ?>