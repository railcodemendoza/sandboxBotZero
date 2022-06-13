<?php include('../db.php'); ?>
<?php include('../fijos/header.php'); ?>
<?php
$user = $_SESSION['user'];

                                        $query = "SELECT * FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE carga.booking = '726621718'" ;
                                        $result_tasks = mysqli_query($conn, $query);    

                                        $query_int = "SELECT * FROM intruction WHERE booking = '726621718'";
                                        $result_int = mysqli_query($conn, $query_int); 

                                        if ($result_int >= 0){

                                                $transport = "N/A";
                                            }else{
                                                $transport = $row['transport'];
                                            }
                                        
                                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>

<a title="Ver CNTR" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal<?php echo $row['id_cntr'];?>" >
                                                <i style="color:white;" class="fa fa-eye"></i>
                                                </a>


<div class="modal fade" id="largeModal<?php echo $row['id_cntr'];?>" tabindex="-1" role="document" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Detalles de CNTR <?php echo $row['cntr_number'];?></h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">id:</div>
                            <div class="col-sm-6"><?php echo $row['id_cntr']; ?></div>
                        </div>
                        <hr style="margin: 0%;">
                        <div class="row">
                            <div class="col-sm-6">Precinto</div>
                            <div class="col-sm-6"><?php echo $row['cntr_seal']; ?></div>
                        </div>
                        <hr style="margin: 0%;">
                        <div class="row">
                            <div class="col-sm-6">Seteo</div>
                            <div class="col-sm-2"><?php echo 'T°: ' . $row['set_']; ?></div>
                            <div class="col-sm-2"><?php echo 'H°: ' . $row['set_humidity']; ?></div>
                            <div class="col-sm-2"><?php echo 'V°: ' . $row['set_vent']; ?></div>
                        </div>
                        <hr style="margin: 0%;">
                        <div class="row">
                            <div class="col-sm-6">Retiro</div>
                            <div class="col-sm-6"><?php echo $row['retiro_place']; ?></div>
                        </div>
                        <hr style="margin: 0%;">
                        <div class="row">
                            <div class="col-sm-6">Aduana:</div>
                            <div class="col-sm-6"><?php echo $row['custom_place']; ?></div>
                        </div>
                            <hr style="margin: 0%;">
                        <div class="row">
                            <div class="col-sm-6">Puerto de Carga:</div>
                            <div class="col-sm-6"><?php echo $row['unload_place']; ?></div>
                        </div>     
                    </div>
                    <div class="col-sm-5">
                        <div class="content">
                            <table class="table table-hover">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>Status</th>
                                        <th>Detalle</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="molal-footer">
            <button type="button" class="btn btn-prymary" data-dismiss="modal">
                    close
                </button>
            </div>
        </div>   
    </div>  
</div> 
<?php
                                        }
include('../fijos/footer.php'); ?>