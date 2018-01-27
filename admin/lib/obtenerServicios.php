<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM servicio order by servicio";
$q = $db->prepare($sql);
$q->execute(array());
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'  	      => $row['idServicio'],
    'servicio'    => $row['servicio'],
    'servicio_en' => $row['servicioEn'],
    'foto' 		=> $row['foto'],
  );
}
echo json_encode($all_recs);
?>
