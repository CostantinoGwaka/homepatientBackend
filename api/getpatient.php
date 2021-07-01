<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['patient_id']))
{
	$patient_id=$_POST['patient_id'];
	$sql ="SELECT * FROM patient WHERE phone=:patient_id ORDER BY id DESC";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':patient_id', $patient_id, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{

		echo json_encode($results);
		
	}else{
		echo json_encode(404);
	}

}else{
	echo json_encode(500);
}

?>