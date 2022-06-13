<div style="border-radius: 10px; background: #9EA5AA; " class="card">
    <div class="card-header" style="background:#ecf1f1;">
        <h4 style="text-align: center;">Detalles de la Carga</h4>
    </div>
    <div style="background: white; padding: 6% 5% 5% 10% !important; border-radius: 7px;" class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <h4>ID:</h4>
            </div>
            <div class="col">
                <h4><?php echo $id; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Booking</h4>
            </div>
            <div class="col">
                <h4><?php echo $booking; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Referencia:</h4>
            </div>
            <div class="col">
                <h4><?php echo $ref_customer; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Lugar de Carga:</h4>
            </div>
            <div class="col">
                <h4><?php echo $load_place; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Puerto de Carga:</h4>
            </div>
            <div class="col">
                <h4><?php echo $unload_place; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Cut Off Físico:</h4>
            </div>
            <div class="col">
                <h4><?php echo $cut_off_fis; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Cut Off Físico:</h4>
            </div>
            <div class="col">
                <h4><?php echo $cut_off_fis; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Vessel:</h4>
            </div>
            <div class="col">
                <h4><?php echo $vessel . '-' . $voyage; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Cut Off Doc:</h4>
            </div>
            <div class="col">
                <h4><?php echo $cut_off_doc; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>ETA:</h4>
            </div>
            <div class="col">
                <h4><?php echo $ETA; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>ETD:</h4>
            </div>
            <div class="col">
                <h4><?php echo $ETD; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Lugar de Aduana:</h4>
            </div>
            <div class="col">
                <h4><?php echo $custom_place; ?></h4>
            </div>
        </div>
        <hr style="width: 60%; margin: 2% 2% 2% 0%;">
        <div class="row">
            <div class="col-sm-2">
                <h4>Despachante:</h4>
            </div>
            <div class="col">
                <h4><?php echo $custom_agent; ?></h4>
            </div>
        </div>
    </div>
</div>