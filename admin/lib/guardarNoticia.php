<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$target_dir = dirname(dirname(__FILE__))."/uploads/";
$length = 10;
$tags = $_POST['tags'];
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$randomString = $randomString.".pdf";
$target_file = $target_dir . basename($randomString);
$target_file = preg_replace('/\s+/', '_', $target_file);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($_FILES["archivo"]["tmp_name"])
{
  if (file_exists($target_file))
  {
    $uploadOk = 0;
  }

  if ($uploadOk == 0)
  {
    echo "Error, el nombre del archivo ya existe, favor de renombrar.";
  }
  else
  {
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file))
    {
      chmod($target_file, 0755);
      $id = 0;
      $estado = 1;
      $fecha = date("Y-m-d H:i:s");
      $stmt = $db->prepare("INSERT INTO noticia values (:id, :titulo, :titulo_en, :resumen, :resumen_en, :archivo, :fecha, :estado)");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':titulo', $_POST['titulo']);
      $stmt->bindParam(':titulo_en', $_POST['titulo_en']);
      $stmt->bindParam(':resumen', $_POST['resumen']);
      $stmt->bindParam(':resumen_en', $_POST['resumen_en']);
      $stmt->bindParam(':archivo', ($randomString));
      $stmt->bindParam(':fecha', $fecha);
      $stmt->bindParam(':estado', $estado);
      if($stmt->execute()){
          $idNoticia = $db->lastInsertId();
          if($tags)
          {
            foreach($tags as $tag)
            {
              $stmt = $db->prepare("INSERT INTO noticiaDetail values (:id, :idNoticia, :idTag)");
              $stmt->bindParam(':id', $id);
              $stmt->bindParam(':idNoticia', $idNoticia);
              $stmt->bindParam(':idTag', $tag);
              $stmt->execute();
            }
          }
          header('Location: ../noticias.php');
      }
      else
      {
        echo "error";
      }
    }
    else
    {
      echo "Error, no se pudo subir el archivo";
    }
  }
}
?>
