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
    <link href="../css/multiselect.css" rel="stylesheet">
    <link src="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

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
              <a href="#">
                Leal Isla & Horváth
              </a>
            </li>
            <li>
              <a href="home.php">Personas</a>
            </li>
            <li>
              <a class="active" href="noticias.php">Noticias</a>
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
                <button class="move-down pull-right btn btn-success" data-target="#agregarNoticia" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Agregar noticia</button>
                <br><br><br><br>
                <table id="table_noticias" class="table custab" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Título Español</th>
                      <th>Resumen Español</th>
                      <th>Título Inglés</th>
                      <th>Resumen Inglés</th>
                      <th>Fecha publicación</th>
                      <th>Archivo</th>
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

    <!-- Modal -->
    <div class="modal fade" id="agregarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agregar Noticia</h4>
          </div>
          <form method="POST" action="lib/guardarNoticia.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="titulo">Título Español</label>
                <input required type="text" class="form-control" name="titulo" id="titulo">
              </div>
              <div class="form-group">
                <label for="resumen" >Resumen Español</label>
                  <textarea required class="form-control" name="resumen" id="resumen" rows="8"></textarea>
              </div>
              <hr>
              <div class="form-group">
                <label for="titulo_en">Título Inglés</label>
                <input required type="text" class="form-control" name="titulo_en" id="titulo_en">
              </div>
              <div class="form-group">
                <label for="resumen" >Resumen Inglés</label>
                <textarea required class="form-control" name="resumen_en" id="resumen_en" rows="8"></textarea>
              </div>
              <hr>
              <div class="form-group">
                <select id="tags_search" name="tags[]" class="form-control" multiple="multiple">
                </select>
              </div>
              <div class="form-group">
                <label for="archivo">Archivo</label>
                <input required type="file" accept="application/pdf" name="archivo" id="archivo">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Editar Noticia</h4>
          </div>
          <form id="editar_noticia_form" method="POST" action="#">
            <div class="modal-body">
              <div class="form-group">
                <label for="titulo">Título Español</label>
                <input required type="text" class="form-control" name="titulo" id="editar_titulo">
              </div>
              <div class="form-group">
                <label for="resumen" >Resumen Español</label>
                <textarea required class="form-control" name="resumen" id="editar_resumen" rows="8"></textarea>
              </div>
              <hr>
              <div class="form-group">
                <label for="titulo_en">Título Inglés</label>
                <input required type="text" class="form-control" name="titulo_en" id="editar_titulo_en">
              </div>
              <div class="form-group">
                <label for="resumen_en" >Resumen Inglés</label>
                <textarea required class="form-control" name="resumen_en" id="editar_resumen_en" rows="8"></textarea>
              </div>
                <select id="edit_tags" name="tags[]" class="form-control" multiple="multiple">
                </select>
            </div>
            <input id="hdn_noticia" name="hdn_noticia" type="hidden">
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/noticias.js"></script>
     <script src="../js/multiselect.js"></script>
    <script>
    $(function() {

      $.ajax({
        type:'GET',
        dataType: 'json',
        url:'lib/obtenerTags.php',
        success: function(data) {
          for (var i = 0; i < data.length; i++) {
            $('#tags_search').append("<option value="+data[i].id+">"+data[i].tag+"</option>");
          };
          $('#tags_search').multiselect();
        }
      });


    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
