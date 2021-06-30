<?php
session_start();
session_regenerate_id(true);
include('../includes/config.php');
if(isset($_POST['user_id']))
{
	$user_id=$_POST['user_id'];
	$sql ="SELECT * FROM track_history WHERE user_id=:user_id ORDER BY id DESC";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
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