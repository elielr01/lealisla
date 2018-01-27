<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();

$foto = $_POST['hdn_foto'];
$length = 10;
if($_FILES['foto']['type'])
{
	$original_type = $_FILES['foto']['type'];
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$extension = explode('/', $original_type);
	$target_file = preg_replace('/\s+/', '_', $target_file);
	$target_dir = dirname(dirname(__FILE__))."/uploads/".basename($randomString);
	$path = $target_dir.".".$extension[1];
	$foto = $randomString.".".$extension[1];
	move_uploaded_file($_FILES["foto"]["tmp_name"], $path);
}

$stmt = $db->prepare("UPDATE servicio SET servicio = ?, servicioEn = ?, foto= ? WHERE idServicio= ?");
if($stmt->execute(array($_POST['servicio'], $_POST['servicio_en'], $foto, $_POST['hdn_id']))){
  header('Location: ../servicios.php');
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
