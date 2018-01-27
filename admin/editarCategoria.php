<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("lib/conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM servicio where idServicio = ?";
$q = $db->prepare($sql);
$q->execute(array($_GET['id']));
 while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'       => $row['idServicio'],
    'servicio'   => $row['servicio'],
    'foto'     => $row['foto'],
    'servicioEn'    => $row['servicioEn']
  );
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
                        <form method="POST" enctype="multipart/form-data" action="lib/editarServicios.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categoría Español</label>
                                <input type="text" value="<?php echo $all_recs[0]['servicio']?>" class="form-control" name="servicio">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categoría Inglés</label>
                                <input type="text" value="<?php echo $all_recs[0]['servicioEn']?>" class="form-control" name="servicio_en">
                            </div>

                            <input type="hidden" name="hdn_foto" value="<?php echo $all_recs[0]['foto']?>">
                            <input type="hidden" name="hdn_id" value="<?php echo $_GET['id']?>">

                            <label for="exampleInputEmail1">Foto</label><br>
                            <div id="image1" style="width:200px;height:175px;background:url(uploads/<?php echo $all_recs[0]['foto']?>) no-repeat">
                           		<button onclick="borrarFoto(1)" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       		</div>
                            <div class="form-group">
                            	<input style="display:none" type="file" name="foto" id="foto_miembros" accept="image/jpg, image/jpeg, image/png">
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

    function borrarFoto(id)
    {
    	if(id == 1)
    	{
    		$("#image1").hide();
    		$("#foto_miembros").show();
    	}
    	else
    	{
    		$("#image2").hide();
    		$("#foto_cv").show();
    	}
    }
    </script>

</body>

</html>
