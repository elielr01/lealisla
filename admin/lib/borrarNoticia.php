<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$fecha = date("Y-m-d H:i:s");
$stmt = $db->prepare("UPDATE noticia SET estado = 0 WHERE id= ?");
if($stmt->execute(array($_POST['id']))){
  unlink("../uploads/".$_POST['archivo']);
  $all_recs[]=array('data'=> true);
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
