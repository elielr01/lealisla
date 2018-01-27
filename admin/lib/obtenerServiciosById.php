<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM detalleServicio where idServicio= ?";
$q = $db->prepare($sql);
$q->execute(array($_GET['id']));
while ($row = $q->fetch()){
  $all_recs[]=array(
    'servicio'  => $row['detalleServicio']
  );
}
echo json_encode($all_recs);
?>
