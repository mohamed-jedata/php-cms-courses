<?php
include_once '../includes/sessions.php';
include_once '../includes/dbconnection.php';
include_once '../includes/functions.php';

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../includes/layout/login_page/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="../includes/layout/login_page/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">


		<div class="container-login100" style="background-image: url('../includes/layout/login_page/images/bg-01.jpg');">



		<div class="wrap-login100">
	<form method="POST" action="login_submit.php" class="login100-form validate-form">
					<span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                        <!-- <i class="fas fa-key"></i> -->
					</span>

					<span class="login100-form-title p-b-30 p-t-8">
						Log in
					</span>

					<div dir="rtl" class="p-b-15">
					<!-- Show errors -->
                  <?php echo showMessage() ?>
                   </div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-40">
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
	<script src="../includes/layout/login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="../includes/layout/login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="../includes/layout/login_page/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../includes/layout/login_page/js/main.js"></script>

</body>
</html>