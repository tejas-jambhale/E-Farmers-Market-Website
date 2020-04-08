<?php
    session_start();
    include('config.php');
    
    $username=$_SESSION['username'];

    $query= "UPDATE user_table SET wallet_amount=0 WHERE login_id='$username';";
    $result=mysqli_query($link,$query);

    if($result)
    {
        header('Location: ../seller_portal/withdrawing.php');        
    }
    else
    {
        die('error'.mysqli_error($link));
    }
?>