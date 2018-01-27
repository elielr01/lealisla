<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$length = 10;
$original_type = $_FILES['foto_miembros']['type'];
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$extension = explode('/', $original_type);
$target_file = preg_replace('/\s+/', '_', $target_file);
$target_dir = dirname(dirname(__FILE__))."/uploads/".basename($randomString);
$path = $target_dir.".".$extension[1];
$file = $randomString.".".$extension[1];

$original_type2 = $_FILES['foto_cv']['type'];
$randomString2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$extension2 = explode('/', $original_type2);
$target_file2 = preg_replace('/\s+/', '_', $target_file2);
$target_dir2 = dirname(dirname(__FILE__))."/uploads/".basename($randomString2);
$path2 = $target_dir2.".".$extension2[1];
$file2 = $randomString2.".".$extension2[1];
$uploadOk = 1;
if($_FILES["foto_miembros"]["tmp_name"])
{
  if (file_exists($path))
  {
    $uploadOk = 0;
  }

  if ($uploadOk == 0)
  {
    echo "Error, el nombre del archivo ya existe, favor de renombrar.";
  }
  else
  {
    if (move_uploaded_file($_FILES["foto_miembros"]["tmp_name"], $path) && move_uploaded_file($_FILES["foto_cv"]["tmp_name"], $path2))
    {
      $id = 0;
      $stmt = $db->prepare("INSERT INTO empleado VALUES (:idempleado, :nombre, :foto, :fotoCV, :idTipo, :email)");
      $stmt->bindParam(':idempleado', $id);
      $stmt->bindParam(':nombre', $_POST['nombre']);
      $stmt->bindParam(':foto', $file);
      $stmt->bindParam(':fotoCV', $file2);
      $stmt->bindParam(':idTipo', $_POST['tipo']);
      $stmt->bindParam(':email', $_POST['email']);
      if($stmt->execute()){
          header('Location: ../home.php');
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