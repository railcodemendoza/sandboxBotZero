<?php

include("../db.php"); // aca me traigo la base de datos. 

if  (isset($_GET['id_cntr'])) {   // me traigo la informacion segun ID seleccionada. 
  $id = $_GET['id_cntr'];
  $query = "SELECT * FROM cntr WHERE id_cntr = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $booking = $row['booking'];
    $cntr_number = $row['cntr_number'];
    $cntr_seal = $row['cntr_seal'];
    $cntr_type = $row['cntr_type'];
    $net_weight = $row['net_weight'];
    $retiro_place = $row['retiro_place'];
    $user_cntr = $row ['user_cntr'];
    $document_invoice = $row ['document_invoice'];
    $document_packing = $row ['document_packing'];
    $in_usd	= $row ['in_usd'];
    $modo_pago_in = $row ['modo_pago_in'];
    $plazo_de_pago_in = $row ['plazo_de_pago_in'];  
}

setcookie("booking",$booking);

   
?>

<?php include('../fijos/headerdirect.php'); ?>

<?php include('../includes/customer/pannel_left_customer.php'); ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php include('../includes/customer/head_view_customer.php'); ?>

<div class="container">
        <form action="edit_cntr.php?id_cntr=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header" style="text-align:center;">
                    <h5 class="box-title">Agregar contendores al booking: <strong><?php echo $booking; ?></strong></h5>
                </div>
                <br>
            <div style="text-align:center; "class="card-body card-bloc">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-sm-2 ">
                        <label >Numero:</label>
                        <br>
                        <input value="<?php echo $cntr_number; ?>" type="text" name="cntr_number" class="form-control">
                    </div>
                    <div class="col-sm-2 ml-2"> 
                        <label>Seal:</label>
                        <br>
                        <input value="<?php echo $cntr_seal; ?>" type="text" name="cntr_seal" class="form-control">
                    </div>        
                    <div class="col-sm-2 ml-2">
                        <label>Tipo:</label>
                        <br>
                        <select style="margin-left: 10%;margin-right: 10%;" name="cntr_type[]" id="selectSm" class="form-control-sm form-control">
                            <option value="<?php echo $cntr_type; ?>"><?php echo $cntr_type; ?></option>     
                            <?php
                                        
                                

                                $query_cntr_type = $conn -> query ("SELECT * FROM `cntr_type`");
                                    while ($cntr_type= mysqli_fetch_array($query_cntr_type)) {                                           
                                        echo '<option value="'.$cntr_type['title'].'">'.$cntr_type['title'].'</option>';
                                    }  
                            ?>
                                </select>
                                <p><?php echo $cntr_type; ?></p>
                    </div>     
                    <div class="col-sm-2 ml-2">
                        <Label>D.Retiro:</label>
                        <br>
                        
                        <select style="margin-left: 10%;margin-right: 10%;" name="retiro_place[]" id="selectSm" class="form-control-sm form-control">
                            <option value="<?php echo $retiro_place; ?>"><?php echo $retiro_place; ?></option>     
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
                        <input type="text" value="<?php echo $net_weight ; ?>" name="net_weight" class="form-control">    
                    </div>      
                    <div class="col"></div>
                </div>
                <hr style="width: 50%; margin-top:2rem; margin-bottom: 2rem ;">
                <div style="text-align:center;" class="row form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label>Factura: </label>
                        <input type="file" id="file-input" name="document_invoice" class="form-control-file">
                        <p><?php echo $document_invoice; ?></p>
                    </div> 
                    <div class="col-md-4">   
                        <label>Packing </label>
                        <input type="file" id="file-input" name="document_packing" class="form-control-file">
                        <p><?php echo $document_packing; ?></p>
                    </div>  
                    <div class="col-md-2"></div>
                    
                </div>
                <hr style="width: 50%; margin-top:2rem; margin-bottom: 2rem ;">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-sm-2 ">
                        <label >Tarifa:</label>
                        <br>
                        <input type="number" value="<?php echo $in_usd ?>" name="in_usd" class="form-control">
                    </div>
                    <div class="col-sm-2 ml-2"> 
                        <label>Modo de Pago:</label>
                        <br>
                        
                        <select style="margin-left: 10%;margin-right: 10%;" name="modo_pago_in[]" id="selectSm" class="form-control-sm form-control">
                            <option value="<?php echo $modo_pago_in ?>"><?php echo $modo_pago_in ?></option>     
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
                            <option value="<?php echo $plazo_de_pago_in ?>"><?php echo $plazo_de_pago_in ?></option>     
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
                                <button style="border-radius:10px;" type="submit" name="edit_cntr" class="btn btn-sm btn-info btn-block">
                                    editar CNTR
                                </button>
                    </div>
                    <div class="col-sm-5"></div>
                    </div>
                    <br>
                </div>
            </div>
        </form>
    <div>
    
    </div>
    
  <?php 
  }
  include('../fijos/footerdirect.php'); ?>
  