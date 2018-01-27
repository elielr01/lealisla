<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$stmt = $db->prepare("DELETE FROM detalleServicioEn where iddetalleServicio = ?");
if($stmt->execute(array($_POST['id']))){
  $all_recs[]=array('data'=> true);
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
