<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("lib/conex.php");
$db= Conectarse();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LEAL ISLA &amp; HORVÁTH, S.C.  Abogados</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sidebar.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a href="#">
              Leal Isla & Horváth
            </a>
          </li>
          <li>
            <a href="home.php">Personas</a>
          </li>
          <li>
            <a href="noticias.php">Noticias</a>
          </li>
          <li>
            <a href="servicios.php">Servicios</a>
          </li>
          <li>
            <a href="aviso.php">Aviso de Privacidad</a>
          </li>
          <li>
            <a href="logout.php">Cerrar sesión</a>
          </li>
        </ul>
      </div>
      <!-- /#sidebar-wrapper -->


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar Descripción</h4>
              </div>
              <div class="modal-body">
                <input class="form-control" type="text" id="edit_description_modal">
                <input type="hidden" id="hdn_description_modal">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="edit_desc_button" type="button" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div id="cv" class="col-lg-8 col-lg-offset-2">
                              <button class="btn_es btn">Español</button>
                              <button class="btn_en btn"><a href="cv_en.php?id=<?php echo $_GET['id']?>">Inglés</a></button>
                              <br><br>
                                <div class="cv_header text-center">
                                    <?php
                                    $sql = "SELECT * FROM empleado where idempleado = ?";
                                    $q = $db->prepare($sql);
                                    $q->execute(array($_GET['id']));
                                    while ($row = $q->fetch()){
                                        echo "<h3>".$row['nombre']." (Español)</h3>";
                                    }
                                    ?>
                                </div>


                                <!-- Áreas formacion -->
                                <div id="formacion_content" class="cv_body">
                                    <a id="id_formacion" class="cv_title">Formación  <i id="icon_formacion" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_formacion">
                                        <div id="formacion" onclick="anadir_formacion()" class="anadir_formacion"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info4" class="cv_info">
                                            <div role="form" id="form_formacion">
                                              <div class="form-group">
                                                <label for="txt_formacion">Descripción</label>
                                                <input type="text" class="form-control" id="txt_formacion">
                                              </div>
                                              <button id="cancelar_formacion" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_formacion" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_formacion">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=1 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div class=a id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas formacion -->
                                <br>


                                <!-- Experiencia Laboral -->
                                <div id="experiencia_content" class="cv_body">
                                    <a id="id_experiencia" class="cv_title">Experiencia  <i id="icon_experciencia" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_experiencia">
                                        <div id="experiencia" onclick="anadir_experiencia()" class="anadir_experiencia"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info1" class="cv_info">
                                            <div role="form" id="form_experiencia">
                                              <div class="form-group">
                                                <label for="txt_experiencia">Descripción</label>
                                                <input type="text" class="form-control" id="txt_experiencia">
                                              </div>
                                              <div class="form-group">
                                                  <label for="txt_experiencia">Tipo de Experiencia</label>
                                                  <select id="tipo_experiencia" class="form-control">
                                                    <option value="2">Profesional</option>
                                                    <option value="3">Académica</option>
                                                  </select>
                                              </div>
                                              <button id="cancelar_experiencia" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_experiencia" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_experiencia">
                                            <span class="label label-success">Profesional</span>
                                            <span class="label label-primary">Académica</span>
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo<=3 and tipo>1 and idempleado = ? order by tipo";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    if($row['tipo'] == 2)
                                                    {
                                                        echo "<div class=box_experiencia1><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div class=a id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                    }
                                                    else
                                                    {
                                                        echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div class=a id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Experiencia Laboral -->
                                <br>

                                <!-- Áreas especialidad -->
                                <div id="especialidad_content" class="cv_body">
                                    <a id="id_especialidad" class="cv_title">Áreas de Especialidad  <i id="icon_especialidad" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_especialidad">
                                        <div id="especialidad" onclick="anadir_especialidad()" class="anadir_especialidad"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info2" class="cv_info">
                                            <div role="form" id="form_especialidad">
                                              <div class="form-group">
                                                <label for="txt_especialidad">Nombre especialidad</label>
                                                <input type="text" class="form-control" id="txt_especialidad">
                                              </div>
                                              <button id="cancelar_especialidad" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_especialidad" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_especialidad">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=4 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas especialidad -->

                                <br>
                                <!-- Lenguaje -->
                                <div id="lenguaje_content" class="cv_body">
                                    <a id="id_lenguaje" class="cv_title">Idiomas  <i id="icon_lenguaje" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_lenguaje">
                                        <div id="lenguaje" onclick="anadir_lenguaje()" class="anadir_lenguaje"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info3" class="cv_info">
                                            <div role="form" id="form_lenguaje">
                                              <div class="form-group">
                                                <label for="txt_lenguaje">Nombre Idioma</label>
                                                <input type="text" class="form-control" id="txt_lenguaje">
                                              </div>
                                              <button id="cancelar_lenguaje" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_lenguaje" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_lenguaje">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=5 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Lenguaje -->
                                <br>

                                <!-- Áreas membresia -->
                                <div id="membresia_content" class="cv_body">
                                    <a id="id_membresia" class="cv_title">Membresias <i id="icon_membresia" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_membresia">
                                        <div id="membresia" onclick="anadir_membresia()" class="anadir_membresia"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info5" class="cv_info">
                                            <div role="form" id="form_membresia">
                                              <div class="form-group">
                                                <label for="txt_membresia">Descripción</label>
                                                <input type="text" class="form-control" id="txt_membresia">
                                              </div>
                                              <button id="cancelar_membresia" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_membresia" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_membresia">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=6 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas membresia -->
                                <br>
                                
                                <!-- Áreas seminarios -->
                                <div id="seminarios_content" class="cv_body">
                                    <a id="id_seminarios" class="cv_title">Seminarios <i id="icon_seminarios" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_seminarios">
                                        <div id="seminarios" onclick="anadir_seminarios()" class="anadir_seminarios"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info6" class="cv_info">
                                            <div role="form" id="form_seminarios">
                                              <div class="form-group">
                                                <label for="txt_seminarios">Descripción</label>
                                                <input type="text" class="form-control" id="txt_seminarios">
                                              </div>
                                              <button id="cancelar_seminarios" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_seminarios" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_seminarios">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=7 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas seminarios -->
                                <br>


                                 <!-- Áreas reconocimientos -->
                                <div id="reconocimientos_content" class="cv_body">
                                    <a id="id_reconocimientos" class="cv_title">Reconocimientos <i id="icon_reconocimientos" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_reconocimientos">
                                        <div id="reconocimientos" onclick="anadir_reconocimientos()" class="anadir_reconocimientos"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info7" class="cv_info">
                                            <div role="form" id="form_reconocimientos">
                                              <div class="form-group">
                                                <label for="txt_reconocimientos">Descripción</label>
                                                <input type="text" class="form-control" id="txt_reconocimientos">
                                              </div>
                                              <button id="cancelar_reconocimientos" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_reconocimientos" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_reconocimientos">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=8 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas reconocimientos -->
                                <br>

                                <!-- Experiencia Laboral -->
                                <div id="publicaciones_content" class="cv_body">
                                    <a id="id_publicaciones" class="cv_title">Publicaciones  <i id="icon_publicaciones" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_publicaciones">
                                        <div id="publicaciones" onclick="anadir_publicaciones()" class="anadir_publicaciones"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info8" class="cv_info">
                                            <div role="form" id="form_publicaciones">
                                              <div class="form-group">
                                                <label for="txt_publicaciones">Descripción</label>
                                                <input type="text" class="form-control" id="txt_publicaciones">
                                              </div>
                                              <div class="form-group">
                                                  <label for="txt_publicaciones">Tipo de publicacion</label>
                                                  <select id="tipo_publicaciones" class="form-control">
                                                    <option value="9">Libros</option>
                                                    <option value="10">Libros colectivos</option>
                                                    <option value="11">Artículos y notas en revistas jurídicas especializadas</option>
                                                    <option value="12">Artículos en periódicos</option>
                                                  </select>
                                              </div>
                                              <button id="cancelar_publicaciones" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_publicaciones" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_publicaciones">
                                            <span class="label label-success">Libros</span>
                                            <span class="label label-primary">Libros colectivos</span>
                                            <span class="label label-info">Artículos y notas en revistas jurídicas especializadas</span>
                                            <span class="label label-danger">Artículos en periódicos</span>
                                            </span>
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo>=9 and tipo<13 and idempleado = ? order by tipo";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    if($row['tipo'] == 9)
                                                    {
                                                        echo "<div class=box_experiencia1><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                    }
                                                    else if($row['tipo'] == 10)
                                                    {
                                                        echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                    }
                                                    else if($row['tipo'] == 11)
                                                    {
                                                        echo "<div class=box_experiencia3><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";

                                                    }
                                                    else
                                                    {
                                                        echo "<div class=box_experiencia4><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Experiencia Laboral -->
                                <br>


                                <!-- Áreas probono -->
                                <div id="probono_content" class="cv_body">
                                    <a id="id_probono" class="cv_title">PRO BONO <i id="icon_probono" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_probono">
                                        <div id="probono" onclick="anadir_probono()" class="anadir_probono"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info9" class="cv_info">
                                            <div role="form" id="form_probono">
                                              <div class="form-group">
                                                <label for="txt_probono">Descripción</label>
                                                <input type="text" class="form-control" id="txt_probono">
                                              </div>
                                              <button id="cancelar_probono" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_probono" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_probono">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=13 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas probono -->
                                <br>


                                <!-- Áreas extra -->
                                <div id="extra_content" class="cv_body">
                                    <a id="id_extra" class="cv_title">Actividades Extracucurriculares <i id="icon_extra" class="pull-right glyphicon glyphicon-chevron-up"></i></a>
                                    <br><br>
                                    <div style="display: none;" id="collapse_extra">
                                        <div id="extra" onclick="anadir_extra()" class="anadir_extra"><p>+ Añadir nuevo campo</p></div>
                                        <div style="display: none;" id="cv_info10" class="cv_info">
                                            <div role="form" id="form_extra">
                                              <div class="form-group">
                                                <label for="txt_extra">Descripción</label>
                                                <input type="text" class="form-control" id="txt_extra">
                                              </div>
                                              <button id="cancelar_extra" type="button" class="btn btn-danger">Cancelar</button>
                                              <button id="aceptar_extra" type="button" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                        <div id="display_info_extra">
                                            <br><br>
                                            <?php
                                                $sql = "SELECT * FROM cv where tipo=14 and idempleado = ?";
                                                $q = $db->prepare($sql);
                                                $q->execute(array($_GET['id']));
                                                while ($row = $q->fetch()){
                                                    echo "<div class=box_experiencia2><button data-id=".$row['idcv']." type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp".$row['idcv']."><a data-toggle=modal class=edit_desc>".$row['descripcion']."</a></div></div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Áreas extra -->
                                





                            </div>
                        </div>
                    </div>

                    <?php
                        echo "<input type=hidden id=hdn_id_empleado value=".$_GET['id'].">";
                    ?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->



    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/cv.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    
    </script>

</body>

</html>
