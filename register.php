<?php include("db.php");?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177050642-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177050642-1');
        </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOTzero :: Plataforma Logistica</title>
    <meta name="description" content="Plataforma de Carga">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;600;800&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="images/LogocolorAzul.png" sizes="16x16">
    
    <link rel="apple-touch-icon" href="images/LogocolorAzul.png" sizes="16x16">
    <link rel="shortcut icon" href="images/LogocolorAzul.png" sizes="16x16">
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="dist/notiflix-2.3.1.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">   
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">   
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>
<body  style="background:linear-gradient(to left, #17A589, #2E303E )!important;">
<div class="row">
    <div class="col"></div>
    <div class="col">
    <?php 
        if(isset($_SESSION['message'])){
        if($_SESSION['message'] != false) { ?>
            <div style="margin: 2rem;" class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
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
    </div>
    <div class="col"></div>

    
</div>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                
                <div class="login-form">
                    <form method='POST' action="registerboton.php"> 
                    
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="username" class="form-control" name="username" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="name" class="form-control" name="name" placeholder="Juan" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="name" class="form-control" name="last_name" placeholder="Perez" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="phone" name="celular" class="form-control" placeholder="542612128105" required>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="phone" name="empresa" class="form-control" placeholder="Empresa de Ejemplo SA" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="check"> Acepto los terminos de privacidad
                            </label>
                        </div>                        
                        <button type="submit" name="register" class="btn btn-primary btn-flat m-b-30 m-t-30">Registrarme</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Ya tengo cuenta <a href="index.php">Inciar Sesión</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</div>
</html>
