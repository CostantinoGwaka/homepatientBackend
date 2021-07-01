<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['fname']) && isset($_POST['location']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['age']))
{
	$fname=$_POST['fname'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];
	$location=$_POST['location'];
	$age=$_POST['age'];
	$doctor_id = "";

	$query= $dbh -> prepare("INSERT INTO patient(fname, location, phone,age ,password, doctor_id) VALUES (:fname,:location,:phone,:age,:password,:doctor_id)");
	$query-> bindParam(':fname', $fname, PDO::PARAM_STR);
	$query-> bindParam(':location', $location, PDO::PARAM_STR);
	$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
	$query-> bindParam(':age', $age, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> bindParam(':doctor_id', $doctor_id, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{

		//assign doctor auto
			//is auto to check if doctor is free and pick random doctor to assign patient
			$sql ="SELECT id FROM doctors WHERE location=:location ORDER BY RAND() LIMIT 1";
			$query= $dbh -> prepare($sql);
			$query-> bindParam(':location', $location, PDO::PARAM_STR);
			$query-> execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			if($query->rowCount() > 0)
			{
			  $doctorId = $results[0]->id;
			  $insert = "UPDATE `patient` SET `doctor_id`='$doctorId' WHERE `phone`='$phone'";
			  $run = mysqli_query($con,$insert);
			}
		//end here
		echo json_encode(200);
		
	}else{
		echo json_encode(404);
	}

}else{
	echo json_encode(500);
}

?>