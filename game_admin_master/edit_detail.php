<?php 
        include('config.php');

        $id = $_GET['id']; // get id through query string

        $qry = mysqli_query($con,"select * from bank_detail where bank_id='$id'"); // select query

        $data = mysqli_fetch_array($qry); // fetch data

        if(isset($_POST['update'])) // when click on Update button
        {
            $bank_ac_name = $_POST['bank_ac_name'];
            $bank_name = $_POST['bank_name'];
            $bank_ac_num = $_POST['bank_ac_num'];
            $ifsc_code = $_POST['ifsc_code'];
            
                $edit = mysqli_query($con,"update bank_detail set bank_ac_name='$bank_ac_name', bank_name='$bank_name', bank_ac_num='$bank_ac_num', ifsc_code='$ifsc_code' where bank_id='$id'");
            
            if($edit)
            {
                mysqli_close($con); // Close connection
                header("location:bankstatus.php"); // redirects to all records page
                exit;
            }
            else
            {
                echo mysqli_error();
            }   
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
                                    <input type="text" class="form-control" placeholder="Bank Account Name" name="bank_ac_name" value="<?php echo $data['bank_ac_name'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" value="<?php echo $data['bank_name'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bank Account Number</label>
                                        <input type="text" class="form-control" placeholder="Bank Account Number" name="bank_ac_num" value="<?php echo $data['bank_ac_num'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>IFSC Code</label>
                                        <input type="text" class="form-control" placeholder="IFSC Code" name="ifsc_code" value="<?php echo $data['ifsc_code'] ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-1 text-center">    
                            <!-- <a class="btn w-auto btn-primary btn-block" href="bankstatus.php" >Add Bank Details</a> --> 
                                 <input class="btn w-auto btn-primary btn-block" type="submit" name="update" value="update"> 

                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
      
    </div>

<?php include('footer.php'); ?>