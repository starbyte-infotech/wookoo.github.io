<?php include('header.php'); ?>
<?php include('config.php'); ?>

    <div class="panel-header panel-header-sm">

    </div>
        <div class="content">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Active Bank Account Details </h4>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">


                            <div class="col-6 text-left ask-text">
                                                Name On Bank Account:
                                            </div>
                                            <div class="col-6 text-left details-text">
                                                Ram Krishna Adwani
                                            </div>
                                            <div class="col-6 text-left ask-text">
                                                Bank Name:
                                            </div>
                                            <div class="col-6 text-left details-text">
                                                State Bank Of India
                                            </div>
                                            <div class="col-6 text-left ask-text">
                                                Account Number :
                                            </div>
                                            <div class="col-6 text-left details-text">
                                                59114455667788
                                            </div>
                                            <div class="col-6 text-left ask-text">
                                                IFSC :
                                            </div>
                                            <div class="col-6 text-left details-text">
                                                SBI0123456
                                            </div>

                                         

                                </div>
                                    </div>
                                    <div class="col-12 mt-2 text-center">
                                        <a class="details" href="bank-registration.html">Add New Account </a>
                                    </div>
                                    <!-- <div class="col-12 col-md-3">
                                        <div class="row ml-1 text-center">
                                            <a class="details " href="bank-registration.html">Edit Details</a>
                                            <a class="details update-request" href="bank-registration.html">Updated</a>
                                            <a class="details pending-request" href="bank-registration.html">Pending</a>
                                            <a class="details process-request"
                                                href="bank-registration.html">Processing</a>


                                            <button class="btn w-auto btn-primary btn-block mr-auto" data-toggle="modal" data-target="#exampleModal">Click to copy Link</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <blockquote>
                                            <p class="blockquote blockquote-primary">
                                                "You can not edit any details while it is under process."
                                            </p>

                                        </blockquote>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title"> Bank Account Details </h4>
                            </div> -->
                            <div class="card-body custom-card">
                                <div class="table-responsive">
                                    <table class="table custom-table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    Name on Bank Account
                                                </th>
                                                <th>
                                                    Bank Name
                                                </th>
                                                <th>
                                                    Account Number
                                                </th>
                                                <th>
                                                    IFSC
                                                </th>
                                                <th>
                                                    Edit Bank Details
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = "select * from bank_detail where id = 1";
                                            $result = mysqli_query($con,$sql);

                                            if(mysqli_num_rows($result))
                                            {
                                                 while ($fetch = mysqli_fetch_assoc($result)) 
                                            {

                                        ?>
                                            <tr class="<?php if($fetch['status']==1){echo "active";} ?>">
                                                <td>
                                                    <?php echo $fetch['bank_ac_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fetch['bank_name']; ?>
                                                </td>
                                                <td>
                                                     <?php echo $fetch['bank_ac_num']; ?>
                                                </td>
                                                <td>
                                                     <?php echo $fetch['ifsc_code']; ?>
                                                </td>
                                                <td>
                                                    <!-- <a class="details" href="bank-registration.php">Edit Details</a> -->
                                                    <a class="details" href="edit_detail.php?id=<?php echo $fetch['bank_id']; ?>">Edit</a>
                                                </td>
                                               
                                            </tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Transactions Detail </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Domain
                                                </th>
                                                <th>
                                                    Page Views
                                                </th>
                                                <th>
                                                    Impressions
                                                </th>
                                                <th>
                                                    Clicks
                                                </th>
                                                <th>
                                                    Page RPM
                                                </th>
                                                <th>
                                                    Impressions RPM
                                                </th>
                                                <th>
                                                    Total Earnigs
                                                </th>
                                                <th>
                                                    Your Earning
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                       
                                      
                                       
                <?php 
       
                        $sql = "select * from tbl_transaction";
                        $result = mysqli_query($con,$sql);

                        if(mysqli_num_rows($result))
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {

                ?>
                                    <tr>
                                       <td>
                                            <?php echo $row['trans_date']; ?>
                                        </td>
                                         <td>
                                              <?php echo $row['trans_dom_name']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_page_view']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_imp']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_clicks']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_page_rpm']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_imp_rpm']; ?>
                                        </td>
                                        <td>
                                              <?php echo $row['trans_total_ear']; ?>
                                        </td>
                                        <td >
                                              <?php echo $row['trans_your_ear']; ?>
                                        </td>

            
                                    </tr>

                            <?php
                        }
                    }
             
                ?>
            
                                  

                           </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

   
<?php include('footer.php'); ?>