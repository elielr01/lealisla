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

  </style>
</head>

<body>

  <div style="display:none" class="overlay_bg text-center">
    <p class="overlay_content">Envoi...</p>
  </div>

  <div class="container">
    <?php include('common/header.php')?>
    <script>
      document.getElementById('navContact').classList.add("active");
    </script>
  </div>



  <div id="main4" class="container">
    <div class="row text-center">
      <h1 class="text-left">Contact</h1>
    </div>
    <br>
    <div class="row">
      <div style="padding-left:0px;margin:0px;padding-right:10px;"  class="col-md-6">
        <p>
          Ave David Alfaro Siqueiros No.106 (Torre Koi)
          <br>Piso 18, Despacho 1801, Colonia Valle Oriente
          <br>San Pedro Garza García, N.L. México, 66269
          <br>Tel. (52-81) 8865-4385

          <br><br>Lic. Beatriz Leal-Isla Garza
          <br>Gerente de Relaciones Públicas
          <br>beatriz@lealisla.com.mx

          <br><br>Pour nous contacter, merci de remplir le formulaire suivant:
          <br>ou vous pouvez écrire à <span class="underline">info@lealisla.com.mx</span>
          <br><br>
        </p>
        <form id="contacto_form" class="form-horizontal" role="form">
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nom*</label>
            <div class="col-sm-10">
              <input required type="text" class="form-control" id="nombre" name="nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Courriel*</label>
            <div class="col-sm-10">
              <input required type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="comentario" class="col-sm-3 control-label">Commentaires* </label>
            <div class="col-sm-9">
              <textarea required class="form-control" rows="3" id="comentario" name="comentario"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Envoyer</button>
            </div>
          </div>
        </form>
        <div style="display:none" id="oportunidad_alert" class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          Hemos recibido su mensaje, en breve nos comunicaremos.
        </div>
      </div>
      <div style="padding-left:0px;margin:0px;padding:0px;" class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14384.048111917169!2d-100.37722!3d25.670896000000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7aac1c8ee74f50db!2sLeal-Isla+%26+Horv%C3%A1th%2C+S.C.!5e0!3m2!1sen!2smx!4v1418513241531" width="100%" height="450" frameborder="0" style="border:0"></iframe>
      </div>
    </div>
  </div>
  <?php include('common/footer.php') ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $("#contacto_form").submit(function(e){
    e.preventDefault();
    $(".overlay_bg").show();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var comentario = $("#comentario").val();
    $.ajax
    ({
      type:"POST",
      url:'enviar.php',
      dataType: 'json',
      data:{nombre:nombre, email:email, comentario:comentario},
      success: function(data)
      {
        if(data[0].data == true)
        {
          $(".overlay_bg").hide();
          $("#contacto_form").hide();
          $("#oportunidad_alert").show();
        }
        else
        {
          alert("Ha ocurrido un error, favor de volver a intentar.");
        }
      }
    });
    return false;

  })
  </script>

</body>
</html>
