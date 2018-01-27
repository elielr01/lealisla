<?php
session_start();
if(!$_SESSION['logged']){
  header('Location: index.php');
}
include("conex.php");
$db= Conectarse();
$tags = $_POST['tags'];
$fecha = date("Y-m-d H:i:s");
$stmt = $db->prepare("UPDATE noticia SET titulo = ?, titulo_en = ?, resumen = ?, resumen_en = ? WHERE id= ?");
if($stmt->execute(array($_POST['titulo'], $_POST['titulo_en'], $_POST['resumen'], $_POST['resumen_en'], $_POST['hdn_noticia']))){
	$stmt = $db->prepare("DELETE FROM noticiaDetail WHERE idNoticia= ?");
	if($stmt->execute(array($_POST['hdn_noticia']))){
		$id = 0;
		$idNoticia = $_POST['hdn_noticia'];
		if($tags)
		{
			foreach($tags as $tag)
	         {
	            $stmt = $db->prepare("INSERT INTO noticiaDetail values (:id, :idNoticia, :idTag)");
	            $stmt->bindParam(':id', $id);
	            $stmt->bindParam(':idNoticia', $idNoticia);
	            $stmt->bindParam(':idTag', $tag);
	            $stmt->execute();
	        }
    	}
	  	$all_recs[]=array('data'=> true);
	}
	else
	{
		$all_recs[]=array('data'=> false);
	}
}
else
{
  $all_recs[]=array('data'=> false);
}
echo json_encode($all_recs);
?>
