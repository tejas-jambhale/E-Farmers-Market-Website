<?php
    session_start();
    unset($_SESSION['error']);
    include('config.php');
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $login_id=$_SESSION['username'];
        $name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $state=$_POST['state'];
        $district=$_POST['district'];
        $account_type=$_POST['type'];
        $street = $_POST['street'];

        $query="INSERT INTO user_table(user_type,login_id,user_name,user_email,user_age,user_street,user_state,user_district) VALUES('$account_type','$login_id','$name','$email','$age','$street','$state','$district');";
        $result=mysqli_query($link,$query);
        if($result)
        {

            if($account_type==='S')
            {
                header('Location: seller_portal/seller_portal.php');
            }
            else
            {
                header('Location: buyer_portal/buyer_portal.php');
            }
        }
        else
        {
            die('Error'.mysqli_error($link));
        }

    }
    mysqli_close($link);
?>