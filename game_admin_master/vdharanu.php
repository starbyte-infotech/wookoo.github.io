<?php
error_reporting(0);
       function randomNumber() 
       {

           $number = md5(mt_rand(1000, 9000).date());
            return $number;
        }
       
    if(isset($_GET['visit']))
    {
        $voip_id = $_GET['visit'];


    // create connection
    $conn = new mysqli('localhost', 'root', 'root', 'voip');
    
    //check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }    
        $query="INSERT INTO voip_sessions (unique_id, visited) VALUES ('$voip_id','1')";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $conn->close();
            
        echo '<iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms" name="voip" style="width: 50%; height: 700px;" src="http://meet.jit.si/'.$voip_id.'"/>';        
    }


    ?>
    
   <!-- -->
<?php echo '<a href="'.$_SERVER['PHP_SELF'].'?visit='.randomNumber().'">LINK</a>';


?>

<?php include('header.php'); ?>
       <a
                                href="
    <?php
       function randomNumber() {
           $number = rand(1000, 9000);
            echo ( "http://meet.jit.si/" . $number );
        }
        randomNumber();
    
    ?>" target="voip"></a>
<!-- 
    <iframe  name="voip" style="width: 50%; height: 700px;"/> -->
   
<?php 
    // create connection
   // $con = new mysqli('localhost', 'root', '', 'config');

    //check connection
    // if ($con->connect_error) {
    //     die("Connection failed: " . $con->connect_error);
    // }
error_reporting(0);

    // $gotNumber = $_POST['uniqid'];
    
    if ( $gotNumber === randomNumber() ) 
    {
        $sql = "INSERT INTO voip (unique_id) VALUES ('$gotNumber')";
    } 
    else 
    {
        $sql = "INSERT INTO voip (unique_id) VALUES ('1111')";
    }

    // $conn->close();
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
                                    <input type="text" class="form-control disabled" placeholder="Company"
                                            value="" >

                                         
                                    </div>
                                </div>

                            </div>
                            <div class="row ml-1 text-center">
                                  <!-- <button sandbox="" type="submit" name="voip" class="btn w-auto btn-primary btn-block ml-auto" data-toggle="modal"
                                    data-target="#exampleModal">Generate New Link</button>  -->
                                    <a class="btn w-auto btn-primary btn-block ml-auto" onclick="generateLink()">Generate New Link</a>
                              <button class="btn w-auto btn-primary btn-block  mr-auto" data-toggle="modal"
                                    data-target="#exampleModal">Varify to copy Link</button>
                            </div>
                        </form>
                    </div>          
                </div>

                
            </div>

        </div>
    </div>
<?php include('footer.php'); ?>
<script>
    function generateLink(){

    }
</script>
