<?php
include("../admin/lib/conex.php");
$db= Conectarse();
$all_recs = array();
if($_GET['type']==1){
  $inicio = $_GET['inicio'];
  $fin = $_GET['fin'];
  $fin = date('Y-m-d', strtotime($fin . ' + 1 day'));
  $sql = "SELECT * FROM noticia WHERE fecha>=:inicio and fecha<=:fin and estado=1 order by fecha desc";
  $q = $db->prepare($sql);
  $q->execute(array(':inicio' => $_GET['inicio'], ':fin' => $fin));
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
}
else if($_GET['type']==2)
{
  if(count($_GET['tags']))
  {
    $_GET['inicio'] = '';
    $_GET['fin'] = '';
    $tags = $_GET['tags'];
    $qMarks = str_repeat('?,', count($tags) - 1) . '?';
    $sql = "SELECT * FROM noticia as n JOIN noticiaDetail as nd ON n.id=nd.idNoticia where estado=1 and nd.idTag in($qMarks) group by id order by fecha desc";
    $q = $db->prepare($sql);
    $q->execute($tags);
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
  }
}
$all_recs2 = array();
$sql = "SELECT * FROM noticiaDetail as nd JOIN tag as t ON nd.idTag = t.idTag JOIN noticia as n on nd.idNoticia=n.id where n.estado=1";
$q = $db->prepare($sql);
$q->execute();
while ($row = $q->fetch()){
  $all_recs2[]=array(
    'id'          => $row['idTag'],
    'active'      => true, 
    'tag'         => $row['tag'], 
    'tag_en'      => $row['tag_en'], 
    'idNoticia'   => $row['id']
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
  <link rel="icon" href="">
  <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/datepicker.css" rel="stylesheet">
  <link href="css/multiselect.css" rel="stylesheet">
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
      <div class="text-muted"><img src="img/logo.jpg"><p class="pull-right"><a href="/en/"class="details3">English</a></p></div>
      <br>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="index.html">Home</a></li>
          <li><a href="mision.html">Misión</a></li>
          <li><a href="servicios.html">Servicios</a></li>
          <li><a href="miembros.php">Miembros</a></li>
          <li><a href="tradicion.html">Tradición</a></li>
          <li><a href="oportunidades.html">Oportunidades</a></li>
          <li class="active"><a href="noticias.html">Noticias</a></li>
          <li><a href="contacto.html">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </div>


  <div id="main2" class="container">
    <div class="row">
      <div class="col col-md-8">
        <h1 class="text-left">Noticias</h1>
        <div id="noticias">
        	<?php
        	if(count($all_recs)>0)
        	{
	        	foreach ($all_recs as $row) {
              $pills = null;
              foreach ($all_recs2 as $row2) {
                if($row2['idNoticia'] == $row['id'])
                {
                  $pills = $pills."<span class='label label-default'>".$row2['tag']."</span> ";
                }
              }
              echo "<div class=col-md-12 style=padding:0px;margin-bottom:20px id=".$row['id'].">";
              echo "<h3 class=text-left><a href=n.php?id=".$row['id'].">".$row['titulo']."</a></h3>";
              echo "<span class=news_date>".$row['fecha2']."</span>";
              echo "<div>".$pills."</div>";
              echo "<p class=text-justify>".$row['resumen']."</p>";
              echo "<a target=_blank href=../admin/uploads/".$row['archivo']." class='btn btn-default'>Descargar Archivo</a>";
              echo "<br><br><hr></div>";
	        	}
        	}
        	else
        	{
        		echo "<p class=text-justify>No se encontró ningún resultado.</p>";
        	}
        	?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="serach_box_news">
          <div class="search_header">
            Buscador
          </div>
          <div class="search_body">
          <p>1. Buscar por fecha</p>
          <form action="search.php" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="inicio" id="inicio" value='<?php echo $_GET['inicio']?>' placeholder="Fecha Inicio">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="fin" id="fin" value='<?php echo $_GET['fin']?>' placeholder="Fecha Fin">
            </div>
            <input type="hidden" name="type" value="1">
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
          <hr class="black_hr">
          <p>2. Buscar por tema</p>
          <form action="search.php" method="GET">
            <input type="hidden" name="type" value="2">
            <div class="form-group">
            <select id="tags_search" name="tags[]" class="form-control" multiple="multiple">
            </select>
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
          </div>
        </div>
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
              Blvd. Díaz Ordaz 140,<br>
              Torre II, Piso 20, Col. Santa María<br>
              C.P. 64650<br>
              T. (52-81) 8315 4238
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
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/multiselect.js"></script>
    <script>
    $('#inicio, #fin').datepicker({autoclose: true, todayHighlight: true,format: 'yyyy/mm/dd'});
    $.ajax({
        type:'GET',
        dataType: 'json',
        url:'../admin/lib/obtenerTags.php',
        success: function(data) {
          for (var i = 0; i < data.length; i++) {
            $('#tags_search').append("<option value="+data[i].id+">"+data[i].tag+"</option>");
          };
          $('#tags_search').multiselect();
        }
      });
    </script>


  </body>
  </html>
