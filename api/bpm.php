<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['bpm']) && isset($_POST['phone']) && isset($_POST['date']))
{
	$bpm=$_POST['bpm'];
	$phone=$_POST['phone'];
	$date=$_POST['date'];

	// $sql ="INSERT INTO patient(fname, location, phone, password, doctor_id) VALUES (:fname,:location,:phone,:password,:doctor_id)";
	$query= $dbh -> prepare("INSERT INTO track_history(bpm,dates,user_id) VALUES (:bpm,:dates,:phone)");
	$query-> bindParam(':bpm', $bpm, PDO::PARAM_STR);
	$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
	$query-> bindParam(':dates', $date, PDO::PARAM_STR);
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