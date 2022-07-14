<div style="border-radius: 10px;margin: 2rem 0rem 2rem 0rem; " class="card border-secondary">
    <div class="card-header text-center">
        <h4 class="box-title"> Detalles de la Carga ID: <?php echo $id; ?></h4>
    </div>
    <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Booking: </strong> <?php echo $booking; ?></h4>
            </div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Referencia: </strong> <?php echo $ref_customer; ?></h4>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Lugar de Carga: </strong> <?php echo $load_place; ?></h4>
            </div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Lugar de Descarga: </strong> <?php echo $unload_place; ?></h4>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Cut Off físico: </strong> <?php echo $cut_off_fis; ?></h4>
            </div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Cut Off Documental: </strong> <?php echo $cut_off_doc; ?></h4>
            </div>
        </div>
        <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Vessel - Voyage: </strong> <?php echo $vessel . '-' . $voyage; ?></h4>
            </div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> ETA - ETD: </strong> <?php echo $ETA . '-' . $ETD; ?></h4>
            </div>
        </div>
        <hr class="mx-auto" style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Destino final: </strong> <?php echo $final_point; ?></h4>
            </div>
            <div class="col-sm-5">
                <h4 class="text-secondary"> <strong class="text-dark ml-2"> Aduana (despachante): </strong> <?php echo $custom_place . '(' . $custom_agent . ')'; ?></h4>
            </div>
        </div>
    </div>
</div>