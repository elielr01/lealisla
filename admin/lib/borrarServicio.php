<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$stmt = $db->prepare("DELETE FROM detalleServicio where idServicio = ?");
if($stmt->execute(array($_POST['id']))){
	$stmt = $db->prepare("DELETE FROM servicio where idServicio = ?");
	if($stmt->execute(array($_POST['id']))){
	  $all_recs[]=array('data'=> true);
	}
	else
	{
	  $all_recs[]=array('data'=> false);
	}
}
else
{
	$all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
