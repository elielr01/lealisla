<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$fecha = date("Y-m-d H:i:s");
$stmt = $db->prepare("DELETE FROM avisoEs");
if($stmt->execute()){
  $stmt = $db->prepare("INSERT INTO avisoEs VALUES (:aviso, :modificado)");
  $stmt->bindParam(':aviso', $_POST['aviso']);
  $stmt->bindParam(':modificado', date("Y-m-d"));
  if($stmt->execute()){
    $inserted_id = $db->lastInsertId();
    $response[]=array('error' => '0', 'id' => $inserted_id);
    echo json_encode($response);
  } else {
    $response[]=array('error' => '1');
    echo json_encode($response);
  }
}
else
{
  $all_recs[]=array('data'=> false);
  echo json_encode($all_recs);
}
?>
