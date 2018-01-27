<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$stmt = $db->prepare("DELETE FROM cvEn  WHERE idempleado = ?");
if($stmt->execute(array($_POST['id']))){
	$stmt = $db->prepare("DELETE FROM cv  WHERE idempleado = ?");
	if($stmt->execute(array($_POST['id']))){
		$stmt = $db->prepare("DELETE FROM empleado  WHERE idempleado = ?");
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
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
