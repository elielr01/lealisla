<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM tag order by tag";
$q = $db->prepare($sql);
$q->execute(array());
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'  	   => $row['idTag'],
    'tag'      => $row['tag'],
    'tag_en'   => $row['tag_en'],
    'tag_fr'   => $row['tag_fr']
  );
}
echo json_encode($all_recs);
?>
