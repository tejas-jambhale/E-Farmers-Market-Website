<?php
    session_start();
    unset($_SESSION['error']);
    include('config.php');
    $username=$_SESSION['username'];
    $query="SELECT password FROM login_table WHERE username='$username';";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_row($result);
    $password_temp=$row[0];
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $password_curr=$_POST['password_current'];
        $password_curr=md5($password_curr);
        $password=$_POST['password'];
        $password=md5($password);
        if($password_curr===$password_temp)
        {
            $query="UPDATE login_table
            SET password='$password'
            WHERE username='$username';";
            
            $result=mysqli_query($link,$query);

            if(!$result)
            {
                die('error'.mysqli_error($link));
            }
            else
            {
                $query="SELECT user_type FROM user_table WHERE login_id='$username';";
                $result=mysqli_query($link,$query);
                $row=mysqli_fetch_row($result);
                $account_type=$row[0];
                if($account_type==='S')
                {
                    header('Location: ../seller_portal/seller_portal.php');
                }
                else
                {
                    header('Location: ../buyer_portal/buyer_portal.php');
                }
            }

        }
        else
        {
            $_SESSION['error']="Password is wrong!";
        }


    }

    mysqli_close($link);
?>