<?php include('../fijos/header.php');?>
<body>
<div class="container">
<p>Empleado 1</p>

<a data-toggle="modal" data-id="666666666" title="Add this item" class="open-Modal btn btn-primary" href="#myModalDialog">test</a>
 
<p>Empleado 2</p>
<a data-toggle="modal" data-id="777777777" title="Add this item" class="open-Modal btn btn-primary" href="#myModalDialog">test</a>
</div>

<div class="modal hide" id="myModalDialog">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
<h3>Modal header</h3>
</div>
<div class="modal-body">
<p>some content</p>
<input type="text" name="DNI" id="DNI" value=""/>
</div>
</div>
<script>
    
$(document).on("click", ".open-Modal", function () {
var myDNI = $(this).data('id');
$(".modal-body #DNI").val( myDNI );
});
    
</script>

<script src="/assets/js/bootstrap-modal.js"></script>
</body>
</html> 