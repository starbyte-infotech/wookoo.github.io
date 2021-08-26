<?php
session_start();
if(isset($_POST['username']))
{
    $username=$_POST['username'];
    if(!empty($username))
    {
        $_SESSION['tmp_username'] = $username;
    }
    else
    {
        $_SESSION['tmp_username'] = "";
    }
}
echo $_SESSION['tmp_username'];
    
?>