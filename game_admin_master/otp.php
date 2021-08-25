<?php 
include("config.php");

$phone = $_GET['number'];
$email = $_GET['email']; 


$selAdmin="SELECT * FROM `tbl_subadmin` WHERE phone='$phone'";
$AdminRes = mysqli_query($conn,$selAdmin);
if(mysqli_num_rows($AdminRes)>=1){

}else{ ?>
    <script type="text/javascript">
        $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
        $(".alert-success").css('display','block');
    </script>
<?php } ?>


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
	<style type="text/css">
        .hide{ display: none; }
    </style>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<div class="error" style="color: #fff;"></div>
                <div class="success" style="color: #fff;"></div>
                <!-- <div class="col-12">
                    <div class="alert alert-success ">You Got the 100 Welcome Coins !!</div>
                </div> -->
				<form class="login100-form validate-form" method="POST">

					<span class="login100-form-title p-b-70">
						Welcome To <span style="color: #f96332;">W</span>oo<span style="color: #f96332;">k</span>oo
					</span>
					<div>
                        <p class="m-0">We have sent an OTP on</p>
                        <h2 class="m-0"><?php echo $phone; ?></h2>
                    </div>
					<span class="login100-form-avatar">
						<img src="assets/images/avatar-01.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter OTP Number">
						<input class="input100" type="Text" name="mobileOtp" id="mobileOtp">
						<span class="focus-input100" data-placeholder="Enter OTP"></span>
					</div>

					<div class="container-login100-form-btn">						
						<button type="submit" class="login100-form-btn" name="submit" onClick="verifyOTP();">Submit</button>
					</div>

					<ul class="login-more p-t-10">
						<li class="m-b-8">
							<a href="login.php" class="txt2">
								Request Another OTP?
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
	<script type="text/javascript">
		function verifyOTP(){
			$(".error").html("").hide();
		    $(".success").html("").hide();
		    var otp = $("#mobileOtp").val();
		    // alert(otp);
		    var input = {
		        "otp" : otp,
		        "action" : "verify_otp"
		    };
		    if (otp.length == 4 && otp != null) {
		        $.ajax({
		            url : 'ajax/functions.php',
		            type : 'POST',
		            // dataType : "json",
		            data : input,
		            success : function(response) {
		            	// alert(response);
		            	if(response == 1){
		            		alert("You have Logged in Now.");
		                	window.location = "index.php";
		            	}
		            	if(response == 2){
		            		alert("You have Entered Wrong OTP");
		                	window.location = "login.php";
		            	}
		                
		            },
		            error : function() {
		                alert("failed!!");
		            }
		        });
		    } else {
		        alert('You have entered wrong OTP.');
		    }
		}
	</script>
</body>

</html>