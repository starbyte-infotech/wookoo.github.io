<?php 
session_start();
include('config.php');
if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $image = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];   
    $folder = "images/".$image;

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234117891111121';
    $encryption_key = "Nothing";
    $encrypt_pass = openssl_encrypt($pass, $ciphering, $encryption_key, $options, $encryption_iv); ?>

    <script type="text/javascript">
        var username= '<?php echo $email ?>';
        var password= '<?php echo $encrypt_pass ?>';
                       
            jQuery.ajax({
                url: "ajax/send_otp_regi_email.php",
                type: "POST",
                data:{
                        "_token": "{{ csrf_token() }}",
                        "username":username,
                        "password":password
                },
                success: function(data)
                {
                    alert(data);
                    location.replace("regi_otp.php");
                }
            });
    </script>
    <?php
    if (move_uploaded_file($image_temp, $folder))  {
        $sql = "INSERT INTO `tbl_subadmin`(`id`, `first_name`, `last_name`,`phone`, `email`, `password`, `profile`, `created_at`) VALUES (NULL, '$fname','$lname','$phone', '$email', '$encrypt_pass', '$image', current_timestamp() )"; 
        $res = mysqli_query($con, $sql);
        if($res){
            echo "<script>alert('You have successfully registered');</script>";
        }else{
            echo "<script>alert('Failed to Register');</script>";
        }
    }else{

        echo "<script>alert('somthing went wrong !!);</script>";
    }    
    

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
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
                <form class="login100-form validate-form" method="POST" enctype="multipart/form-data">
                    <span class="login100-form-title p-b-70">
                        Welcome To <span style="color: #f96332;">W</span>oo<span style="color: #f96332;">k</span>oo
                    </span>
                    <span class="login100-form-avatar">
                        <img src="assets/images/avatar-01.jpg" alt="AVATAR">
                    </span>

                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Enter First Name">
                        <input class="input100" type="text" name="fname">
                        <span class="focus-input100" data-placeholder="First Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-35" data-validate="Enter Last Name">
                        <input class="input100" type="text" name="last_name">
                        <span class="focus-input100" data-placeholder="Last Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="number" name="phone">
                        <span class="focus-input100" data-placeholder="Mobile Number"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="E-mail"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="file" name="image">
                        
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="submit">Sign Up</button>

                    </div>

                    <ul class="login-more p-t-190">
                        <li>
                            <span class="txt1">
                                Already have an account?
                            </span>

                            <a href="login.php" class="txt2">
                                Sign In
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
    <script type="text/javascript">
        function display(){
            alert('cshchddh');
        }
    </script>
</body>

</html>