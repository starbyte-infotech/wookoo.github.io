<?php
session_start();
error_reporting(0);;
include('config.php');
// if(!isset($_SESSION['tmp_username']))
// {
//     header("location:login.php");
// }
// else
// {
    $username=$_SESSION['tmp_username'];
// }
if(isset($_POST['continue']))
{

     $password=$_POST['pass'];
     $confirm_password=$_POST['confirm-pass'];

    $query_select = "SELECT * FROM `tbl_subadmin` WHERE `email` LIKE '$username'"; 
    $result_select = mysqli_query($conn, $query_select);
    $num = mysqli_num_rows($result_select);
    if($password!=$confirm_password)
    {
        echo '<script>alert("password Must be same")</script>';
    }
    elseif($num>0)
    { 
        $store = mysqli_fetch_array($result_select);
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234117891111121';
        $encryption_key = "Nothing";
        $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
        $id=$store['id'];
        $query_update="UPDATE `tbl_subadmin` SET `password` = '$encryption' WHERE `tbl_subadmin`.`id` = $id";
        $result_update = mysqli_query($conn, $query_update);
        setcookie("passwordlogin","", time() - 3600);
        unset($_SESSION['tmp_username']);
        echo '<script>alert("Password is Changed Now.")</script>';
        // header("location:login.php");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Forgot V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" method="POST" >
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="assets/images/avatar-01.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter Email Address">
						<input class="input100" type="text" name="Email Address">
						<span class="focus-input100" data-placeholder="E-mail"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter Confirm password">
						<input class="input100" type="password" name="confirm-pass">
						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>
					
					<div class="container-login100-form-btn">						
						<button type="submit" class="login100-form-btn" name="continue">Continue</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Alredy have
							</span>

							<a href="login.php" class="txt2">
								Login?
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>
	<script src="assets/js/custom_script.js"></script>

</body>

</html>