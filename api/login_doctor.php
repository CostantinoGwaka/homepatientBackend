<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['phone']) && isset(($_POST['password'])))
{
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$sql ="SELECT * FROM doctors WHERE phone=:phone and password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
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