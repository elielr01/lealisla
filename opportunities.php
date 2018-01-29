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


  <div style="display:none" class="overlay_bg text-center">
    <p class="overlay_content">Sending...</p>
  </div>

  <div class="container">
    <?php include('common/header.php')?>
    <script>
      document.getElementById('navOpportunities').classList.add("active");
    </script>
  </div>

  <div id="main4" class="container">
    <div class="row text-center">
      <h1 class="text-left">Opportunities</h1>
      <p  class="text-left">
        We look for talented students who are interested in an outstanding professional career with us. If you are interested, please send us a message indicating the areas of your interest and enclosing your resume.
      </p>
      <br>
    </div>
    <br><br>
    <div class="row">
      <div style="padding-left:0px;margin:0px;padding-right:10px;"  class="col-md-6">
        <form id="oportunidad_form" class="form-horizontal" role="form" action="enviarOportunidades.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Name*</label>
            <div class="col-sm-10">
              <input required type="text" class="form-control" name="nombre" id="nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email*</label>
            <div class="col-sm-10">
              <input required type="email" class="form-control" name="email" id="email">
            </div>
          </div>
          <div class="form-group">
            <label for="comentario" class="col-sm-2 control-label">Comments </label>
            <div class="col-sm-10">
              <textarea class="form-control" name="comentario" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="cv" class="col-sm-2 control-label">Resume* </label>
            <div class="col-sm-10">
              <input required type="file" class="form-control" name="cv" id="cv" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 oportunidades">
      </div>
    </div>
  </div>
  <?php include('common/footer.php') ?>  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $("#oportunidad_form").submit(function(e){
    $(".overlay_bg").show();
    return true;
  })
  </script>

</body>
</html>
