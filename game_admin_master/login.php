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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!--===============================================================================================-->
</head>
<?php

session_start();
include('config.php');
$f = 0;
if (isset($_POST['continue'])) 
{
	$detail = $_POST['detail'];
	$password = $_POST['pass'];
	$_SESSION['detail'] = $detail;

	$ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234117891111121';
    $encryption_key = "Nothing";
    $encrypt_pass = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

	if (filter_var($detail, FILTER_VALIDATE_EMAIL)) {
		$query1 = "SELECT * FROM `tbl_subadmin` WHERE `email` LIKE '$detail' AND `password` = '$encrypt_pass'";
		$result1 = mysqli_query($con, $query1);
		$num = mysqli_num_rows($result1);
		$store1 = mysqli_fetch_array($result1);
		if ($num > 0) {
			$_SESSION['temp_user'] = $store1['first_name'];
			$_SESSION['temp_email'] = $store1['email'];
			$_SESSION['temp_user_id'] = $store1['id'];
			// Check_OTP($detail);
			$f = 1;
			?>

			<script type="text/javascript">
				var username= '<?php echo $detail ?>';
				var password= '<?php echo $encrypt_pass ?>';
                               
                    jQuery.ajax({
                        url: "ajax/send_login_otp_email.php",
                        type: "POST",
                        data:{
                                "_token": "{{ csrf_token() }}",
                                "email":username,
                                "password":password
                        },
                        success: function(data)
                        {
                        	// alert("data" + data);
                            location.replace("login_otp.php");
                        }
                    });
			</script>
			<?php 
		} else {
			// $error .= "Invalid User!! First Register";
			echo '<script>alert("You are Entered Wrong Email or Password. Please try Again !!")</script>';
		}
	} else { echo "string"; die();
		$query1 = "SELECT * FROM `tbl_subadmin` WHERE `phone` LIKE '$detail'";
		$result1 = mysqli_query($con, $query1);
		$num = mysqli_num_rows($result1);
		$store1 = mysqli_fetch_array($result1);
		if ($num > 0) {
			$_SESSION['temp_user'] = $store1['first_name'];
			// Check_OTP($detail);
            $rndno = rand(100000, 999999); //OTP generate
            //$_SESSION['check_otp'] = 555555;
            $_SESSION['check_otp'] = $rndno;            
            $url = "https://www.fast2sms.com/dev/bulk?authorization=szlExyGvi293hN1AV4goBaFJXeMHOt7P5wqSQKUTnIpCjDZfmd7zGK4rgaFnEYDHvTCckiPpb3V0UBoq&sender_id=FSTSMS&message=$rndno%20is%20Allen-bren%20code&language=english&route=p&numbers=$detail";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
			$f = 2;
		} else {
			// $error .= "Invalid User!! First Register";
			echo '<script>alert("You are not registered with us. Please sign up")</script>';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">



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

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter Email or Phone">
						<input class="input100" type="text" name="detail" id="detail" class="detail"> 
						<span class="focus-input100" data-placeholder="Email or Phone"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-35" data-validate="Enter Phone Number">
						<input class="input100" type="tel" name="phone" id="phone">
						<span class="focus-input100" data-placeholder="Phone" ></span>
					</div> -->

					<div class="wrap-input100 m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">						
						<button type="submit" class="login100-form-btn" name="continue">Login</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>
							<a href="" class="txt2" onclick="forgot_password()">
								Username / Password?
							</a>
						</li>
						<script>                                    
                            function forgot_password()
                            {
                                var username=$('#detail').val();
                               
                                jQuery.ajax({
	                                url: "ajax/password_ajax.php",
	                                type: "POST",
	                                data:{
	                                        "_token": "{{ csrf_token() }}",
	                                        "username":username
	                                },
	                                success: function(data)
	                                {
	                                	alert(data);
	                                    location.replace("forgot.php");
	                                }
                                });
                            }
                        </script>

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
		// function getGenerate(){
		// 	var number = $('#phone').val();
  //   		var email = $('#email').val();
  //   		var password = $('#pass').val();

  //  			var value = 12;

		// 	$.ajax({
		//         url: "ajax/functions.php",
		//         type: "post",
		//         // dataType: "json",
		//         data: {
		//         	action: 'send_otp',
		//         	value : value,
		//         	number : number,
		//         	email : email,
		//         	password : password,
		//         },
		//         success: function (data) {
		//         	// var obj = JSON.parse(data);

		//         	var sub_admin = '<?php //echo $_SESSION['sub_admin'] ?>';
		//         	var sub_mobile = '<?php// echo $_SESSION['sub_mobile'] ?>';
		//             // alert(JSON.stringify(data));
		//             // alert(data);
		//             if(data == 0){
		//            		alert('Incorrect Password Entered. Try Again !!');
		//             }
		//             if(data == 2){
		//            		alert('Incorrect Email or Phone. Please try again !!');
		//             }
		//             if(data == 1){
		//            		alert('Success');
		//            		// $(".container").html(data);
  //              //  		console.log(data);
  //              			window.location = "http://localhost/wookoo/game_admin_master/otp.php?number="+sub_mobile+"&email="+sub_admin;
		//             }
		//         },
		//         error: function(jqXHR, textStatus, errorThrown) {
		//            alert(textStatus, errorThrown);
		//         }
		//     });
		// }
	</script>

</body>

</html>