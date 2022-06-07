<?php include('../db.php'); ?>

<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right_header.php'); ?> <!-- estas son las que se modifican -->

<?php include('../includes/super_user/pannel_left_super_user.php'); ?>

<?php include('../includes/super_user/head_view_super_user.php'); ?> <!-- estas son las que se modifican -->

<div class="container">
    <div style="border-radius: 10px; background: #9EA5AA; " class="card border border-secondary">
        <div class="card-header">Estadisticas de Cargas por unidad</div>
        <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">  
        <iframe
            src="http://localhost:3000/public/question/d2cf5b4d-72c5-4b9a-9ef5-ff42a6d05e9d"
            frameborder="0"
            width="1000"
            height="600"
            allowtransparency
        ></iframe>   
                <iframe
            src="http://localhost:3000/public/question/e66fcdd7-45d4-42a7-ad91-fc6beaedb2bd"
            frameborder="0"
            width="1000"
            height="600"
            allowtransparency
        ></iframe>
        
        
        </div>
    </div>        
    <div style="border-radius: 10px; background: #9EA5AA; " class="card border border-secondary">
        <div class="card-header">Estadisticas de Cargas por Profit</div>
        <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">  
        <iframe
            src="http://localhost:3000/public/question/d84cb837-421e-4141-9b7c-508d49b4a095"
            frameborder="0"
            width="800"
            height="600"
            allowtransparency
        ></iframe>
                <iframe
            src="http://localhost:3000/public/question/e66fcdd7-45d4-42a7-ad91-fc6beaedb2bd"
            frameborder="0"
            width="1000"
            height="600"
            allowtransparency
        ></iframe>
        
        
        </div>
    </div>    
</div>                                 

<?php include('../fijos/footer.php'); ?>

