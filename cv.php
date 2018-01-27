<?php
include("admin/lib/conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM empleado as e JOIN tipo as t WHERE e.idTipo = t.idTipo and e.nombre = ? ORDER BY e.idTipo, e.nombre";
$q = $db->prepare($sql);
$q->execute(array($_GET['nombre']));
 while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'       => $row['idempleado'],
    'nombre'   => $row['nombre'],
    'foto'     => $row['fotoCV'],
    'tipo'     => $row['tipoEn'],
    'email'    => $row['email']
  );
}
$all_recs2 = array();
$sql = "SELECT *, c.tipo as type FROM empleado as e JOIN cvEn as c JOIN tipoCV as tc ON tc.idtipoCV=c.tipo WHERE e.idempleado = c.idempleado and e.nombre = ? ORDER BY c.tipo asc, c.idcv desc";
$q = $db->prepare($sql);
$q->execute(array($_GET['nombre']));
 while ($row = $q->fetch()){
  $all_recs2[]=array(
    'id'       => $row['idempleado'],
    'nombre'   => $row['nombre'],
    'foto'     => $row['foto'],
    'desc'     => $row['descripcion'],
    'tipo'     => $row['type'],
    'titulo'   => $row['tituloEN'], 
    'tipoCV'   => $row['idtipoCV']
  );
}
$all_recs3 = array();
$all_recs3 = $all_recs2;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta name="subject" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta name="description" content="Monterrey-based law firm specialized in advising domestic and foreign companies and in providing effective solutions to their legal issues."/>
  <meta name="keywords" content="Leal Isla, Horváth, Lawyer"/>
  <meta name="revisit" content="1 day"/>
  <meta name="distribution" content="global"/>
  <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
  <meta property="og:image" content="http://lealisla.com/img/Lawyer.jpg">
  <meta property="og:title" content="Leal Isla y Horváth , S.C. Abogados"/>
  <meta property="og:description" content="Monterrey-based law firm specialized in advising domestic and foreign companies and in providing effective solutions to their legal issues.">
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
      <div class="text-muted"><img src="img/logo.jpg"><p class="pull-right"><a class="details3" href="es">Spanish</a></p></div>
      <br>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="index.html">Home</a></li>
          <li><a href="mission.html">Mission</a></li>
          <li><a href="services.html">Services</a></li>
          <li class="active"><a href="members.php">Members</a></li>
          <li><a href="tradition.html">Tradition</a></li>
          <li><a href="opportunities.html">Opportunities</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>


    <div id="main" class="container">
      <div class="row">
          <h1 class="title text-center"><?php echo $all_recs[0]['nombre']?></h1>
          <p class="tipo text-center"><?php echo $all_recs[0]['tipo']?></p>
          <p class="email_t text-center"><?php echo $all_recs[0]['email']?></p>
          <div class="text-center col-offset-4 col-md-4" style="width:100%;">
            <img wifth="353" height="446" src="admin/uploads/<?php echo $all_recs[0]['foto']?>"></img>
          </div>
      </div>
      <br><br>
      <?php
      $anterior = 0;
      foreach ($all_recs2 as $key => $row) {
        if($anterior != $row['tipoCV'])
        {
          ?>
          <div class="row">
            <h1 class="title_info"><?php echo utf8_encode($row['titulo']) ?></h1>
            <ul class="bullets_padding">
              <?php
                foreach ($all_recs3 as $key => $row2) {
                  if($row2['tipoCV'] == $row['tipoCV'])
                  {
                    echo "<li>".$row2['desc']."</li>";
                  }
                }
              ?>
            </ul>
          </div>
          <?php
          $anterior = $row['tipoCV'];
        }
      }
      ?>
    </div>
    <br><br>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div id="left" class="col-md-3">
            <p class="text-center">
              <br>
              MTY-MX<br>
              Blvd. Díaz Ordaz 140,<br>
              Torre II, Piso 20, Col. Santa María<br>
              C.P. 64650<br>
              T. (52-81) 8315 4238
            </p>
          </div>
          <div class="col-sm-6 text-center">
            <span>PROUD MEMEMBER OF</span>
            <br>
            <img src="img/icc.png">
            <img src="img/chambers.png">
            <img src="img/wwl.png">
          </div>
          <div id="right" class="col-md-3 text-right">
            <br>
            <br>
            <p class="uppercase">Leal Isla & Horváth, S.C.</p>
            <a href="avisodeprivacidad.html" class="details">PRIVACY NOTICE</a>
            <p class="footer_names">WEBSITE BY: ANDREA RAMÍREZ & JAVIER ESQUIVEL
            </p>
          </div>
        </div>
      </div>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
