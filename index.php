<?php
session_start();
session_regenerate_id(true);
include('includes/config.php');
if(isset($_POST['login']))
{
	$phonenumber=$_POST['phonenumber'];
	$password=md5($_POST['password']);
	$sql ="SELECT phonenumber,Password,level FROM admin WHERE phonenumber=:phonenumber and Password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$result=$query->fetch(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{

		$sql2 = "SELECT phonenumber,Password,level FROM admin WHERE phonenumber=:phonenumber and Password=:password";
		$query2 = $dbh -> prepare($sql2);
		$query2= $dbh -> prepare($sql);
		$query2-> bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
		$query2-> bindParam(':password', $password, PDO::PARAM_STR);
		$query2-> execute();
		$result=$query2->fetch(PDO::FETCH_OBJ);

		if($result->level == "1"){
			$_SESSION['alogin']=$_POST['phonenumber'];

			$phone_no = $_SESSION['alogin'];
			$sql = "SELECT * from admin where phonenumber = (:phone_no);";
			$query = $dbh -> prepare($sql);
			$query-> bindParam(':phone_no', $phone_no, PDO::PARAM_STR);
			$query->execute();
			$result=$query->fetch(PDO::FETCH_OBJ);
			$full_name = $result->full_name;
			$_SESSION['fname'] = $full_name;


			$_SESSION['alevel']='1';
			echo "<script type='text/javascript'> document.location = 'admin/'; </script>";
		}else if($result->level == "2"){

			$_SESSION['alogin']=$_POST['phonenumber'];
			$phone_no = $_SESSION['alogin'];
			$sql = "SELECT * from admin where phonenumber = (:phone_no);";
			$query = $dbh -> prepare($sql);
			$query-> bindParam(':phone_no', $phone_no, PDO::PARAM_STR);
			$query->execute();
			$result=$query->fetch(PDO::FETCH_OBJ);
			$full_name = $result->full_name;
			$_SESSION['fname'] = $full_name;
			$_SESSION['alevel']='2';

			echo "<script type='text/javascript'> document.location = 'receiving/'; </script>";
		}else{

		echo "<script>alert('Invalid Details');</script>";

		}


		
	} else{

		echo "<script>alert('Invalid Details');</script>";

	}

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOME</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/home.jpg');">
			<div class="wrap-login100">
				<form action="index.php" method="Post" class="login100-form validate-form">
					<!-- <span class="login100-form-logo"> -->
						<center>
							<i class="zmdi"></i>
						<img src="images/home_logo.png" width="180px" >
						</center>
					<!-- </span> -->

					<span class="login100-form-title p-b-34 p-t-27">
						REMOTE HOMECARE SYSTEM
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter PhoneNumber">
						<input class="input100" type="text" name="phonenumber" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<center>
					<div class="contact100-form-checkbox">
						<label style="color:white" for="ckb1">
							Your Health is our priority
						</label>
					</div>
					</center>

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>