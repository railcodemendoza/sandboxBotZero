 <!-- Modal Cargas Activas -->
 <div class="modal fade" id="noticias" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" style="text-align:center;" id="smallmodalLabel">Estado de Paso Fronterizos</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
                 <div class="container">
                     <a class="twitter-timeline" data-height="600" data-dnt="true" href="https://twitter.com/BOT_zerolog/lists/estado-del-paso?ref_src=twsrc%5Etfw">A Twitter List by BOT_zerolog</a>
                     <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- fin modal -->
 <!-- Modal clima -->
 <div class="modal fade" id="clima" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document" style="max-width: 90%;">
         <div class="modal-content">
             <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="row">
                         <div class="col-sm-4" style="text-align:center;">
                             <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                             <div class="elfsight-app-40a5a5d8-f1bd-4d90-9899-8a5759794dad"></div>
                         </div>
                         <div class="col-sm-4" style="text-align:center;">
                             <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                             <div class="elfsight-app-f31054ca-b13c-47a3-831f-278a33f54afe"></div>
                         </div>
                         <div class="col-sm-4" style="text-align:center;">
                             <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                             <div class="elfsight-app-1021ed1b-6b18-4a73-a868-9c9ad10ca3ea"></div>
                         </div>
                     </div>
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