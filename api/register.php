<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['fname']) && isset($_POST['location']) && isset($_POST['password']) && isset($_POST['phone']))
{
	$fname=$_POST['fname'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$location=$_POST['location'];
	$doctor_id = "";

	// $sql ="INSERT INTO patient(fname, location, phone, password, doctor_id) VALUES (:fname,:location,:phone,:password,:doctor_id)";
	$query= $dbh -> prepare("INSERT INTO patient(fname, location, phone, password, doctor_id) VALUES (:fname,:location,:phone,:password,:doctor_id)");
	$query-> bindParam(':fname', $fname, PDO::PARAM_STR);
	$query-> bindParam(':location', $location, PDO::PARAM_STR);
	$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> bindParam(':doctor_id', $doctor_id, PDO::PARAM_STR);
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