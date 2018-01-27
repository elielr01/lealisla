<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM noticiaDetail as nd JOIN tag as t ON nd.idTag = t.idTag where nd.idNoticia = :id";
$q = $db->prepare($sql);
$q->execute(array(':id' => $_GET['id']));
while ($row = $q->fetch()){
  $all_recs[]=array(
    'id'  	      => $row['idTag'],
    'active'      => true, 
    'tag'         => $row['tag']
  );
}
$all_recs2 = array();
$sql = "SELECT * FROM tag";
$q = $db->prepare($sql);
$q->execute();
while ($row = $q->fetch()){
  $all_recs2[]=array(
    'id'  	      => $row['idTag'],
    'active'      => false,
    'tag'         => $row['tag']
  );
}
foreach ($all_recs as $key => $row) {
	foreach ($all_recs2 as $key2 => $row2) {
		if($row['id'] ==  $row2['id'])
		{
			unset($all_recs2[$key2]);
		}
	}
}
$results2 = array_values($all_recs2);
$results1 = array_values($all_recs);
$results3 = array_merge($results1, $results2);
function cmp($a, $b) {
   return $a['id'] - $b['id'];
}
usort($results3,"cmp");
echo json_encode($results3);
?>
