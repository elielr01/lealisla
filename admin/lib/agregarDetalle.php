<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
	$db= Conectarse();
	$id = 0;
	$stmt = $db->prepare("INSERT INTO detalleServicio values (:iddetalleServicio, :idServicio, :detalleServicio)");
	$stmt->bindParam(':iddetalleServicio', $id);
	$stmt->bindParam(':idServicio', $_POST['id']);
	$stmt->bindParam(':detalleServicio', $_POST['detalle']);
	if($stmt->execute()){
		$inserted_id = $db->lastInsertId();
		$response[]=array('error' => '0', 'id' => $inserted_id);
		echo json_encode($response);
	} else {
		$response[]=array('error' => '1');
		echo json_encode($response);
	}
?>