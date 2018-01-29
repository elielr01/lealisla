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
    <?php include('common/header.php')?>
    <script>
      document.getElementById('navNews').classList.add("active");
    </script>
  </div>


  <div id="main2" class="container">
    <div class="row">
      <div class="col col-md-8">
        <h1 class="text-left">Noticias</h1>
        <div id="noticias">
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
              <input type="text" class="form-control" name="inicio" id="inicio" placeholder="Fecha Inicio">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="fin" id="fin" placeholder="Fecha Fin">
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
  <?php include('common/footer.php') ?>


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
    var tags;
    $.ajax({
        type:'GET',
        dataType: 'json',
        url:'../admin/lib/obtenerTagsA.php',
        success: function(data) {
          tags = data;
          $.ajax({
            type:'GET',
            dataType: 'json',
            url:'../admin/lib/obtenerNoticias.php',
            success: function(data) {
              if(data.length >0 ) {
                for (var i = 0; i < data.length; i++) {
                  var pills =  '';
                  for (var j = 0; j < tags.length; j++) {
                    if(tags[j].idNoticia == data[i].id)
                    {
                      if(pills.length>0){
                        pills = pills + "<span class='label label-default'>"+tags[j].tag+"</span> ";
                      }
                      else
                      {
                        pills = "<span class='label label-default'>"+tags[j].tag+"</span> ";
                      }
                    }
                  };
                  $("#noticias").append("<div class=col-md-12 style=padding:0px;margin-bottom:20px id="+data[i].id+">"+
                  "<h3 class=text-left><a href=n.php?id="+data[i].id+">"+data[i].titulo+"</a></h3>"+
                  "<span class=news_date>"+data[i].fecha2+"</span>"+
                  "<div>"+pills+"</div>"+
                  "<p class=text-justify>"+data[i].resumen+"</p>"+
                  "<a target=_blank href=../admin/uploads/"+data[i].archivo+" class='btn btn-default'>Descargar Archivo</a>"+
                  "<br><br><hr></div>");
                }
              };
            }
          });
        }
    });
    </script>


  </body>
  </html>
