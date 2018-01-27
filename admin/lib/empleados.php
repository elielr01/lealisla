<?php
	session_start();
	if(!$_SESSION['logged']){
		header('Location: index.php');
	}
	include("conex.php");
	$db= Conectarse();
	$all_recs = array();
	$sql = "SELECT * FROM empleado as e JOIN tipo as t ON e.idTipo=t.idTipo order by t.idTipo, e.nombre";
	$q = $db->prepare($sql);
	$q->execute(array());
	while ($row = $q->fetch()){
		$all_recs[]=array(
			'id'  	   => $row['idempleado'],
			'nombre'   => $row['nombre'],
			'foto'     => $row['foto'],
			'tipo'     => $row['tipo']
		);
	}
	echo json_encode($all_recs);
?>
