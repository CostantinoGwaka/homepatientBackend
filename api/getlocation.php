<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');

	$sql ="SELECT * FROM wilaya ORDER BY id DESC";
	$query= $dbh -> prepare($sql);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{

		echo json_encode($results);
		
	}else{
		echo json_encode(404);
	}

?>