<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM noticiaDetail as nd JOIN tag as t ON nd.idTag = t.idTag JOIN noticia as n on nd.idNoticia=n.id where n.estado=1";
$q = $db->prepare($sql);
$q->execute();
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'  	      => $row['idTag'],
    'active'      => true, 
    'tag'         => $row['tag'], 
    'tag_en'      => $row['tag_en'], 
    'idNoticia'   => $row['id']
  );
}
echo json_encode($all_recs);
?>
