<?php 

include('../config.php');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

if(isset($_POST['action']) && $_POST['action'] == 'save_link'){


	$login_user_id=$_SESSION['temp_user_id'];
	$generate_link = $_POST['generate_link'];

	$status = 0;

	$sql = "INSERT INTO `tbl_generate_link`(`id`, `link`, `sub_admin`,`status`, `created_at`) VALUES (NULL, '$generate_link','$login_user_id','$status',current_timestamp() )"; 
    $res = mysqli_query($con, $sql);
    if($res){
        echo $data = 1;
    }else{
        echo $data = 0;
    }

}

?>