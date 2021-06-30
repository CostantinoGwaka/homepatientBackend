<?php include 'includes/config.php'; ?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
    header('location:login.php');
} 

if(isset($_REQUEST['id']))
{
	$cargo_id=$_REQUEST['id'];

}
$fullname =  $_SESSION['fname'];
$select = "select * from admin where full_name='$fullname'";

$run = mysqli_query($con,$select);


while($row=mysqli_fetch_array($run)){
	$phonenumber = $row['phonenumber'];
	$email = $row['email'];
	$level = $row['level'];
	$status = $row['status'];
	$full_name = $row['full_name'];
	$password = $row['password'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>HOMECARE</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php" class="logo" style="color: white;font-weight: bold;font-size:15px;">
					HOMECARE
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center jatu-orange">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						
					</ul>
				</div>	
					
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<h4><?php 
							$fullname =  $_SESSION['fname'];
							echo "$fullname";
					     	 ?></h4>
									<span class="user-level">Account</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<?php include("side_menu.php"); ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

	<!-- ///*************************************************************************** -->
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Dashboard</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Your profile details</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Profile Information</div>
								</div>
								<div class="card-body">
								<form method="POST" action="profile.php" enctype="multipart/form-data" >
									<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" value="<?php echo("$full_name") ?>" class="form-control" name="cargo_no" placeholder="Cargo Number" required="required" readonly="readonly">
												</div>
											</div>
										</div>	

										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type="phone" value="<?php echo("$phonenumber") ?>" class="form-control" name="c_name" placeholder="Customer Name" maxlength="10"  readonly="readonly">
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="text"  value="<?php echo("$email") ?>" class="form-control" name="c_phone" placeholder="Customet Phone Number" readonly="readonly">
												</div>
											</div>
										</div>		
									</div>
									<div class="row">
									<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-check-circle"></i>
													</span>
													<?php

													if($status == "0"){
														echo "
														<input type='text' value='Your Account Is Active' class='form-control' readonly='readonly'>";
													}else{
														echo "
														<input type='text' value='Your Account Is Not Active' class='form-control' readonly='readonly'>";
													}

													?>
												</div>
											</div>
										</div>	
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-key"></i>
													</span>
													<?php

													if($password != ""){
														echo "
														<input type='text' value='**********' class='form-control' readonly='readonly'>";
													}else{
														echo "
														<input type='text' value='Your Account Is Not Active' class='form-control' readonly='readonly'>";
													}

													?>
												</div>
											</div>
										</div>
									</div>
										<div class="row">

										   <div class="col-md-6 col-lg-4">
										   		<div class="form-group">
													<label>Change Password</label>
												</div>
											</div>	
											
										</div>

								<div class="column">
									<div class="column">
									<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label>Old Password</label>
											</div>
									 </div>

									 <div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-key"	></i>
													</span>
													<input type="password"  value="<?php echo("$cargo_arrival") ?>" class="form-control" name="old_password" placeholder="Enter Old Password" required="required">
												</div>
											</div>
									 </div>		
								</div>

								<div class="column">
									<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label>New Password</label>
											</div>
									 </div>

									 <div class="col-md-6 col-lg-4">
											<div class="form-group">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fa fa-key"	></i>
													</span>
													<input type="password"  value="<?php echo("$cargo_arrival") ?>" class="form-control" name="new_password" placeholder="Enter New Password" required="required">
												</div>
											</div>
									 </div>		
								</div>
								</div>
								
									</div>
								<div class="card-action">
									<button class="btn btn-success" name="update_password" >Update</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
					&copy	2020, Made by <a href="https://www.instagram.com/isoftz/">HOMECARE Team</a>
					</div>			
				</div>
			</footer>
		</div>

		<!-- //end here -->
		
		
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>
<?php
                if(isset($_POST['update_password'])){

                    $old_password = $_POST['old_password'];
                    $new_password = $_POST['new_password'];
                    $new_password = md5("$new_password");
                   
                    if($old_password == "" || $new_password =="")
                    {
                        echo "<script>alert('Please Make Sure Your Provide Old Paasword And New Password')</script>";
                        echo "<script>window.open('profile.php','_self')</script>";
                        exit();
                    }
                    else
                    {

                    	$fullname =  $_SESSION['fname'];
						$select = "select * from admin where full_name='$fullname'";

						$run = mysqli_query($con,$select);


						while($row=mysqli_fetch_array($run)){
							$password = $row['password'];
						}
                        
                        
                        if($password == md5("$old_password"))
                        {

                       	$insert = "UPDATE `admin` SET `password`='$new_password' WHERE full_name='$fullname'";

                        $run = mysqli_query($con,$insert);
                            echo "<script>alert('Password Changed Successfully !!')</script>";
                            echo "<script>window.open('profile.php','_self')</script>";
                        }
                        else if($password != md5("$old_password"))
                        {
                            echo "<script>alert('Password doesnt match with old password !!')</script>";
                            echo "<script>window.open('profile.php','_self')</script>";
                        }
                    }

                }

                
?>