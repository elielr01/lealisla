<?php
include("conex.php");
$db= Conectarse();
$all_recs = array();
$sql = "SELECT * FROM avisoEn";
$q = $db->prepare($sql);
$q->execute(array());
while ($row = $q->fetch()){
  $all_recs[]=array(
    'aviso'  	=> $row['aviso'],
    'modificado' => date("d/M/Y", strtotime($row['modificado']))
  );
}
echo json_encode($all_recs);
?>
