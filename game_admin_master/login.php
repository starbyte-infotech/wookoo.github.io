<?php

session_start();
include('config.php');
// if(isset($_POST['login'])){

//    $email = $_POST['email'];
//    $phone = $_POST['phone'];
//    $pass = $_POST['pass'];

//    $ciphering = "AES-128-CTR";
//    $iv_length = openssl_cipher_iv_length($ciphering);
//    $options = 0;
//    $encryption_iv = '1234117891111121';
//    $encryption_key = "Nothing";
//    $encrypt_pass = openssl_encrypt($pass, $ciphering, $encryption_key, $options, $encryption_iv);

//    $chk_user = "SELECT * FROM `tbl_subadmin` WHERE `email` = '$email' AND `phone` = '$phone'";  
//    $res_chk_user = mysqli_query($conn, $chk_user);
//    $fetch_data = mysqli_fetch_assoc($res_chk_user);
//    $row_count = mysqli_num_rows($res_chk_user);
//    if($row_count == 1){
   			
//    		$dbPass = $fetch_data['password'];
//    		if($encrypt_pass == $dbPass){
//    			// echo "<script>alert('Success')</script>"; 
//    			$flag = 1;
//    		}else{
//    			echo "<script>alert('Incorrect Password Entered. Try Again !!')</script>";
//    		}

//    }else{
//    		echo "<script>alert('Incorrect Email or Phone. Please try again !!')</script>";
//    }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V6</title>
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
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-70">
						Welcome To <span style="color: #f96332;">W</span>oo<span style="color: #f96332;">k</span>oo
					</span>
					<span class="login100-form-avatar">
						<img src="assets/images/avatar-01.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter Email">
						<input class="input100" type="text" name="email" id="email" class="email"> 
						<span class="focus-input100" data-placeholder="E-mail"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter Phone Number">
						<input class="input100" type="tel" name="phone" id="phone">
						<span class="focus-input100" data-placeholder="Phone" ></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">						
						<button type="submit" class="login100-form-btn" name="login" onClick="getGenerate();">Login</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>
							<a href="forgot.php" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="register.php" class="txt2">
								Sign up
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
	<script type="text/javascript" src="assets/js/custom_script.js"></script>
	<script type="text/javascript">
		function getGenerate(){
			var number = $('#phone').val();
    		var email = $('#email').val();
    		var password = $('#pass').val();

   			var value = 12;

			$.ajax({
		        url: "ajax/functions.php",
		        type: "post",
		        // dataType: "json",
		        data: {
		        	action: 'send_otp',
		        	value : value,
		        	number : number,
		        	email : email,
		        	password : password,
		        },
		        success: function (data) {
		        	// var obj = JSON.parse(data);

		        	var sub_admin = '<?php echo $_SESSION['sub_admin'] ?>';
		        	var sub_mobile = '<?php echo $_SESSION['sub_mobile'] ?>';
		            // alert(JSON.stringify(data));
		            // alert(data);
		            if(data == 0){
		           		alert('Incorrect Password Entered. Try Again !!');
		            }
		            if(data == 2){
		           		alert('Incorrect Email or Phone. Please try again !!');
		            }
		            if(data == 1){
		           		alert('Success');
		           		// $(".container").html(data);
               //  		console.log(data);
               			window.location = "http://localhost/wookoo/game_admin_master/otp.php?number="+sub_mobile+"&email="+sub_admin;
		            }
		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           alert(textStatus, errorThrown);
		        }
		    });
		}
	</script>

</body>

</html>