<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM noticia where estado=1 order by fecha desc";
$q = $db->prepare($sql);
$q->execute(array());
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'  	      => $row['id'],
    'titulo'      => $row['titulo'],
    'titulo_en'   => $row['titulo_en'],
    'resumen'     => $row['resumen'],
    'resumen_en'  => $row['resumen_en'],
    'archivo'     => $row['archivo'],
    'fecha'       => $row['fecha'],
    'fecha2'      => date("d-m-Y", strtotime($row['fecha'])),
  );
}
echo json_encode($all_recs);
?>
