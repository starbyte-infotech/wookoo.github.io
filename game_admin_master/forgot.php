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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!--===============================================================================================-->
</head>
<?php 
session_start();
include('config.php');
if(!isset($_SESSION['tmp_username']))
{
    header("location:login.php");
}
else
{
    $username=$_SESSION['tmp_username'];
}

if(isset($_POST['continue']))
{
    $username=$_POST['username'];     
    $query = "SELECT * FROM `tbl_subadmin` WHERE `email` like '$username'"; 
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    if ($num >0) {
        $_SESSION['tmp_username']=$_POST['username'];     
        $flag=1;
        ?>
        <script>
            var email='<?php echo $_POST['username'] ?>';
            $.ajax({
                url: "ajax/otp_email.php",
                type: "POST",
                data:{
                    "email":email
                },
                success: function(data)
                {
                    // alert(data);
                    location.replace("otp.php");
                }
            });
        </script>
        <?php
    }
    else
    {
        echo '<script>alert("Your username Is Incorrect!!!")</script>';
    }
}
if(isset($_POST['submit']))
{
    $flag=1;
    $password=$_POST['password'];
    if($password==$_SESSION['otp'])
    {
        $_SESSION['tmp_username']=$_POST['username'];     
        header("location:change_password.php");
    }
    else
    {
        echo '<script>alert("Wrong OTP!!!")</script>';
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">



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

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="E-mail or Mobile number"></span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div> -->
					
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

						<!-- <li>
							<span class="txt1">
								Don???t have an account?
							</span>

							<a href="#" class="txt2">
								Sign up
							</a>
						</li> -->
					</ul>
					
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>


<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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