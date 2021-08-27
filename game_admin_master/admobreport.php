<?php include('header.php'); ?>
<?php include('config.php'); ?>

    <div class="panel-header panel-header-sm">

    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Ad Mob Report </h4>
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
                                        <th class="text-right">
                                            Your Earning
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                            <?php 
                                            //error_reporting(0);
                                                        $sql = "select * from tbl_domain";
                                                        $result = mysqli_query($con,$sql);

                                                        if(mysqli_num_rows($result))
                                                        {
                                                            while ($fetch = mysqli_fetch_assoc($result)) 
                                                            {

                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $fetch['date']; ?>
                                                                        </td>
                                                                         <td>
                                                                              <?php echo $fetch['domain_name']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['page_view']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['impressions']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['clicks']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['page_rpm']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['imp_rpm']; ?>
                                                                        </td>
                                                                        <td>
                                                                              <?php echo $fetch['total_ear']; ?>
                                                                        </td>
                                                                        <td class="text-right">
                                                                              <?php echo $fetch['your_ear']; ?>
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