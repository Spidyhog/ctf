<?php

	require "sql.php";
	
	$count_query="select count(*) from submission";
	$user_query="select count(*) from users";
	$query_result=mysqli_query($con,$count_query);
	$user_query_result=mysqli_query($con,$user_query);
	$users = mysqli_fetch_array($user_query_result);
	$submission = mysqli_fetch_array($query_result);
	if(isset($_REQUEST["err_messg"]))
	{
		$err_messg = $_REQUEST["err_messg"];
		$err_messg_sign=NULL;
	}
	else if(isset($_REQUEST["err_messg_sign"]))
	{
		$err_messg=null;
		$err_messg_sign = $_REQUEST["err_messg_sign"];
	}
	else
	{
		$err_messg_sign = null;
		$err_messg = null;
	}
		
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cryptic Hunt</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/logo48.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div id ="mylogo" style="z-index:5;position:absolute;width:30%;height:20%;background:url(images/webLogo.png);background-size:100% 100%;left:35%;top:10%;"></div>
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="POST" action="login.php">
					<div class="login100-form-avatar">
						<img src="images/logo.png" alt="BOTNET">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Capture The Flag
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Enrolment No. is required">
						<input class="input100" type="text" name="er_no" placeholder="Enrolment No.">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="psswd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="index2.php" class="txt1">
							Register
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="right_click_disable.js"></script>

</body>
</html>