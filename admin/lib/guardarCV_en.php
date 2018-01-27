<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
	include("conex.php");
	$db= Conectarse();
	$id = 0;
	$stmt = $db->prepare("INSERT INTO cvEn values (:idcv, :idempleado, :tipo, :descripcion)");
	$stmt->bindParam(':idcv', $id);
	$stmt->bindParam(':idempleado', $_POST['idempleado']);
	$stmt->bindParam(':tipo', $_POST['tipo']);
	$stmt->bindParam(':descripcion', $_POST['descripcion']);
	if($stmt->execute()){
		$inserted_id = $db->lastInsertId();
		$response[]=array('error' => '0', 'id' => $inserted_id);
		echo json_encode($response);
	} else {
		$response[]=array('error' => '1');
		echo json_encode($response);
	}
?>