<?php include("../db.php") ?>
<!doctype html>

<html class="no-js" lang="ES"> 
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
    <title>BOT.zero :: Plataforma de Carga</title>
    <meta name="description" content="Plataforma de Carga">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;600;800&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="../images/LogocolorAzul.png" sizes="16x16">
    
    <link rel="apple-touch-icon" href="../images/LogocolorAzul.png" sizes="16x16">
    <link rel="shortcut icon" href="../images/LogocolorAzul.png" sizes="16x16">

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="../dist/notiflix-2.3.1.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">   
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">   
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
<body class="body" style="padding: 0px !important;">

<?php include("../fijos/Pannel_right_header.php") ?>

<?php include("../includes/user_basic/pannel_left_user_basic.php")  ?>
        
<?php include("../includes/user_basic/head_view_user_basic.php") ?>

<?php include("../includes/user_basic/head_view_user_basic_widget.php") ?>

<?php include("../includes/user_basic/view_user_basic_cargas.php") ?>

<?php include("../includes/user_basic/modal.widget_user_ttl.php") ?>

<?php include("../includes/user_basic/tablero_de_comando.php") ?>

<?php include("../includes/user_basic/modal.widget_user_basic.php") ?>



                </div>
            </div><!-- .animated -->
        </div><!-- .content --><!-- /.col-lg-8 -->

<!--?php include("../includes/user_basic/news_user_basic.php") ?-->

<!--?php include("../includes/user_basic/chat_user_basic.php") ?-->  
</div>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="d-flex">
            <div style="text-align:center;" class="col-sm-7 mx-auto">
               
                <hr style="color:black; width:80%;">
                <h6> <small> Tecnología programada por </small><a href="https:/rail.ar" target="_blank">RailCode</a><small> para BOTZero :: Software de Logística.</small> </h6>
            </div>
        </div>
    </div>
</footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/dist/tooltips.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>

    <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
          $("[data-toggle=tooltip]").tooltip(); 
          
        
         
        }); 
      
    </script>
    

  


</body>
</html>
