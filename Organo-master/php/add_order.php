<?php
    session_start();
    include('config.php');
    $productid=$_SESSION['product-order-id'];
    $orderweight=$_SESSION['weight-item'];
    $orderamount=$_SESSION['total-amount'];
    $seller=$_SESSION['seller_id'];
    $buyer=$_SESSION['username'];
    $buyer_addr=$_SESSION['buyer-address'];
    $seller_addr=$_SESSION['seller-address'];

    $query="INSERT INTO order_user(product_id,order_weight,order_amount,seller_id,buyer_id,buyer_address,seller_address) VALUES($productid,$orderweight,$orderamount,'$seller','$buyer','$buyer_addr','$seller_addr');";
    echo $query;
    $result = mysqli_query($link,$query);
    if($result)
    {
        $query="DELETE FROM cart WHERE product_id = $productid";
        $result = mysqli_query($link,$query);
        if($result)
        {
            $query="UPDATE user_table SET wallet_amount = wallet_amount + $orderamount WHERE login_id='$seller';";
            $result = mysqli_query($link,$query);
            if($result)
            {
                $query="UPDATE product SET product_weight = product_weight - $orderweight,purchased_weight = purchased_weight + $orderweight WHERE product_id=$productid;";
                // echo $query;

                $result = mysqli_query($link, $query);
                if($result)
                {
                    header('Location: ../buyer_portal/Thankyou.php');

                }
                else
                {
                    die('error'.mysqli_error($link));
                }
            }
            else
            {
                die('error'.mysqli_error($link));
            }
        }
        else
        {
            die('error'.mysqli_error($link));

        }

    }
    else
    {
        die('error1:'.mysqli_error($link));
    }

?>