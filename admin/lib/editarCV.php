<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$fecha = date("Y-m-d H:i:s");
$stmt = $db->prepare("UPDATE cv SET descripcion = ? WHERE idcv= ?");
if($stmt->execute(array($_POST['desc'], $_POST['id']))){
  $all_recs[]=array('data'=> true);
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
