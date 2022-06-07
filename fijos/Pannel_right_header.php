    <!-- Right Panel -->

    <?php 

    $usuario = $_SESSION['user'];  
    $permiso = $_SESSION['permiso'];

    if($permiso == 'Customer'){
        $direct = '.php';
    }else{
        $direct = '_user_basic.php';
    }
    
    ?>

    <div  id="right-panel" class="right-panel">

        <!-- Header-->
        <header style="border-block-end: inherit;" id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand"  href="#"><img src="../images/piotterHorizontalBlanco.png" style="width:auto; height: 36px; margin-left: 15%;" alt="Logo"></a>
                    <a  id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!--button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div-->
                        <div class="dropdown for-notification">
                            <?php 
                                $query = "SELECT count(id) FROM `notification` WHERE user_to = '$usuario' AND status = 'No Leido' AND sta_carga = 'CON PROBLEMA'";
                                $result_count_notif= mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result_count_notif) == 1) {
                                        $row = mysqli_fetch_array($result_count_notif);
                                        $cantidad_problema = $row['count(id)'];}
                            ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-minus-circle"></i>
                                <span class="count bg-primary"><?php echo $cantidad_problema;?></span>
                            </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="red"><?php echo $cantidad_problema;?> Cargas con Problema.</p>

                                    <?php
                                    $empresa = $_SESSION['company'];
                                    $query = "SELECT carga.id, notification.title, notification.description ,notification.user_create ,notification.user_to, notification.Created_at, notification.status, notification.sta_carga, notification.cntr_number, notification.booking FROM `notification` INNER JOIN carga INNER JOIN cntr ON notification.booking = carga.booking AND notification.cntr_number = cntr.cntr_number WHERE notification.user_to = '$usuario' AND notification.status = 'No Leido' AND notification.sta_carga = 'CON PROBLEMA'";
                                    $result_notification = mysqli_query($conn, $query);                        
                                    while($row = mysqli_fetch_assoc($result_notification)) {
                                    
                                        $id_pro =$row['id']; 
                                        $title_pro = $row['title'];
                                        $description_pro =$row['description']; 
                                        $Created_at_pro =$row['Created_at']; 
                                        $user_create_pro = $row['user_create'];
                                        $cntr_number_pro = $row['cntr_number'];
                                        $booking_pro = $row['booking'];                                    
                                        ?>

                                    <a class="dropdown-item media" href="../marcar_leido.php?id=<?php echo $id_pro; ?>&cntr_number=<?php echo $cntr_number_pro; ?>&booking=<?php echo $booking_pro; ?>">
                                        <i class="fa fa-check"></i>
                                        <p><?php echo $title_pro; ?> </p> 
                                    </a>
                                    <?php } ?> 
                                    

                                    <!--a class="dropdown-item media" href="#">
                                        <i class="fa fa-info"></i>
                                        <p>Server #2 overloaded.</p>
                                    </a>
                                    <a class="dropdown-item media" href="#">
                                        <i class="fa fa-warning"></i>
                                        <p>Server #3 overloaded.</p>
                                    </a-->
                                </div>
                        </div>
                        <div class="dropdown for-notification">
                            <?php 
                                $query = "SELECT count(id) FROM `notification` WHERE user_to = '$usuario' AND status = 'No Leido' AND sta_carga = 'TERMINADA'";
                                $result_count_notif= mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result_count_notif) == 1) {
                                        $row = mysqli_fetch_array($result_count_notif);
                                        $cantidad_terminada = $row['count(id)'];}

                            ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-primary"><?php echo $cantidad_terminada;?></span>
                            </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="red"><?php echo $cantidad_terminada;?> Cargas Terminadas.</p>

                                    <?php
                                    $empresa = $_SESSION['company'];
                                    $query = "SELECT * FROM `notification` WHERE user_to = '$usuario' AND status = 'No Leido' AND sta_carga = 'TERMINADA'";
                                    $result_notification = mysqli_query($conn, $query);                        
                                    while($row = mysqli_fetch_assoc($result_notification)) {
                                    
                                        $id_ter =$row['id']; 
                                        $title_ter = $row['title'];
                                        $description_ter =$row['description']; 
                                        $Created_at_ter =$row['Created_at']; 
                                        $user_create_ter = $row['user_create'];
                                        $cntr_number_ter = $row['cntr_number'];
                                        $booking_ter = $row['booking'];                                    
                                        ?>

                                    <a class="dropdown-item media" href="../satisfaccion/satisfaccion_carga.php?cntr_number=<?php echo $cntr_number_ter;?>&booking=<?php echo $booking_ter;?>">
                                        <i class="fa fa-check"></i>
                                        <p><?php echo $title_ter; ?> </p> 
                                    </a>
                                    <?php } ?> 
                                    

                                    <!--a class="dropdown-item media" href="#">
                                        <i class="fa fa-info"></i>
                                        <p>Server #2 overloaded.</p>
                                    </a>
                                    <a class="dropdown-item media" href="#">
                                        <i class="fa fa-warning"></i>
                                        <p>Server #3 overloaded.</p>
                                    </a-->
                                </div>
                        </div>
                        <div class="dropdown for-notification">
                            <?php 
                                $query = "SELECT count(id) FROM `notification` WHERE user_to = '$usuario' AND status = 'No Leido' AND sta_carga = 'ASIGNADA'";
                                $result_count_notif= mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result_count_notif) == 1) {
                                        $row = mysqli_fetch_array($result_count_notif);
                                        $cantidad_asignada = $row['count(id)'];}


                            ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="´flase" aria-expanded="true">
                                <i class="fa fa-hand-o-up"></i>
                                <span class="count bg-primary"><?php echo $cantidad_asignada;?></span>
                            </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="red"><?php echo $cantidad_asignada;?> Cargas Asignadas.</p>

                                    <?php
                                    $empresa = $_SESSION['company'];
                                    $query = "SELECT carga.id, notification.title, notification.user_to,notification.description,notification.user_create, notification.Created_at, notification.status, notification.sta_carga, notification.cntr_number, notification.booking FROM `notification` INNER JOIN carga INNER JOIN cntr ON notification.booking = carga.booking AND notification.cntr_number = cntr.cntr_number WHERE notification.user_to = '$usuario' AND notification.status = 'No Leido' AND notification.sta_carga = 'ASIGNADA'";
                                    $result_notification = mysqli_query($conn, $query);                        
                                    while($row = mysqli_fetch_assoc($result_notification)) {
                                    
                                        $id_as =$row['id']; 
                                        $title_as = $row['title'];
                                        $description_as =$row['description']; 
                                        $Created_at_as =$row['Created_at']; 
                                        $user_create_as = $row['user_create'];
                                        $cntr_number_as = $row['cntr_number'];
                                        $booking_as = $row['booking'];                                    
                                        ?>

                                    <a class="dropdown-item media" href="../marcar_leido_as.php?id=<?php echo $id_as; ?>&cntr_number=<?php echo $cntr_number_as; ?>&booking=<?php echo $booking_as; ?>">
                                        <i class="fa fa-check"></i>
                                        <p><?php echo $title_as; ?> </p> 
                                    </a>
                                    <?php } ?> 
                                    

                                    <!--a class="dropdown-item media" href="#">
                                        <i class="fa fa-info"></i>
                                        <p>Server #2 overloaded.</p>
                                    </a>
                                    <a class="dropdown-item media" href="#">
                                        <i class="fa fa-warning"></i>
                                        <p>Server #3 overloaded.</p>
                                    </a-->
                                </div>
                        </div>
                                   
                        <div class="dropdown for-message">
                        <?php 
                            $idmsj = $_SESSION['id'];

                                $query_msj = "SELECT count(id) FROM `mensajes` WHERE para = '$idmsj' AND leido = '0' AND estado = 'normal'";
                                $result_count_msj= mysqli_query($conn, $query_msj);
                                    if (mysqli_num_rows($result_count_msj) == 1) {
                                        $row = mysqli_fetch_array($result_count_msj);
                                        $cantidad_msj = $row['count(id)'];}
                            ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary"><?php echo $cantidad_msj;?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <a  href="../mensajes/index.php"><p class="red">You have <?php echo $cantidad_msj;?> Mails</p> </a>
                                <?php
                                    $query_mensaje = "SELECT * FROM `mensajes` INNER JOIN `usuarios` ON mensajes.para = usuarios.id WHERE `para` = '$idmsj' AND `leido` = '0' AND `estado` = 'normal'";
                                    $result_mensaje = mysqli_query($conn, $query_mensaje);                        
                                    while($row = mysqli_fetch_assoc($result_mensaje)) {
                                    
                                        $id_msj =$row['id']; 
                                        $titulo_msj = $row['titulo'];
                                        $mensaje_msj =$row['mensaje']; 
                                        $de_msj = $row['usuario']; 
                                        $fecha_msj = $row['fecha'];
                                        $imagen_msj = $row['avatar'];
                                                                         
                                        ?>
                                <a class="dropdown-item media" href="../mensajes/index.php">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <h5 class="name float-left"><?php echo $de_msj;?></h5>
                                        <h6 class="time float-left"><?php echo $fecha_msj;?></h6>
                                        <p><?php echo $titulo_msj;?></p>
                                    </div>
                                </a>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a  style="text-transform: capitalize; color: white; Baloo Tamma 2', cursive;" href="#"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            user: <?php echo " ". $usuario;?>
                        </a>
                       

                        <div class="user-menu dropdown-menu">   
                            <a class="nav-link" href="../views/misDatos<?php echo $direct;?>"><i class="fa fa-user"></i>My Profile</a>                                

                            <a class="nav-link" href="../salir.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>            
        </header>
        <header style="background: transparent; margin:3% 20% 2% 35%; border-block-end: inherit; "id="header" class="header">
            <?php 
                if(isset($_SESSION['message'])){
                if($_SESSION['message'] != false) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message'] ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php  
                }
            }
                $_SESSION['message_type'] = false;
                $_SESSION['message'] = false;
                
            ?>
        </header>
                            
        

                                <!-- /header -->
        <!-- Header-->