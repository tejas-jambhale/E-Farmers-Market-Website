<?php
    session_start();
    unset($_SESSION['msg']);
    $username=$_SESSION['username'];
    include('../php/config.php');
    $query = "SELECT c.cart_id,c.product_id,p.product_type,u.login_id,product_weight weight,p.product_pricePkg 
                from cart c 
                JOIN user_table u on c.user_id=u.login_id 
                JOIN product p on c.product_id=p.product_id
                WHERE c.user_id='$username';";
    $result = mysqli_query($link, $query);
    if (!$result) 
    {
        die("error" . mysqli_error($result));
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $product_id = $_POST['button'];
        $amount=$_POST['amount_item'];
        $query="SELECT product_weight AS weight,
                        product_pricePkg*$amount AS total,
                        product_user
        from product where product_id='$product_id';";
        $result2 = mysqli_query($link, $query);
        $row_item = mysqli_fetch_assoc($result2);
        // echo $row_item['weight'];
        if($amount>$row_item['weight'])
        {
            $_SESSION['msg']="Cannot order more than available";
        }
        else
        {
            $_SESSION['weight-item']=$amount;
            $_SESSION['product-order-id']=$product_id;
            $_SESSION['total-amount']=$row_item['total'];
            header('Location: checkout.php');
        }
    }
    $i=0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <div class="nav">
        <ul class="navbar-container" id="navbar">
            <li class="icon main"><a href="buyer_portal.php"><i class="fas fa-seedling"></i>&nbsp Home</a></li>
        </ul>
    </div>
    <div class="main-container">
        <div class="banner">
            <p>My Cart
            <?php
                echo '<br>'; 
                
                if(isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                }
            ?>
            </p>
        </div>
        <div class="header">
            <div class="header-text">cart ID</div>
            <div class="header-text">Product ID</div>
            <div class="header-text">Name</div>
            <div class="header-text">Seller</div>
            <div class="header-text">Weight</div>
            <div class="header-text">Price/kg</div>
            <div class="header-text">Enter weight</div>
            <div class="header-text">Checkout</div>
        </div>
        <?php 
        while ($row=mysqli_fetch_assoc($result)) {
                
                ?>
        <form class="form-wrapper" method="POST">        
            <div class="table-row">
                <div class="text"><?php echo $row['cart_id'] ?></div>
                <div class="text"><?php echo $row['product_id'] ?></div>
                <div class="text"><?php echo $row['product_type'] ?></div>
                <div class="text"><?php echo $row['login_id'] ?></div>
                <div class="text"><?php echo $row['weight'] ?></div>
                <div class="text"><?php echo $row['product_pricePkg'] ?></div>
                <div class="text">
                    <input class="reg-field" id="reg-amount" name="amount_item" type="number" onkeyup="check(<?php echo $i?>);">
                </div>
                <div class="btn-wrapper">
                    <button class="remove-btn" id="btn" name="button" type="submit" value="<?php echo $row['product_id'] ?>">Confirm</button>
                </div>
            </div>
        </form>
        <?php
                $i++;
             }
        ?>
    </div>
    <script>
        var reg = document.getElementById('reg-amount');
        var btn = document.getElementsByClassName('remove-btn');
        for(var i=0;i<btn.length;i++)
        {
            btn[i].disabled=true;
        }
        console.log('ad');
        function check(x)
        {
            var btn = document.getElementsByClassName('remove-btn');
            if(reg.value!==null)
            {
                btn[x].disabled=false;
            }
        }
    </script>
</body>
</html>