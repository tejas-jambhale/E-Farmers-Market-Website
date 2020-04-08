<?php
    session_start();
    unset($_SESSION['error']);
    include('config.php');

    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $query="SELECT username FROM login_table where username='$username';";
        $result=mysqli_query($link,$query);
        if($result)
        {
            if(mysqli_num_rows($result)!=0)
            {
                $_SESSION['error']="Username is Taken!";
            }
            else
            {
                $query="INSERT INTO login_table(username,password) values('$username','$password');";
                $result=mysqli_query($link,$query);
                if(!$result)
                {
                    
                    die("ERROR".mysqli_error($link)); 
                }
                else
                {
                    $_SESSION['username']=$username;
                    unset($_SESSION['error']);
                    header('Location: register.php');
                }
                
            }
        }
        else
        {
            die("ERROR".mysqli_error($link)); 
        }

    }

    mysqli_close($link);
?>