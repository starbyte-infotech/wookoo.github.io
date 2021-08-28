<?php 
session_start();
include('config.php');
include('header.php');
if(isset($_SESSION['temp_email'])){
    $login_adminl_email = $_SESSION['temp_email'];
    $query1 = "SELECT * FROM `tbl_subadmin` WHERE `email` = '$login_adminl_email'";
    $result1 = mysqli_query($con, $query1);
    $num = mysqli_num_rows($result1);
    $store1 = mysqli_fetch_array($result1);
    $subadmin_id = $store1['id'];
}

?>
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Hey, Your all link status</h5>
                    </div>
                    <div class="card-body">     
                    <?php 
                    $get_link = "SELECT * FROM `tbl_generate_link` WHERE `sub_admin` = '$subadmin_id'";
                    $res_link = mysqli_query($con, $get_link);
                    while($fetch_link = mysqli_fetch_array($res_link)){ 
                        $status = $fetch_link['status'];
                        ?>

                        <div class="row">
                            <div class="col-md-11 pr-1">
                                <div class="form-group">
                                    <label>Link <?php echo $fetch_link['id'] ?></label>
                                    <input type="text" class="form-control disabled link-input"
                                        placeholder="Company"
                                        value="<?php echo $fetch_link['link'] ?>">

                                </div>
                            </div>
                            <?php if($status == 1){?>
                                <div class="col-1 " style=" align-self: flex-end;">
                                    <div class="btn btn-success " style="width: 100px;"> Active</div>
                                </div>
                            <?php } else{ ?>
                                <div class="col-1 " style=" align-self: flex-end;">
                                    <div class="btn btn-danger " style="width: 100px;"> Deactive</div>
                                </div>
                        <?php } ?>
                        </div>  

                    <?php } ?>        
                                            
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php include('footer.php'); ?>