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
