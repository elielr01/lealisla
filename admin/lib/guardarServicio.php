<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$id = 0;
$length = 10;
$original_type = $_FILES['foto']['type'];
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$extension = explode('/', $original_type);
$target_file = preg_replace('/\s+/', '_', $target_file);
$target_dir = dirname(dirname(__FILE__))."/uploads/".basename($randomString);
$path = $target_dir.".".$extension[1];
$file = $randomString.".".$extension[1];

if($_FILES["foto"]["tmp_name"])
{
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $path))
    {
		$stmt = $db->prepare("INSERT INTO servicio VALUES (:idservicio, :servicio, :servicioEn, :foto)");
		$stmt->bindParam(':idservicio', $id);
		$stmt->bindParam(':servicio', $_POST['servicio']);
		$stmt->bindParam(':servicioEn', $_POST['servicio_en']);
		$stmt->bindParam(':foto', $file);
		if($stmt->execute()){
		  header('Location: ../servicios.php');
		} else {
		  print_r($stmt->errorInfo());
		  $response[]=array('error' => '1');
		  echo json_encode($response);
		}
	}
}
?>
