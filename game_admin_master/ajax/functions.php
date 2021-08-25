<?php 

include('../config.php');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

if(isset($_POST['action']) && $_POST['action'] == 'send_otp'){

	$mobile_number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234117891111121';
    $encryption_key = "Nothing";
    $encrypt_pass = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);


    $chk_user = "SELECT * FROM `tbl_subadmin` WHERE `email` = '$email' AND `phone` = '$mobile_number'";  
    $res_chk_user = mysqli_query($conn, $chk_user);
    $fetch_data = mysqli_fetch_assoc($res_chk_user);
    $row_count = mysqli_num_rows($res_chk_user);
    if($row_count == 1){
   			
   		$dbPass = $fetch_data['password'];
   		if($encrypt_pass == $dbPass){
   			
   			// $rndno = rand(1000, 9999);
		    $rndno = 1234;
		    $_SESSION['session_otp'] = $rndno;
		    $jsonArr = array();

		    $url = "https://www.fast2sms.com/dev/bulk?authorization=szlExyGvi293hN1AV4goBaFJXeMHOt7P5wqSQKUTnIpCjDZfmd7zGK4rgaFnEYDHvTCckiPpb3V0UBoq&sender_id=FSTSMS&message=OTP%20CODE%20is%20$rndno&language=english&route=p&numbers=$mobile_number";

		    $ch = curl_init($url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $result = curl_exec($ch);
		    $resArr = json_decode($result,true);

		    if($resArr['return'] = 1){
		        $selUser="SELECT * FROM `tbl_subadmin` WHERE email='$email' AND phone='$mobile_number'";
		        $UserRes = mysqli_query($conn,$selUser);
		        if(mysqli_num_rows($UserRes)>=1){ 
		                
		            $updOtp = "UPDATE tbl_subadmin SET otp = '$rndno' WHERE email='$email' AND phone='$mobile_number'";
		            $resOtp = mysqli_query($conn, $updOtp);  
		            $_SESSION['sub_admin']=$email;
		            $_SESSION['sub_mobile']=$mobile_number;
					// header('location: https://yoursite.com/new_index.php');
					// exit();

					// $Jsonarr = array();
					// $Jsonarr[0] = $_SESSION['sub_admin'];
					// $Jsonarr[1] = $_SESSION['sub_mobile'];
					// $Jsonarr[2] = "success";
					
		            echo $data = 1;
		        }
		    }
		   //  echo json_encode($Jsonarr);
					// exit();

   		}else{

   			echo $data = 0;
   			// echo "<script>alert('Incorrect Password Entered. Try Again !!')</script>";
   		}

    }else{
    	echo $data = 2;
   		// echo "<script>alert('Incorrect Email or Phone. Please try again !!')</script>";
    }    
}


if(isset($_POST['action']) && $_POST['action'] == 'verify_otp'){

    $otp = $_POST['otp'];                
    if ($otp == $_SESSION['session_otp']) {
        unset($_SESSION['session_otp']);

        echo $status = 1;
        // echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
        // header("Location: index.php"); 
    } else {        
        unset($_SESSION['sub_admin']);
        unset($_SESSION['sub_mobile']);
        // echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
        echo $status = 2;
         
    }
}
?>