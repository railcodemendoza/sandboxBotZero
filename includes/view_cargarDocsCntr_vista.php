<?php


$id = $_GET['id'];

$query_cntr = "SELECT id_cntr,cntr_number,booking FROM cntr where id_cntr = 1";
$datos_cntr = mysqli_query($conn, $query_cntr);

if (mysqli_num_rows($datos_cntr) == 1) {
    $row = mysqli_fetch_array($datos_cntr);

    $booking = $row['booking'];
    $cntr = $row['cntr_number'];
    $id = $row['id_cntr'];
}
?>
<style>
    .dropzone {
        border-radius: 17px;
        border-style: dashed;
        color: #9EA5AA;
    }
</style>
<div class="container mt-2">
    <div style="border-radius: 10px;margin: 5rem 0rem 2rem 0rem; " class="card border-secondary">
        <div class="card-header text-center">
            <h4 class="box-title">Agregar Documento al CNTR <?php echo $cntr; ?></h4>
        </div>
        <div style="background: white;padding: 3% 7% 7% 7%; border-radius: 7px;" class="card-body">
            <div class="col-sm-8 mx-auto">
                <form action="http://127.0.0.1:8000/api/docs/<?php echo $booking; ?>" class="dropzone" id="my-awesome-dropzone">
                    <div class="dz-message" data-dz-message>
                        <h3><span>Arrastrar los Archivos o hacer Click Aquí</span></h3>
                    </div>

                    <input type="hidden" name="cntr" id="cntr" value="<?php echo $cntr; ?>">
                    <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
                </form>
                <div class="row mt-3 mb-3">
                    <div class="col-sm-5 mx-auto text-center">
                        <button type="button" onclick="window.location.reload();" class="btn btn-primary btn-lg mx-auto">Cargar</button>
                    </div>
                </div>
            </div>
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align:center;">
                    <tr>
                        <th>Documento</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="data"></tbody>
            </table>
            <div id="datas"></div>
        </div>
    </div>
</div>

<script>
    <?php
    echo "var booking ='$booking';";
    ?>
    <?php
    echo "var cntr ='$cntr';";
    ?>
    <?php
    echo "var user ='$user';";
    ?> <?php
        echo "var idCntr ='$id';";
        ?>

    let url = 'http://127.0.0.1:8000/api/docsCntr/' + booking + '/' + user + '/' + cntr;
    console.log(url);
    fetch(url)
        .then(response => response.json())
        .then(data => mostrarData(data))
        .catch(error => console.log(error))

    const mostrarData = (data) => {
        console.log(data)
        let body = ''
        if (data.length == 0) {
            body += `<h3 class="text-center text-secondary">No hay archivos aun.</h3>`
            document.getElementById('datas').innerHTML = body

        } else {
            for (let i = 0; i < data.length; i++) {

                body += `<tr>
                            <td style="width:40%">${data[i].name}</td>
                            <td>${data[i].user}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" >
                                    <a class="btn btn-primary mr-2" href="http://127.0.0.1:8000/storage/${data[i].booking}/${data[i].cntr}/${data[i].doc}" download target="_blank">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <form action="http://127.0.0.1:8000/api/docsDel" method="PUT" class="p-0 ml-1 mb-0">
                                        <input type="hidden" name="link" id="link" value="http://localhost:8880/sandboxbotzero/includes/view_cargarDocsCntr.php?id=${idCntr}">
                                        <input type="hidden" name="id" value="${data[i].id}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>`
            }
            document.getElementById('data').innerHTML = body
        }
    }
</script>
<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        addRemoveLinks: true,
        success: function(file, response) {

        },
        error: function(file, response) {
            return false;
        }
    };
</script>