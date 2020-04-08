<?php
    session_start();
    include('config.php');
    $message = "";
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $p_type = $_POST['item-type'];
        $p_user = $_SESSION['username'];
        $p_weight = $_POST['amount'];
        $p_pricePkg = $_POST['price'];

        $query="INSERT INTO product(product_type,product_user,product_weight,product_pricePkg) VALUES('$p_type','$p_user',$p_weight,$p_pricePkg);";
        $result=mysqli_query($link,$query);
        if($result)
        {
            $message="ok";

        }
        else
        {
            $message="Error,Cannot input item".mysqli_error($link);

        }
    }

    echo json_encode($message);
?>