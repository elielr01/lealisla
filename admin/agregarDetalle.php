<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("lib/conex.php");
$db= Conectarse();
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
              <a href="home.php">Personas</a>
            </li>
            <li>
              <a href="noticias.php">Noticias</a>
            </li>
            <li>
              <a class="active" href="servicios.php">Servicios</a>
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
                        <div class="form-group">
                            	<?php
								$all_recs = array();
								$sql = "SELECT * FROM servicio where idServicio = ?";
								$q = $db->prepare($sql);
								$q->execute(array($_GET['id']));
								 while ($row = $q->fetch()){
								 	echo "<h4>".$row['servicio']."</h4>";
								}
		                        ?>
		                        <button class="btn_es btn">Español</button>
                              	<button class="btn_en btn"><a href="agregarDetalle_en.php?id=<?php echo $_GET['id']?>">Inglés</a></button>
                              	<br><br>
                            <form id="detalle_servicio" method="POST" action="#">
                                <label for="exampleInputEmail1">Detalle Servicio</label>
                                <input type="text" required class="form-control" id="servicio" name="servicio">
                            	<input type="hidden" id="hdn_id" value="<?php echo $_GET['id'];?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn-block btn btn-success" value="Agregar">
                            </div>
                        </form>
                        <br><br>
                        <div id="servicios_list">
                        <?php
						$all_recs = array();
						$sql = "SELECT * FROM detalleServicio where idServicio = ?";
						$q = $db->prepare($sql);
						$q->execute(array($_GET['id']));
						 while ($row = $q->fetch()){
						 	echo "<div class=list-group-item id=servicio".$row['iddetalleServicio'].">".$row['detalleServicio']."<a data-id=".$row['iddetalleServicio']." class='pull-right delete_list'>X</a></div>";
						}
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->






    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/agregarDetalle.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
