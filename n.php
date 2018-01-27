<?php
include("admin/lib/conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM noticia where id = :id order by fecha desc";
$q = $db->prepare($sql);
$q->execute(array(':id' => $_GET['id']));
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'          => $row['id'],
    'titulo'      => $row['titulo'],
    'titulo_en'   => $row['titulo_en'],
    'resumen'     => $row['resumen'],
    'resumen_en'  => $row['resumen_en'],
    'archivo'     => $row['archivo'],
    'fecha'       => $row['fecha'],
    'fecha2'      => date("d-m-Y", strtotime($row['fecha'])),
  );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">
  <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <meta property="og:type" content="article">
  <meta property="og:image" content="http://lealisla.com/img/oportunidades.jpg">
  <meta property="og:title" content='<?php echo $all_recs[0][titulo_en]?>'>
  <meta name="description" content='<?php echo $all_recs[0][resumen_en]?>'>
  <meta property="og:description" content='<?php echo $all_recs[0][resumen_en]?>'>
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
      <div class="text-muted"><img src="img/logo.jpg"><p class="pull-right"><a class="details3" href="es">Spanish</a></p></div>      <br>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="index.html">Home</a></li>
          <li><a href="mission.html">Mission</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="members.php">Members</a></li>
          <li><a href="tradition.html">Tradition</a></li>
          <li><a href="opportunities.html">Opportunities</a></li>
          <li class="active"><a href="news.html">News</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>


  <div class="container">
    <div id="landing">
      <div class="cointainer">
        <div class="row">
          <div class="col-md-12">
            <div style="border:none;height:300px; background-image: url(img/Lawyer.jpg);background-size: cover;" >
              <div class="opacity_div">
                <div id="texto_to_add_noticia" class="text-center"><?php echo $all_recs[0]['titulo_en']?></div>
              </div>
            </div>
            <div id="desc_noticia" class="text-noticia text-justify" class="row">
              <p><?php echo $all_recs[0]['resumen_en']?></p><br>
              <a target="_blank" href="admin/uploads/<?php echo $all_recs[0][archivo]?>" class='btn'>Descargar Archivo</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <p id="footer_p_desc"><br><br>The purpose of this section is to provide current information, but does not constitute a legal opinion or advice from Leal Isla & Horváth, S.C. If you wish to hire legal advice regarding concrete issues, please contact us at info@lealisla.com.mx</p>
  </div>


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
