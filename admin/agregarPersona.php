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
                        <form method="POST" enctype="multipart/form-data" action="lib/guardarEmpleado.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre Completo</label>
                                <input type="text" required class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipo</label>
                                <select name="tipo" required class="form-control">
                                    <option value="1">Socio</option>
                                    <option value="2">Asociado</option>
                                    <option value="3">Consultor externo</option>
                                    <option value="4">Asociado Junior</option>
                                    <option value="5">Pasante</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" required class="form-control" name="email">
                            </div>
                            <label for="exampleInputEmail1">Foto Página Miembros</label>
                            <div class="form-group">
                            	<input type="file" required name="foto_miembros" accept="image/jpg, image/jpeg, image/png">
                            </div>
                            <label for="exampleInputEmail1">Foto CV</label>
                            <div class="form-group">
                            	<input type="file" required name="foto_cv" accept="image/jpg, image/jpeg, image/png">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn-block btn btn-success" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->






    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/cropbox-min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
