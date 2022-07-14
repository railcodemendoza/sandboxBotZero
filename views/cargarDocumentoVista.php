<div class="container">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            <h1 class="text-primary"> Cargar Documentación de la Carga <br><?php echo $_GET['booking']; ?></h1>
        </div>

        <form action="https://botzero.ar/api/docsAta/<?php echo $_GET['booking'] ?>" class="dropzone" id="my-awesome-dropzone">
            <div class="dz-message" data-dz-message>
                <h2><span>Arrastrar los Archivos o hacer Click Aquí</span></h2>
            </div>
            <input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
        </form>
        <div class="row">
            <div class="col-sm-5 mx-auto text-center">
                <button type="button" onclick="window.location.reload();" class="btn btn-primary btn-lg mx-auto">Cargar</button>
            </div>
        </div>
        <br>
        <div class="container" style="width: -webkit-fill-available;">
            <div class="card">
                <div class="card-header text-center">Documentos Cargados</div>
                <div class="card-body">
                    <table class="table table-striped">
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
    </div>
</div>
<script>
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var booking = urlParams.get('booking');
    <?php
    echo "var user ='$usuario';";
    ?>
    //Verificar si existe el parámetro

    let url = 'https://botzero.ar/api/docsAtaReed/' + booking + '/' + user;

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
                        <td>
                            <div class="btn-group" role="group" style="width: -webkit-fill-available;">
                                <a class="btn btn-primary mr-2" href="https://botzero.ar/storage/${data[i].booking}/${data[i].doc}" download target="_blank">
                                    <i class="fa fa-download"></i>
                                </a>
                                <form action="https://botzero.ar/api/docsDel" method="PUT" class="p-0 ml-1 mb-0">
                                    <input type="hidden" name="link" id="link" value="https://botzero.tech/sandboxbotzero/views/cargarDocumentos.php?booking=${data[i].booking}">
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