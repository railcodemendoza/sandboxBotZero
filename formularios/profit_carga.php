<?php include('../db.php'); ?>


<?php

if  (isset($_GET['id_cntr'])) { // me traigo la informacion segun ID seleccionada. 
    $id_cntr = $_GET['id_cntr'];
    $query = "SELECT * FROM cntr INNER JOIN carga ON cntr.booking = carga.booking WHERE id_cntr = '$id_cntr'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
        $cntr_number = $row['cntr_number'];
    } 
?>

<?php include('../fijos/headerdirect.php'); ?>

<?php include('../fijos/Pannel_right_header.php');?>

<?php include('../includes/user_basic/head_view_traffic.php'); ?>

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<div class="content" style="background: linear-gradient(to left, #17A589, #2E303E );">
    <div class="container">
        <div class="row">
            <?php 
            
                $query_in_usd = "SELECT SUM(in_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
                $result_in_usd = mysqli_query($conn, $query_in_usd);
                
                if (mysqli_num_rows($result_in_usd) == 1) {
                    $row = mysqli_fetch_array($result_in_usd);
                    $in_usd = $row['0'];
                    }else{
                    $in_usd = '0';
                    }
                $query_out_usd = " SELECT SUM(out_usd) FROM `profit` WHERE cntr_number = '$cntr_number'";
                $result_out_usd = mysqli_query($conn, $query_out_usd);
                
                    if (mysqli_num_rows($result_out_usd) == 1) {
                        $row = mysqli_fetch_array($result_out_usd);
                        $out_usd = $row['0'];
                    }else{
                        $out_usd = '0';
                    }
                    
                $profit = $in_usd - $out_usd;
            
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Ingresos (USD)</div>
                                <div class="stat-digit"><?php echo $in_usd?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Egreso (USD)</div>
                                <div class="stat-digit"><?php echo $out_usd?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Profit USD</div>
                                <div class="stat-digit"><?php echo $profit;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        
            </div>
        <div class="card">
            <div style="text-align:center; "class="card-header">
                <h4>Profit de CNTR <strong><?php echo $cntr_number;?></strong></h4>
            </div>
            <br>
            <div class="card-body">
                <div class="container">
                    <h4 style="text-align: center;">Ingresos </h3>
                    <br>   
                <div class="container">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <theader>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Razon Social</th>
                                <th>Detalle</th>
                                <th>IN USD</th>

                                <th>Opciones</th>
                            </tr>
                        </theader>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM profit WHERE cntr_number = '$cntr_number' AND in_usd !='0'";
                                $result_tasks = mysqli_query($conn, $query);    

                                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['in_razon_social']; ?></td>
                                <td><?php echo $row['in_detalle']; ?></td> 
                                <td><?php echo 'USD '. $row['in_usd']; ?></td> 
                                <td style="text-align: center;">
                                    <a href="../includes/delete_ingreso.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <button title="Editar" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngreso<?php echo $row['id'];?>">
                                        <i style="color:white;" class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Agregar Modal para Editar-->
                            <div class="modal fade" id="modalIngreso<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Ingreso para: </h4>               
                                        </div>
                                        <div class="modal-body">
                                            <div class="card border border-secondary">
                                                <div class="card-body">
                                                    <form action="../formularios/editar_profit.php?cntr_number=<?php echo $cntr_number . '&id='.$row['id']; ?>;?>" method="post" class="form-horizontal">
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                                    <input type="text" id="in_razon_social" name="in_razon_social" value="<?php echo $row['in_razon_social']; ?>" class="form-control" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-clipboard"></i></div>
                                                                    <input type="text" id="in_detalle" name="in_detalle" value="<?php echo $row['in_detalle']; ?>" class="form-control" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row form-group">
                                                            <div class="col col-md-4"></div>
                                                            <div class="col col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                                                    <input type="text" id="in_usd" name="in_usd" value="<?php echo $row['in_usd']; ?>" class="form-control" require>
                                                                    <p style="margin: 0.5rem;" >Ej: 500.25</p>
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-4"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-5"></div>
                                                            <div class="col col-md-2">
                                                                <button type="submit" class="btn btn-info" name="editar_in" id="editar_in">Editar</button>
                                                            </div>
                                                            
                                                            <div class="col col-md-5"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-2 mb-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            </div>
                                            <div class="col-sm-5"></div>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                                <?php
                                }
                                ?>
                                           
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarIngreso">Agregar Ingreso</button>
                            
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>
                <br>
                <hr style="width: 60%;">
                <br>
                <h4 style="text-align: center;">Egresos</h3>   
                <br>            
                <div class="container">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <theader>
                            <tr style="text-align: center;">
                                <th>ID</th>
                                <th>Razon Social</th>
                                <th>Detalle</th>
                                <th>OUT USD</th>                                
                                <th>Opciones</th>
                            </tr>
                        </theader>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM profit WHERE cntr_number = '$cntr_number' AND in_usd = '0'";
                                $result_tasks = mysqli_query($conn, $query);    

                                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['out_razon_social']; ?></td>
                                <td><?php echo $row['out_detalle']; ?></td> 
                                <td><?php echo 'USD '. $row['out_usd']; ?></td> 
                                <td style="text-align: center;">
                                    <a href="../includes/delete_egreso.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                                <button title="Editar" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEgreso<?php echo $row['id'];?>">
                                        <i style="color:white;" class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Agregar Modal para Editar-->
                            <div class="modal fade" id="modalEgreso<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h4 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Editar Egreso para: </h4>               
                                        </div>
                                        <div class="modal-body">
                                            <div class="card border border-secondary">
                                                <div class="card-body">
                                                    <form action="../formularios/editar_profit.php?cntr_number=<?php echo $cntr_number . '&id='.$row['id']; ?>;?>" method="post" class="form-horizontal">
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                                    <input type="text" id="out_razon_social" name="out_razon_social" value="<?php echo $row['out_razon_social']; ?>" class="form-control" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-clipboard"></i></div>
                                                                    <input type="text" id="out_detalle" name="out_detalle" value="<?php echo $row['out_detalle']; ?>" class="form-control" require>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row form-group">
                                                            <div class="col col-md-4"></div>
                                                            <div class="col col-md-4">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                                                    <input type="text" id="in_usd" name="out_usd" value="<?php echo $row['out_usd']; ?>" class="form-control" require>
                                                                    <p style="margin: 0.5rem;" >Ej: 500.25</p>
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-4"></div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col col-md-5"></div>
                                                            <div class="col col-md-2">
                                                                <button type="submit" class="btn btn-info" name="editar_out" id="editar_in">Editar</button>
                                                            </div>
                                                            
                                                            <div class="col col-md-5"></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-2 mb-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                            </div>
                                            <div class="col-sm-5"></div>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarEgreso">Agregar Egreso</button></div>
                           
                        <div class="col-sm-5"></div>
                    </div>
                </div>
                
                </div>
            </div>  
        </div>
    </div>
    <?php 
}
?>
</div>
<!--Modal Agregar IN -->
<div class="modal fade" id="agregarIngreso" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Ingreso a <strong><?php echo $cntr_number;?></strong></h5>
            </div>
            <div class="modal-body">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <form action="../formularios/actualiza_profit.php?cntr_number=<?php echo $cntr_number?>" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <input type="text" id="in_razon_social" name="in_razon_social" placeholder="Rason Social" class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clipboard"></i></div>
                                        <input type="text" id="in_detalle" name="in_detalle" placeholder="Detalle" class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-4"></div>
                                <div class="col col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input type="text" id="in_usd" name="in_usd" placeholder=".." class="form-control" require>
                                        <p style="margin: 0.5rem;" >Ej: 500.25</p>
                                    </div>
                                </div>
                                <div class="col col-md-4"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-5"></div>
                                <div class="col col-md-2">
                                    <button type="submit" class="btn btn-info" name="agregar_in" id="agregar_in"  >Agregar</button>
                                </div>
                                
                                <div class="col col-md-5"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-2 mb-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >cerrar</button>
                </div>
                <div class="col-sm-5"></div>
            </div> 
        </div>
    </div>
