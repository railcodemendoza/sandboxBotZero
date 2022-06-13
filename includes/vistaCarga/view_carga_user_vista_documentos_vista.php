<div style="border-radius: 10px; background: #9EA5AA; " class="card border border-secondary">
    <div class="card-header" style="text-align:center;">
        <h4 class="box-title">Documentos de la Carga.</h4>
    </div>
    <?php include('view_carga_user_vista_documentos_controller.php') ?>
    <div style="background: white;padding: 3% 7% 4% 7%; border-radius: 7px;" class="card-body">
        <div class="row" style="text-align: center;">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 mr-2">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <a class="btn btn-outline-<?php echo $class_interchange; ?>" title="<?php echo $title_interchange; ?>" <?php echo $href_interchange; ?> <?php echo $down_interchange; ?> <?php echo $estado_interchange; ?>><i class="fa fa-file-o"></i></a>

                        <br>
                        <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_interchange; ?>">Interchange</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-2 mr-2">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <a class="btn btn-outline-<?php echo $class_document_packing; ?>" title="<?php echo $title_document_packing; ?>" <?php echo $href_packing; ?> <?php echo $down_packing; ?> <?php echo $estado_document_packing; ?>><i class="fa fa-file-o"></i></a>

                        <br>
                        <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_document_packing; ?>">Packing List</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-2 mr-2">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <a class="btn btn-outline-<?php echo $class_document_invoice; ?>" title="<?php echo $title_document_invoice; ?>" <?php echo $href_invoice; ?> <?php echo $down_invoice; ?> <?php echo $estado_document_invoice; ?>><i class="fa fa-file-o"></i></a>

                        <br>
                        <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_document_invoice; ?>">Invoice</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-2 mr-2">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <a class="btn btn-outline-<?php echo $class_cntr_crt; ?>" title="<?php echo $title_cntr_crt; ?>" <?php echo $href_cntr_crt; ?> <?php echo $down_cntr_crt; ?> <?php echo $estado_cntr_crt; ?>><i class="fa fa-file-o"></i></a>

                        <br>
                        <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_cntr_crt; ?>">CRT</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-2 mr-2">
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <a class="btn btn-outline-<?php echo $class_cntr_micdta; ?>" title="<?php echo $title_cntr_micdta; ?>" <?php echo $href_cntr_micdta; ?> <?php echo $down_cntr_micdta; ?> <?php echo $estado_cntr_micdta; ?>><i class="fa fa-file-o"></i></a>

                        <br>
                        <p style="margin-bottom: 0%;margin-top: 9%; color:<?php echo $color_cntr_micdta; ?>">MIC DTA</p>
                    </div>

                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</div>