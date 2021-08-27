<?php 
    session_start();
    include('config.php');
    if(isset($_POST['submit']))
    {

    $bank_ac_name = $_POST['bank_ac_name'];
    $bank_name = $_POST['bank_name'];
    $bank_ac_num = $_POST['bank_ac_num'];
    $ifsc_code = $_POST['ifsc_code'];

        $sql = "INSERT INTO `bank_detail`(`bank_id`,`bank_ac_name`, `bank_name`,`bank_ac_num`, `ifsc_code`,`id`) VALUES (NULL,'$bank_ac_name','$bank_name','$bank_ac_num', '$ifsc_code',1,0)"; 
        $res = mysqli_query($con, $sql);

        header('location: bankstatus.php');

         // if($res > 0)
         // {
         //     $sql = "SELECT `bank_id` FROM `bank_detail` WHERE `bank_ac_num` = '$bank_ac_num'"; 
         //     //echo  $sql;
         //     $res1 = mysqli_query($con, $sql);

         //     while ($fetch = mysqli_fetch_assoc($res1)) 
         //     {
         //        $bank_id1 =  $fetch['bank_id'];
         //     }
         //     echo "<script> window.location.assign('bankstatus.php'); </script>";
         // }
         // else
         // {
         //     echo "<script>alert('Please make sure that you enter the correct  details and that you have activated your account.');</script>";
         // }
    }
?>

<?php include('header.php'); ?>

    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Add Bank Details</h5>
                    </div>
                    <div class="card-body">

                        <form method="POST">      
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name As per Bank Account</label>
                                    <input type="text" class="form-control" placeholder="Bank Account Name" name="bank_ac_name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bank Account Number</label>
                                        <input type="text" class="form-control" placeholder="Bank Account Number" name="bank_ac_num" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>IFSC Code</label>
                                        <input type="text" class="form-control" placeholder="IFSC Code" name="ifsc_code" value="" required>
                                    </div>
                                </div>
                            </div>




                            <div class="row ml-1 text-center">    
                            <!-- 
                                <a class="btn w-auto btn-primary btn-block" href="bankstatus.php" >Add Bank Details</a> --> 
                                
                                     <input class="btn w-auto btn-primary btn-block" type="submit" name="submit" >   
                                

                            </div>
            



                        </form>

                    </div>
                </div>
            </div>
        </div>
      
    </div>

<?php include('footer.php'); ?>