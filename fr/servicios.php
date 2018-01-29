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
    <style>
    .modal-header{
      background: #0067a6;
      color: white;
    }
    .modal{
      font-family: "Avenir-Roman";
    }
  </style>
</head>

<body>


  <div class="container">
    <?php include('common/header.php')?>
    <script>
      document.getElementById('navServices').classList.add("active");
    </script>
  </div>


  <br><br>
  <div  class="container">
    <div id="servicios_list" class="row">
    </div>
  </div>


  <br><br>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          <div id="modal_servicios_list">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('common/footer.php') ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  
    $.getJSON('json/services.json', function(data) {

      data = data.sort(compareServices);

      if(data.length >0 ) {
        for (var i = 0; i < data.length; i++) {
          var a = 135
          if(data[i].servicio.length>30){
            a = 115
          }
          $("#servicios_list").append("<div class=display_a onclick=showModal("+data[i].idServicio+")><div style=margin-bottom:20px; class='col-md-3 text-center'>"+
                                      "<div style=background:url(../admin/uploads/"+data[i].foto+");height:175px;background-size:cover>"+
                                      "<div class=opacity_div2>"+
                                      "<p style=position:relative;top:"+a+"px;font-size:16px;font-family:Avenir-Roman; id=title"+data[i].idServicio+">"+data[i].servicioFr+"</p>"+
                                      "</div></div></div></div>");
        }
      }
    });

    function compareServices(a,b) {
      if (a.servicio < b.servicio)
        return -1;
      if (a.servicio > b.servicio)
        return 1;
      return 0;
    }

    function showModal(id)
    {
      $("#modal_servicios_list").empty();
      var title = $("#title"+id).html();
      $.getJSON('json/services.json', function(data) {
        for (var i = 0; i < data.length; i++) {
          if (data[i].idServicio == id) {
            $("#myModalLabel").html(title);
            for (var j = 0; j < data[i].detallesFr.length ; j++) {
              $("#modal_servicios_list").append("<div class=list-group-item>"+data[i].detallesFr[j]+"</div>");
            }
          }
        }
      });
      $("#myModal").modal('show');
    }
    </script>

  </body>
</html>
