<?php
include("../admin/lib/conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM empleado ORDER BY idTipo, nombre";
$q = $db->prepare($sql);
$q->execute(array());
 while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'       => $row['idempleado'],
    'nombre'   => $row['nombre'],
    'foto'     => $row['foto'],
    'tipo'     => $row['tipo']
  );
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta name="subject" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta name="description" content="Despacho de abogados con sede en Monterrey especializado en brindar consultoría a empresas nacionales y extranjeras y en proponer  soluciones efectivas a sus problemas legales."/>
  <meta name="keywords" content="Leal Isla, Horváth, Abogados"/>
  <meta name="revisit" content="1 day"/>
  <meta name="distribution" content="global"/>
  <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
  <meta property="og:image" content="http://lealisla.com/img/Lawyer.jpg">
  <meta property="og:title" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta property="og:description" content="Despacho de abogados con sede en Monterrey especializado en brindar consultoría a empresas nacionales y extranjeras y en proponer  soluciones efectivas a sus problemas legales.">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
      <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-59155222-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>

<body>

  <div class="container">
    <div class="masthead">
      <div class="text-muted"><img src="img/logo.jpg"><p class="pull-right"><a href="/"class="details3">English</a></p></div>
      <br>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="index.html">Home</a></li>
          <li><a href="mision.html">Misión</a></li>
          <li><a href="servicios.html">Servicios</a></li>
          <li class="active"><a href="miembros.php">Miembros</a></li>
          <li><a href="tradicion.html">Tradición</a></li>
          <li><a href="oportunidades.html">Oportunidades</a></li>
          <li><a href="noticias.html">Noticias</a></li>
          <li><a href="contacto.html">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </div>



  <div id="main" class="container">
    <div class="row">
      <hr>
      <h1 class="text-center">
        Nuestros estudios de alto nivel en prestigiosas universidades y nuestra experiencia adquirida en importantes instituciones de los sectores privado y público nos permiten prestar servicios con la mejor calidad en nuestras respectivas áreas de especialización.
      </h1>
      <hr>
      <div class="centered-icon text-center">
        <br>
        <img src="img/balanza.png" alt="Balanzas">
      </div>
    </div>
  </div>


  <div id="center" class="container">
    <div class="row">
      <p>Además, estamos calificados para brindar asesoría en los idiomas español, inglés, francés, italiano, alemán y húngaro.</p>
    </div>
    <div class="row">
      <div class="col-md-12 col-offset-md-2">
        <?php
          foreach ($all_recs as $item => $row) {
            ?>
            <div class="col-md-4">
              <a href="cv.php?nombre=<?php echo $row['nombre'] ?>">
                <div class="blue">
                <div style="display:none" class="overlay"><span class="name"><?php echo $row['nombre']?></span></div>
                <img width="100%" height="100%" src="../admin/uploads/<?php echo $row['foto']?> ">
              </div>
              </a>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>

  <br><br>


  <div class="footer">
    <div class="container">
      <div class="row">
        <div id="left" class="col-md-3">
          <p class="text-center">
            <br>
            MTY-MX<br>
           Ave David Alfaro Siqueiros No.106 (Torre Koi)<br>
           Piso 18, Despacho 1801, Colonia Valle Oriente<br>
           San Pedro Garza García, N.L. México, C.P. 66269<br>
           Tel. (52-81) 8865-4385 / 1500 9187 <br>  
          </p>
        </div>
        <div class="col-sm-6 text-center">
          <span>ORGULLOSAMENTE MIEMBRO DE</span>
          <br>
          <img src="img/icc.png">
          <img src="img/chambers.png">
          <img src="img/wwl.png">
        </div>
        <div id="right" class="col-md-3 text-right">
          <br>
          <br>
          <p class="uppercase">Leal Isla & Horváth, S.C.</p>
          <a href="avisodeprivacidad.html" class="details">AVISO DE PRIVACIDAD</a>
          <p class="footer_names">WEBSITE POR: ANDREA RAMÍREZ & JAVIER ESQUIVEL
          </p>
        </div>
      </div>
    </div>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $('.blue').mouseover(function (e){
    $(this).find('.overlay').show();
  })
  $('.blue2').mouseover(function (e){
    $(this).find('.overlay').show();
  })
  $('.blue').mouseout(function (e){
    $(this).find('.overlay').hide();
  })
  $('.blue2').mouseout(function (e){
    $(this).find('.overlay').hide();
  })
  </script>

</body>
</html>
