<?php 

include('../config.php');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

if(isset($_POST['action']) && $_POST['action'] == 'getbank_data'){

	$bank_id = $_POST['bank_id'];
	$get_data = "SELECT * FROM `bank_detail` WHERE `bank_id` = '$bank_id'";
	$res_bank = mysqli_query($con, $get_data);
	$fetch_data = mysqli_fetch_assoc($res_bank);

	$change_status = "UPDATE `bank_detail` SET `status`= 1 WHERE `bank_id` = '$bank_id'";
	$res_status = mysqli_query($con, $change_status); 

?>


	<div class="col-6 text-left ask-text">
                Name On Bank Account:
    </div>
    <div class="col-6 text-left details-text">
        <?php echo $fetch_data['bank_ac_name'] ?>
    </div>
    <div class="col-6 text-left ask-text">
        Bank Name:
    </div>
    <div class="col-6 text-left details-text">
        <?php echo $fetch_data['bank_name'] ?>
    </div>
    <div class="col-6 text-left ask-text">
        Account Number :
    </div>
    <div class="col-6 text-left details-text">
        <?php echo $fetch_data['bank_ac_num'] ?>
    </div>
    <div class="col-6 text-left ask-text">
        IFSC :
    </div>
    <div class="col-6 text-left details-text">
        <?php echo $fetch_data['ifsc_code'] ?>
    </div>
</div>


<?php
}
?>