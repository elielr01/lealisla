<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li class="sidebar-brand">
              <a  href="#">
                Leal Isla & Horváth
              </a>
            </li>
            <li>
              <a class="active" href="home.php">Personas</a>
            </li>
            <li>
              <a href="noticias.php">Noticias</a>
            </li>
            <li>
              <a href="servicios.php">Servicios</a>
            </li>
            <li>
              <a href="aviso.php">Aviso de Privacidad</a>
            </li>
            <li>
              <a href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <button class="move-down pull-right btn btn-success" onclick="agregar_empleado()"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                        <br>
                        <br>
                        <br>
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->


    <div id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 id="nombre_empleado" class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p id="cv_empleado"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="agregar_empleado">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Agregar Persona</h4>
          </div>
          <div class="modal-body">

            <form method="POST" enctype="multipart/form-data" action="lib/guardarEmpleado.php">
                
                <div class="container">
                    <input type="file" name="foto" class="hidden" id="uploadFile"/>
                    <div style="margin-left:-15px" class="button" id="uploadTrigger"><i class="glyphicon glyphicon-pencil"></i> Subir Foto</div>
                    <div id="image_tools" style="margin-left:-15px;display:none">
                        <div class="imageBox">
                            <div class="thumbBox"></div>
                            <div class="spinner" style="display: none">Loading...</div>
                        </div>
                        <div class="action">
                            <input type="button" class="btn btn-default" id="btnCrop" value="Crop">
                            <input type="button" class="btn btn-default" id="btnZoomIn" value="+">
                            <input type="button" class="btn btn-default" id="btnZoomOut" value="-">
                        </div>
                        <div class="cropped">
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" value="" id="cropped_hdn" name="cropped_hdn">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <select class="form-control">
                        <option value="1">Socio</option>
                        <option value="2">Asociado</option>
                        <option value="3">Consultor externo</option>
                        <option value="4">Pasante</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-block btn btn-success" value="Guardar">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/cropbox-min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    var empleados;
    $.ajax({
        type:'GET',
        dataType: 'json',
        url:'lib/empleados.php',
        success: function(data) {
            if(data.length >0 ) {
                empleados = data;
                for (var i = 0; i < data.length; i++) {
                    $("tbody").append("<tr id=persona"+data[i].id+">"+
                                        "<td><img width=70 src=uploads/"+data[i].foto+"></td>"+
                                        "<td>"+data[i].nombre+"</td>"+
                                        "<td>"+data[i].tipo+"</td>"+
                                        "<td class=text-center><a class='btn btn-info btn-xs' data-toggle=modal href=cv.php?id="+data[i].id+"><span class='glyphicon glyphicon glyphicon-list-alt'></span> CV Español</a> "+
                                        "<a class='btn btn-info btn-xs' data-toggle=modal href=cv_en.php?id="+data[i].id+"><span class='glyphicon glyphicon glyphicon-list-alt'></span> CV Inglés</a> "+
                                        "<a class='btn btn-info btn-xs' data-toggle=modal href=editarPersona.php?id="+data[i].id+"><span class='glyphicon glyphicon-edit'></span> Editar Persona</a> "+
                                        "<a href=# class='btn btn-danger btn-xs' onclick=borrar("+data[i].id+")><span class='glyphicon glyphicon-remove'></span> Borrar</a></td>"+
                                        "</tr>"
                                     );
                };
            }
        }
    });


    function agregar_empleado() {
        window.location.href="agregarPersona.php";
    }

    function borrar(id){
        if (confirm('¿Deseas borrar la información de esta persona?'))
        {   
           $.ajax({
                type:'POST',
                dataType: 'json',
                url:'lib/borrarEmpleado.php',
                data: { id:id },
                success: function(data) {
                    if(data[0].data == true)
                    {
                        $("#persona"+id).remove();
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        } 
    }
    </script>

</body>

</html>