</div>

<!--Modal Agregar OUT -->
<div class="modal fade" id="agregarEgreso" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 style="text-align:center;"class="modal-title" id="scrollmodalLabel">Agregar Egreso a <strong><?php echo $cntr_number;?></strong></h5>
            </div>
            <div class="modal-body">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <form action="../formularios/actualiza_profit.php?cntr_number=<?php echo $cntr_number?>" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                        <input type="text" id="out_razon_social" name="out_razon_social" placeholder="Rason Social" class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clipboard"></i></div>
                                        <input type="text" id="out_detalle" name="out_detalle" placeholder="Detalle" class="form-control"require>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col col-md-4"></div>
                                <div class="col col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                        <input type="text" id="out_usd" name="out_usd" placeholder=".." class="form-control" require>
                                        <p style="margin: 0.5rem;" >Ej: 500.25</p>
                                    </div>
                                </div>
                                <div class="col col-md-4"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-5"></div>
                                <div class="col col-md-2">
                                    <button type="submit" class="btn btn-info" name="agregar_out" id="agregar_out">Agregar</button>
                                </div>
                                
                                <div class="col col-md-5"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-2 mb-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    
                </div>
                <div class="col-sm-5"></div>
            </div> 
        </div>
    </div>
</div>
<?php include('../fijos/footerdirect.php'); ?>