<?php include("../db.php"); ?>

<?php include('../fijos/header.php'); ?>

<?php include("../includes/customer/pannel_left_customer.php") ?>

<?php include('../fijos/Pannel_right_header.php'); ?>

<?php

$cntr_number = $_GET['cntr_number'];
$booking = $_GET['booking'];
    
?>

<br>
<div class="container">
    <div  class="card">
        <div style="text-align:center;"  class="card-header">
           Encuesta de Satisfaccion de Carga
        </div>
        <div class="card-body card-block">
        <form style="margin: 0% 20%;"action="../satisfaccion/enviar_encuesta.php" method="POST">
            <p style="text-align: center; color:#28939e">Esta encuesta ayuda a que mejoremos nuestro servicio, te pedimos que la reaices a conciencia y seas 100% sincero. </p>
            <br>
            <h3 style="text-align: center;">Como calificarías el Servicio de esta Carga. </h3>
            <br>
            <div class="row form-group">
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Malo</label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio1" name="calificacion_carga" value="1" class="form-check-input">1
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio2" name="calificacion_carga" value="2" class="form-check-input">2
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio3" name="calificacion_carga" value="3" class="form-check-input">3
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio4" name="calificacion_carga" value="4" class="form-check-input">4
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio5" name="calificacion_carga" value="5" class="form-check-input">5
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio6" name="calificacion_carga" value="6" class="form-check-input">6
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio7" name="calificacion_carga" value="7" class="form-check-input">7
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio8" name="calificacion_carga" value="8" class="form-check-input">8
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio9" name="calificacion_carga" value="9" class="form-check-input">9
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio10" name="calificacion_carga" value="10" class="form-check-input">10
                  </label>
                </div>
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Bueno</label>
                </div>
              </div>
              <br>
            <h3 style="text-align: center;">Como calificarías el Transporte. </h3>
            <br>
            <div class="row form-group">
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Malo</label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio1" name="calification_transport" value="1" class="form-check-input">1
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio2" name="calification_transport" value="2" class="form-check-input">2
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio3" name="calification_transport" value="3" class="form-check-input">3
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio4" name="calification_transport" value="4" class="form-check-input">4
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio5" name="calification_transport" value="5" class="form-check-input">5
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio6" name="calification_transport" value="6" class="form-check-input">6
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio7" name="calification_transport" value="7" class="form-check-input">7
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio8" name="calification_transport" value="8" class="form-check-input">8
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio9" name="calification_transport" value="9" class="form-check-input">9
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio10" name="calification_transport" value="10" class="form-check-input">10
                  </label>
                </div>
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Bueno</label>
                </div>
              </div>
              <h3 style="text-align: center;">Como calificarías al Chofer. </h3>
            <br>
            <div class="row form-group">
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Malo</label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio1" name="calification_driver" value="1" class="form-check-input">1
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio2" name="calification_driver" value="2" class="form-check-input">2
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio3" name="calification_driver" value="3" class="form-check-input">3
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio4" name="calification_driver" value="4" class="form-check-input">4
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio5" name="calification_driver" value="5" class="form-check-input">5
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio6" name="calification_driver" value="6" class="form-check-input">6
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio7" name="calification_driver" value="7" class="form-check-input">7
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio8" name="calification_driver" value="8" class="form-check-input">8
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio9" name="calification_driver" value="9" class="form-check-input">9
                  </label>
                </div>
                <div class="col col-md-1">
                  <label style="width: 100%;" for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio10" name="calification_driver" value="10" class="form-check-input">10
                  </label>
                </div>
                <div class="col col-md-1">
                  <label class=" form-control-label">Muy Bueno</label>
                </div>
              </div>
              
              <h3 style="text-align: center;">Algun Comentario o Sugerencia</h3>
            <br>
            <div class="row form-group">
                <div class="col col-md-1">
                </div>
                <div class="col col-md-10">
                <textarea name="feedback_customer" id="" cols="70" rows="10">Comentario...

                </textarea>
                </div>
                <div class="col col-md-1">
                  
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <input type="hidden" name="cntr_number" value="<?php echo $cntr_number; ?>">
                  <input type="hidden" name="booking" value="<?php echo $booking; ?>">
                </div>
                <div class="col-sm-2">
                  <button type="submit" type="submit" name="calificar" class="btn btn-primary">  Enviar

                  </button>
                </div>
                <div class="col-sm-5"></div>

              </div>

        </form>
        </div>   
               
    </div>
</div>


            