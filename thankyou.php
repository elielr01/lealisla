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
      <div class="text-muted"><img src="img/logo.jpg"><p class="pull-right"><a class="details3" href="es">Spanish</a></p></div>      <br>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="index.html">Home</a></li>
          <li><a href="mission.html">Mission</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="members.php">Members</a></li>
          <li><a href="tradition.html">Tradition</a></li>
          <li class="active"><a href="opportunities.html">Opportunities</a></li>
          <li><a href="news.html">News</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div id="main4" class="container">
    <div class="row text-center">
      <h1 class="text-left">Thank You</h1>
      <p class="text-left">
        <?php
        if ($_GET['error'] == 1)
        {
          echo "An error has occurred, please try again later.";
        }
        else
        {
          echo "We have received your email, we will contact you soon.";
        }
        ?>
        <br><br>
        <a href="opportunities.html"><button type="submit" class="btn btn-default">Previous page</button></a>
      </p>
      <br><br><br><br>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</body>
</html>
