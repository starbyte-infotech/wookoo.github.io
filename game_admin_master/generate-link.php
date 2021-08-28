<?php 
include('header.php');
include('config.php');
?>


    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Hey, Generate Your link</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label>Game Name</label>
                                    <input type="text" class="form-control gen_link" placeholder="Company"
                                            value="" >

                                         
                                    </div>
                                </div>

                            </div>
                            <div class="row ml-1 text-center">
                                  <!-- <button sandbox="" type="submit" name="voip" class="btn w-auto btn-primary btn-block ml-auto" data-toggle="modal"
                                    data-target="#exampleModal">Generate New Link</button>  -->
                                    <a class="btn w-auto btn-primary btn-block ml-auto gen-link" onclick="generateLink();">Generate New Link</a>
                                    <a class="btn w-auto btn-primary btn-block  mr-auto verify-link" disabled onclick="approveLink();">Verify To copy Link</a>
                               <!--  <button class="btn w-auto btn-primary btn-block  mr-auto" data-toggle="modal"
                                    data-target="#exampleModal">Varify to copy Link</button> -->
                                <script type="text/javascript">
                                    function generateLink(){
                                        var rand_num = '<?php echo rand(10000,99999) ?>';
                                        var gen_link = "http://localhost/wookoo.in/"+rand_num;

                                        alert(gen_link);   
                                        if(gen_link != ''){
                                            $('.gen_link').val(gen_link);
                                            $(".gen-link").attr('disabled', true);
                                            $(".verify-link").attr('disabled', false);
                                             alert("Please Verify Your New Link.");
                                        }else{
                                            alert("Link Not Generated.");   
                                        }                                        
                                    }
                                    function approveLink(){
                                        var generated_link = $('.gen_link').val();
                                        jQuery.ajax({
                                            url: "ajax/stored_link.php",
                                            type: "POST",
                                            data:{
                                                    "action": "save_link",
                                                    "generate_link":generated_link
                                            },
                                            success: function(data)
                                            {
                                                if(data == 1){
                                                    alert('Link Generated Successfully');
                                                    window.location.href = 'generate-link.php';

                                                }
                                                if(data == 0){
                                                    alert('Failed to add');
                                                }
                                            }
                                        });
                                    }
                                </script>
                                
                            </div>
                        </form>
                    </div>          
                </div>

                
            </div>

        </div>
    </div>
<?php include('footer.php'); ?>
<script>    

                                    function verifyLink(){
                                        var l = $('.gen_link').val();
                                        alert("pre link : "+l);
                                        // var rand_num = '<?php //echo rand(1000,9999) ?>';
                                        // var generate_link = "http://localhost/wookoo.in/"+rand_num;
                                        // var genNewLink = "<?php echo $_SESSION['gen_link'] ?>";
                                        // alert(genNewLink);        

                                        // $('.gen_link').val(generate_link);

                                        // // alert(generate_link);
                                        // jQuery.ajax({
                                        //     url: "ajax/stored_link.php",
                                        //     type: "POST",
                                        //     data:{
                                        //             "action": "save_link",
                                        //             "generate_link":generate_link
                                        //     },
                                        //     success: function(data)
                                        //     {
                                        //         // alert(data);
                                        //         // $('.bank-details-container').html(data);
                                        //         if(data == 1){
                                        //             alert('Link Generated Successfully');
                                        //             window.location.href = 'generate-link.php';

                                        //         }
                                        //         if(data == 0){
                                        //             alert('Failed to add');
                                        //         }
                                        //     }
                                        // });

                                    }
                                </script>

