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
          <a href="noticias.php">Noticias</a>
        </li>
        <li>
          <a href="servicios.php">Servicios</a>
        </li>
        <li>
          <a class="active" href="aviso.php">Aviso de Privacidad</a>
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
            <br><br>
            <div class="col-md-6">
              <form id="aviso_es_add" method="POST" action="#">
              <p>Aviso Privacidad Español</p>
              <textarea required class="form-control" name="aviso" id="aviso" rows="25"></textarea>
              <br>
              <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
            <div class="col-md-6">
              <form id="aviso_en_add" method="POST" action="#">
              <p>Aviso Privacidad Inglés</p>
              <textarea required class="form-control" name="aviso_en" id="aviso_en" rows="25"></textarea>
              <br>
              <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->





  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/aviso.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
