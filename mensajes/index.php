<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right_header.php'); ?> <!-- estas son las que se modifican -->

<?php include('../includes/user_basic/pannel_left_user_basic.php'); ?>

<?php include('../includes/user_basic/head_view_traffic.php'); ?>

<?php

include "../mensajes/includes/config.php";
include "../mensajes/includes/funciones.php";

if(!isset($_SESSION['user'])) {
	header("Location: ../mensajes/login.php");
}

ini_set('error_reporting',0);
?>
<div class="content">
  <div class="card">
    <div class="card-header"><h3 style="text-align: center;">Correo Internos</h2></div>
  <div class="card-body">
  <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
              <thead style="text-align:center;">
                  <tr>
                      <th style="width:5%;">View</th>
                      <th style="width:20%;">De:</th>
                      <th style="width:50%;">Asunto</th>
                      <th style="width:20%;">Fecha</th>
                      <th style="width:5%;">Accion</th>   
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $session=  $_SESSION['id'];

                  $query = "SELECT * FROM mensajes WHERE `para` = '$session' AND `estado` != 'eliminado' ORDER BY id desc";
                  $result = mysqli_query($conn, $query);

                  while($row=mysqli_fetch_array($result)) {

                    $de= $row['de'];

                    $usuario ="SELECT * FROM usuarios WHERE id = '$de'";
                    $result_user = mysqli_query($conn, $usuario);

                    $user = mysqli_fetch_array($result_user);

                    if ($row['leido'] == 1) { $leido = "<i class='fa fa-dot-circle-o'>"; } else {$leido = "<i  class='fa fa-circle-o'>";}
                ?>

                <tr> 
                  <td style="text-align: center;"><?php echo $leido; ?></td> 
                  <td><?php echo $user['usuario']; ?></td> 
                  <td><a href="../mensajes/mensaje.php?id=<?php echo $row['id']; ?>"> <?php echo $row['titulo']; ?></a></td> 
                  <td><?php echo $row['fecha']; ?></td>
                  <td style="text-align: center;">
                 
                  <a style="margin-right: 5px;" title="Responder" href="../mensajes/nuevo_responder.php?para=<?php echo $user['usuario'] .'&titulo='.$row['titulo'].'&mensaje='.$row['mensaje']; ?>"> <i class="fa  fa-mail-reply"></i> </a>
                  
                  <a style="margin-right: 5px;" title="Ver Mensaje" type="button"  id='leido' data-toggle="modal" data-target="#mensaje<?php echo $row['id']; ?>" >
                    <i class="ti-eye"></i>
                  </a>
                  <a style="margin-right: 5px;" title="Eliminar" href="../mensajes/borrar.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-trash"></i> </a>
                  </td> 
                </tr>
                <div class="modal fade" id="mensaje<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" >
                          
                          <div class="modal-header">
                              Título: <?php echo $row['titulo']; ?>
                          </div>
                          <div class="modal-body">   
                              Mensaje: <?php echo $row['mensaje']; ?>
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
                  <!--Final Modal View CNTR-->
                <?php } ?>
              </tbody>
          </table>
      </div>
    <br>
    <div class="row">
      <div class="col-sm-5"></div>
      <div class="col-sm-2">
        <a type="button" class="btn btn-primary" href="../mensajes/nuevo.php">
                    Nuevo Mensaje
                  </a>
      </div>
      <div class="col-sm-5"></div>
    
    
    </div>
    <br>
    </div>
  </div>

<?php include('../fijos/footer.php'); ?>
