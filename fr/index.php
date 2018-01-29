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
  <link href="css/animate.css" rel="stylesheet">
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
    <?php include('common/header.php')?>
    <script>
      document.getElementById('navHome').classList.add("active");
    </script>


    <div id="landing">
      <div class="cointainer">
        <div class="row">
          <div class="col-md-12">
            <img id="img_1" src="img/Lawyer.jpg">
            <img id="img_2" style="display:none" src="img/contract.jpg">
            <img id="img_3" style="display:none" src="img/business_law.jpg">
            <img id="img_4" style="display:none" src="img/lawbooks.jpg">
          </div>
        </div>
        <div class="row">
          <div id="image-text" class="col-md-12">
            <div id="desc1" class="text-center description-text">
              Pour accompagner nos clients, nous nous focalisons sur la compréhension de leur besoins précis.
            </div>
            <div id="desc2" style="display:none" class="text-center description-text">
              Nous nous considérons non seulement comme les avocats de nos clients, mais aussi comme des membres à
              part entière de leur équipe.
            </div>
            <div id="desc3" style="display:none"  class="text-center description-text">
              Pour accompagner nos clients, nous nous focalisons sur la compréhension de leur besoins précis.
            </div>
            <div id="desc4" style="display:none" class="text-center description-text">
              Nous nous considérons non seulement comme les avocats de nos clients, mais aussi comme des membres à
              part entière de leur équipe.
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <h2>Mission</h2>
          <hr>
          <hr>
          <p class="text-justify">
            Nous considérons l'avocat comme un allié essentiel du client, afin que celui-ci puisse mener son activité
            de manière satisfaisante. Ainsi, notre mission principale est de trouver les meilleures stratégies
            juridiques permettant à nos clients de mener à bien leurs activités entrepreneuriales
            <br><br>
            Nous sommes convaincus que nos clients sont au centre de notre activité, c'est pourquoi nous concentrons
            tous nos efforts et connaissances afin de leur offrir les meilleurs services, en prenant le soin de le
            faire avec la meilleure qualité. Conscients de l'importance de l'engagement que cela représente, nous
            pratiquons notre profession avec une grande responsabilité et avec enthousiasme. Nous faisons de notre
            mieux pour que nos clients aient confiance dans les conseils qu'ils reçoivent de notre part.
          </p>
        </div>
        <div class="col-md-4">
          <h2>Dernières actualités</h2>
          <hr>
          <div id="noticias_a" class="text-justify">
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /container -->

  <?php include('common/footer.php') ?>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  var current = 1
  function fadeOut(current)
  {
      $("#img_"+current).addClass('animated fadeOutRight');
      $("#img_"+current).hide();
      $("#img_"+current).removeClass();
      $("#desc"+current).addClass('animated fadeOutRight');
      $("#desc"+current).hide();
      $("#desc"+current).removeClass('animated fadeOutRight');
  }

  function fadeIn(current)
  {
    $("#img_"+(current)).show();
    $("#img_"+(current)).addClass('animated fadeInRight');
    $("#desc"+(current)).show();
    $("#desc"+(current)).addClass('animated fadeInRight');
  }

  setInterval(function () {
    if(current == 1)
    {
      fadeOut(current);
      fadeIn(current+1);
      current = 2;
    }
    else if(current == 2)
    {
      fadeOut(current);
      fadeIn(current+1);
      current = 3;
    }
    else if(current == 3)
    {
      fadeOut(current);
      fadeIn(current+1);
      current = 4;
    }
    else if(current == 4)
    {
      fadeOut(current);
      fadeIn(current-3);
       current = 1;
    }
  }, 7000);

  // This will be unavailable because french news aren't available in the backend
  /*
  $.ajax({
    type:'GET',
    dataType: 'json',
    url:'../admin/lib/obtenerNoticias.php',
    success: function(data) {
      if(data.length >0 ) {
        for (var i = 0; i < 6; i++) {
          $("#noticias_a").append("<hr><a href=n.php?id="+data[i].id+"><p>"+data[i].titulo_fr+"</p></a>");
        }
      };
    }
  });
  */
  </script>
</body>
</html>
