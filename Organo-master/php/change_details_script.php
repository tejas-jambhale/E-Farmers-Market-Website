<?php
    session_start();
    unset($_SESSION['error']);
    include('config.php');
    $username=$_SESSION['username'];
    $query="SELECT user_type FROM user_table WHERE login_id='$username';";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_row($result);
    $account_type=$row[0];
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        
        $name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $state=$_POST['state'];
        $district=$_POST['district'];
        $street = $_POST['street'];
        
        $query="UPDATE user_table 
            SET user_name='$name',user_age='$age',user_email='$email',
            user_street='$street',user_state='$state',user_district='$district' 
            WHERE login_id='$username';";
        $result=mysqli_query($link,$query);
        if($result)
        {

            if($account_type==='S')
            {
                header('Location: ../seller_portal/seller_portal.php');
            }
            else
            {
                header('Location: ../buyer_portal/buyer_portal.php');
            }
        }
        else
        {
            die('Error'.mysqli_error($link));
        }

    }
    mysqli_close($link);
?>