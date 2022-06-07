<?php

include("../db.php"); // aca me traigo la base de datos. 


if  (isset($_GET['id'])) { // me traigo la informacion segun ID seleccionada. 
  $id = $_GET['id'];
  $query = "SELECT * FROM carga WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $booking = $row['booking'];
    $ref_customer = $row['ref_customer'];
    $user = $row['user'];

  } 
}
   setcookie("booking","$booking");
   
?>

<?php include('../fijos/header.php'); ?>

<?php include('../includes/customer/pannel_left_customer.php'); ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php include('../includes/customer/head_view_customer.php'); ?>

    <div class="container">
        <form action="save_cntr.php" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header" style="text-align:center;">
                    <h5 class="box-title">Agregar contendores al booking: <strong><?php echo $booking; ?></strong></h5>
                </div>
                <br>
            <div style="text-align:center; "class="card-body card-bloc">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-sm-2 ">
                        <label >Numero / Referencia:</label>
                        <br>
                        <input type="text" required name="cntr_number" class="form-control">
                    </div>
                    <div class="col-sm-2 ml-2"> 
                        <label>Seal:</label>
                        <br>
                        <input type="text" name="cntr_seal" class="form-control">
                    </div>        
                    <div class="col-sm-2 ml-2">
                        <label>Tipo:</label>
                        <br>
                        <select style="margin-left: 10%;margin-right: 10%;" name="cntr_type[]" id="selectSm" class="form-control-sm form-control">
                            <option value="0">.-Seleccionar Tipo.-</option>     
                            <?php

                                $query_cntr_type = $conn -> query ("SELECT * FROM `cntr_type`");
                                    while ($cntr_type= mysqli_fetch_array($query_cntr_type)) {                                           
                                        echo '<option value="'.$cntr_type['title'].'">'.$cntr_type['title'].'</option>';
                                    }  
                            ?>

                        </select>
                    </div>     
                    <div class="col-sm-2 ml-2">
                        <Label>D.Retiro:</label>
                        <br>
                        <select style="margin-left: 10%;margin-right: 10%;" name="retiro_place[]" id="selectSm" class="form-control-sm form-control">
                            <option value="0">.-Seleccionar Deposito de Retiro.-</option>     
                            <?php
                                $query_retiro_place = $conn -> query ("SELECT * FROM `depositos_de_retiro`");
                                    while ($retiro_place= mysqli_fetch_array($query_retiro_place)) {                                           
                                        echo '<option value="'.$retiro_place['title'].'">'.$retiro_place['title'].'</option>';
                                    }  
                            ?>
                        </select>
                    </div> 
                    <div class="col-sm-2 ml-2">
                        <label>PN:</label>
                        <br>
                        <style>
                            input[type=number]::-webkit-outer-spin-button,

                            input[type=number]::-webkit-inner-spin-button {

                            -webkit-appearance: none;

                        margin: 0;}
                        </style>
                        <input  type="number" name="net_weight" class="form-control">    
                    </div>      
                    <div class="col"></div>
                </div>
                <!-- hr style="width: 50%; margin-top:2rem; margin-bottom: 2rem ;">
                <div style="text-align:center;" class="row form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label>Factura: </label>
                        <input type="file" id="file-input" name="document_invoice" class="form-control-file">
                    </div> 
                    <div class="col-md-4">   
                        <label>Packing </label>
                        <input type="file" id="file-input" name="document_packing" class="form-control-file">
                    </div>  
                    <div class="col-md-2"></div>
                    
                </div-->
                <hr style="width: 50%; margin-top:2rem; margin-bottom: 2rem ;">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-sm-2 ">
                        <label >Tarifa:</label>
                        <br>
                        <input type="number" name="in_usd" class="form-control">
                    </div>
                    <div class="col-sm-2 ml-2"> 
                        <label>Modo de Pago:</label>
                        <br>
                        <select style="margin-left: 10%;margin-right: 10%;" name="modo_pago_in[]" id="selectSm" class="form-control-sm form-control">
                            <option value="0">.-Seleec. Modo Pago.-</option>     
                            <?php
                                        
                                

                                $query_modo_pago_in= $conn -> query ("SELECT * FROM `modos_de_pago`");
                                    while ($modo_pago_in= mysqli_fetch_array($query_modo_pago_in)) {                                           
                                        echo '<option value="'.$modo_pago_in['title'].'">'.$modo_pago_in['title'].'</option>';
                                    }  
                            ?>
                        </select>
                        
                    </div>        
                    <div class="col-sm-2 ml-2">
                        <label>Plazo de Pago:</label>
                        <br>
                        <select style="margin-left: 10%;margin-right: 10%;" name="plazo_de_pago_in[]" id="selectSm" class="form-control-sm form-control">
                            <option value="0">.-Seleec. Plazo de Pago.-</option>     
                            <?php
                                        
                                

                                $query_plazo_de_pago= $conn -> query ("SELECT * FROM `plazos_de_pago`");
                                    while ($plazo_de_pago= mysqli_fetch_array($query_plazo_de_pago)) {                                           
                                        echo '<option value="'.$plazo_de_pago['title'].'">'.$plazo_de_pago['title'].'</option>';
                                    }  
                            ?>
                        </select>
                        
                    </div>
                    <div class="col-md-3"></div>     
                </div>
                <hr style="width: 60%;">
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2"> 
                                <button style="border-radius:10px;" type="submit" name="subir_cntr" class="btn btn-sm btn-info btn-block">
                                    Agregar CNTR
                                </button>
                    </div>
                    <div class="col-sm-5"></div>
                    </div>
                    <br>
                </div>
            </div>
        </form>
    <div>
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                   
                    </div>
                    <div class="card-body">
                        <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Booking</th>
                                        <th>Numero</th>
                                        <th>Tipo</th>
                                        <th>Dep.Retiro.</th>
                                        <th>Lugar de Carga</th>
                                        <th>Puerto de Descarga</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $user = $_SESSION['user'];
    
                                            $query = "SELECT * FROM carga INNER JOIN cntr ON carga.booking = cntr.booking WHERE carga.booking = '$booking'" ;
                                            $result_tasks = mysqli_query($conn, $query);    
    
                                            $query_int = "SELECT * FROM intruction WHERE booking = '$booking'";
                                            $result_int = mysqli_query($conn, $query_int); 
    
                                            if ($result_int >= 0){
    
                                                    $transport = "N/A";
                                                }else{
                                                    $transport = $row['transport'];
                                                }
                                            
                                            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                            <tr>
                                                <td><?php echo $row['id_cntr']; ?></td>
                                                <td><?php echo $row['booking']; ?></td>
                                                <td><?php echo $row['cntr_number']; ?></td>
                                                <td><?php echo $row['cntr_type']; ?></td>
                                                <td><?php echo $row['retiro_place']; ?></td>
                                                <td><?php echo $row['load_place']; ?></td>
                                                <td><?php echo $row['unload_place']; ?></td>
                                                
                                            </tr>
                                            
                                                
                                            <!--Final Modal View CNTR-->
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  <?php include('../fijos/footer.php') ?>