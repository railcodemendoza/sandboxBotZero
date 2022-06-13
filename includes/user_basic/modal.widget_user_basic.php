 <!-- Modal Cargas Activas -->
 <div class="modal fade" id="activas" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>Activas:</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
                 <div class="container">
                     <div class="table-reponsive">
                         <table style="font-size: small; width:100%;" class="table table-striped table-bordered nowrap">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Transporte</th>
                                     <th>Commodity</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>
                                     <th>status</th>
                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_activas)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa']; ?></td>
                                         <td><?php echo $row['main_status'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">

                         <a href="../views/cargas_activas.php" class="btn btn-info"></i>Ver todas (<?php echo  $cantidad_activas; ?>)</a>

                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Sin Asignar -->
 <div class="modal fade" id="sin_asignar" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>Sin Asignar Unidad</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Lugar de Retiro</th>
                                     <th>Lugar de Carga</th>
                                     <th>Commodity</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>
                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_sin_asignar)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['retiro_place']; ?></td>
                                         <td><?php echo $row['load_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_sin_asignar.php" method="post">
                             <button type="submit" id="export_data_sin_asignar" name='export_data_sin_asignar' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                         <div class="col-sm-5"></div>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal On Board -->
 <div class="modal fade" id="on_board" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>OnBoard</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Destino Final</th>
                                     <th>Fecha Arrivo</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_on_board)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['ETD']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_on_board.php" method="post">
                             <button type="submit" id="export_data_on-board" name='export_data_on_board' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Go to con Problema-->
 <div class="modal fade" id="con_problema" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades con <strong>Problemas</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de descarga</th>
                                     <th>Lugar de aduana</th>
                                     <th>Status</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_con_problema)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['custom_place']; ?></td>
                                         <td><?php echo $row['status_cntr']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>

                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_con_problema.php" method="post">
                             <button type="submit" id="export_data_con_problema" name='export_data_con_problema' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                     </div>
                 </div>
                 <div class="col-sm-5"></div>
             </div>

         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Asignadas-->
 <div class="modal fade" id="asignadas" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades con <strong>Asignadas</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de descarga</th>
                                     <th>Lugar de aduana</th>
                                     <th>Status</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_asignadas)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['custom_place']; ?></td>
                                         <td><?php echo $row['status_cntr']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal YENDO A CARGAR-->
 <div class="modal fade" id="go_to_load" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades camino a Cargar</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Lugar de Carga</th>
                                     <th>Commodity</th>
                                     <th>aduana</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_go_to_load)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['load_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['custom_place']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Loading-->
 <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades cargando</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Lugar de Carga</th>
                                     <th>Commodity</th>
                                     <th>Aduana</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_loading)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['load_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['custom_place']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Custom Place-->
 <div class="modal fade" id="custom" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades ingresadas a Aduana</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Aduana</th>
                                     <th>Commodity</th>
                                     <th>Puerto de Carga</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_custom_place)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['custom_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal YENDO A DESCARGAR-->
 <div class="modal fade" id="go_to_unload" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades camino a Descargar.</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Commodity</th>
                                     <th>Destino Final</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_go_to_unload)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal YENDO A DESCARGAR-->
 <div class="modal fade" id="staking" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Unidades ingresadas en staking</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">

                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Commodity</th>
                                     <th>Destino Final</th>
                                     <th>Transporte</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_stacking)) { ?>
                                     <tr>
                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['commodity']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['transport']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>
                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <button class="btn btn-secondary"> <i class="fa fa-download"></i> Report</button>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal On Board -->
 <div class="modal fade" id="lunes" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>lunes</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Destino Final</th>
                                     <th>Fecha Arrivo</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_lunes)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['ETD']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_lunes.php" method="post">
                             <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal On Board -->
 <div class="modal fade" id="martes" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>martes</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Destino Final</th>
                                     <th>Fecha Arrivo</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_martes)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['ETD']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_martes.php" method="post">
                             <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal Miércoles -->
 <div class="modal fade" id="miercoles" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>miercoles</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Destino Final</th>
                                     <th>Fecha Arrivo</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_miercoles)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['ETD']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <div class="row">

                     <div class="col-sm-5"></div>
                     <div class="col-sm-2">
                         <form action="../report_cargas_miercoles.php" method="post">
                             <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                         </form>
                     </div>
                     <div class="col-sm-5"></div>
                 </div>

             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal jueves -->
 <div class="modal fade" id="jueves" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>jueves</strong></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="table-responsive">
                         <table style="font-size: small;" class="table table-striped table-bordered">
                             <thead style="text-align: center;">
                                 <tr>
                                     <th>Booking</th>
                                     <th>Cntr</th>
                                     <th>Puerto de Carga</th>
                                     <th>Destino Final</th>
                                     <th>Fecha Arrivo</th>
                                     <th>Shipper</th>
                                     <th>Cliente</th>

                                 </tr>
                             </thead>
                             <tbody style="text-align: center;">
                                 <?php while ($row = mysqli_fetch_assoc($result_detalles_jueves)) { ?>
                                     <tr>

                                         <td><?php echo $row['booking']; ?></td>
                                         <td><?php echo $row['cntr_number']; ?></td>
                                         <td><?php echo $row['unload_place']; ?></td>
                                         <td><?php echo $row['final_point']; ?></td>
                                         <td><?php echo $row['ETD']; ?></td>
                                         <td><?php echo $row['shipper']; ?></td>
                                         <td><?php echo $row['Empresa'];
                                            } ?></td>


                                     </tr>
                             </tbody>
                         </table>
                     </div>
                     <div class="row">

                         <div class="col-sm-5"></div>
                         <div class="col-sm-2">
                             <form action="../report_cargas_jueves.php" method="post">
                                 <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                             </form>
                         </div>
                         <div class="col-sm-5"></div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!-- fin modal -->
     <!-- Modal viernes -->
     <div class="modal fade" id="vienes" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>viernes</strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="container">
                         <div class="table-responsive">
                             <table style="font-size: small;" class="table table-striped table-bordered">
                                 <thead style="text-align: center;">
                                     <tr>
                                         <th>Booking</th>
                                         <th>Cntr</th>
                                         <th>Puerto de Carga</th>
                                         <th>Destino Final</th>
                                         <th>Fecha Arrivo</th>
                                         <th>Shipper</th>
                                         <th>Cliente</th>

                                     </tr>
                                 </thead>
                                 <tbody style="text-align: center;">
                                     <?php while ($row = mysqli_fetch_assoc($result_detalles_viernes)) { ?>
                                         <tr>

                                             <td><?php echo $row['booking']; ?></td>
                                             <td><?php echo $row['cntr_number']; ?></td>
                                             <td><?php echo $row['unload_place']; ?></td>
                                             <td><?php echo $row['final_point']; ?></td>
                                             <td><?php echo $row['ETD']; ?></td>
                                             <td><?php echo $row['shipper']; ?></td>
                                             <td><?php echo $row['Empresa'];
                                                } ?></td>


                                         </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="row">

                         <div class="col-sm-5"></div>
                         <div class="col-sm-2">
                             <form action="../report_cargas_viernes.php" method="post">
                                 <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                             </form>
                         </div>
                         <div class="col-sm-5"></div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!-- fin modal -->
     <!-- Modal sabado -->
     <div class="modal fade" id="sabado" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Detalle de Cargas <strong>sabado</strong></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="container">
                         <div class="table-responsive">
                             <table style="font-size: small;" class="table table-striped table-bordered">
                                 <thead style="text-align: center;">
                                     <tr>
                                         <th>Booking</th>
                                         <th>Cntr</th>
                                         <th>Puerto de Carga</th>
                                         <th>Destino Final</th>
                                         <th>Fecha Arrivo</th>
                                         <th>Shipper</th>
                                         <th>Cliente</th>

                                     </tr>
                                 </thead>
                                 <tbody style="text-align: center;">
                                     <?php while ($row = mysqli_fetch_assoc($result_detalles_sabado)) { ?>
                                         <tr>

                                             <td><?php echo $row['booking']; ?></td>
                                             <td><?php echo $row['cntr_number']; ?></td>
                                             <td><?php echo $row['unload_place']; ?></td>
                                             <td><?php echo $row['final_point']; ?></td>
                                             <td><?php echo $row['ETD']; ?></td>
                                             <td><?php echo $row['shipper']; ?></td>
                                             <td><?php echo $row['Empresa'];
                                                } ?></td>


                                         </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="row">

                         <div class="col-sm-5"></div>
                         <div class="col-sm-2">
                             <form action="../report_cargas_sabado.php" method="post">
                                 <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info"><i class="fa fa-download"></i> Report</button>
                             </form>
                         </div>
                         <div class="col-sm-5"></div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->