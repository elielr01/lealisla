<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();

$foto1 = $_POST['hdn_foto_miembros'];
$foto2 = $_POST['hdn_foto_cv'];
$length = 10;

if($_FILES['foto_miembros']['type'])
{
	$original_type = $_FILES['foto_miembros']['type'];
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$extension = explode('/', $original_type);
	$target_file = preg_replace('/\s+/', '_', $target_file);
	$target_dir = dirname(dirname(__FILE__))."/uploads/".basename($randomString);
	$path = $target_dir.".".$extension[1];
	$foto1 = $randomString.".".$extension[1];
	move_uploaded_file($_FILES["foto_miembros"]["tmp_name"], $path);
}
if($_FILES['foto_cv']['type'])
{
	$original_type2 = $_FILES['foto_cv']['type'];
	$randomString2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$extension2 = explode('/', $original_type2);
	$target_file2 = preg_replace('/\s+/', '_', $target_file2);
	$target_dir2 = dirname(dirname(__FILE__))."/uploads/".basename($randomString2);
	$path2 = $target_dir2.".".$extension2[1];
	$foto2 = $randomString2.".".$extension2[1];
	move_uploaded_file($_FILES["foto_cv"]["tmp_name"], $path2);
}



	$stmt = $db->prepare("UPDATE empleado SET nombre = ?, foto = ?, fotoCV = ?, idTipo = ?, email = ? WHERE idempleado= ?");
	if($stmt->execute(array($_POST['nombre'], $foto1, $foto2, $_POST['tipo'], $_POST['email'], $_POST['hdn_id']))){
		$stmt = $db->prepare("DELETE FROM noticiaDetail WHERE idNoticia= ?");
		if($stmt->execute(array($_POST['hdn_noticia']))){
		  	header('Location: ../home.php');
		}
		else
		{
			echo "Error";
		}
	}
	else
	{
	  echo "Ha ocurrido un error, favor de intentar más tarde.";
	}

?>
