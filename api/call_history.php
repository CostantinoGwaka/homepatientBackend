<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['doctor_phone']) && isset($_POST['call_date']) && isset($_POST['patient_id']))
{
	$doctor_phone=$_POST['doctor_phone'];
	$call_date=$_POST['call_date'];
	$patient_id=$_POST['patient_id'];

	// $sql ="INSERT INTO patient(fname, location, phone, password, doctor_id) VALUES (:fname,:location,:phone,:password,:doctor_id)";
	$query= $dbh -> prepare("INSERT INTO callback(doctor_phone, call_date, patient_id) VALUES (:doctor_phone,:call_date,:patient_id)");
	$query-> bindParam(':doctor_phone', $doctor_phone, PDO::PARAM_STR);
	$query-> bindParam(':call_date', $call_date, PDO::PARAM_STR);
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