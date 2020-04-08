<?php
    session_start();
    $pid=$_SESSION['product-order-id'];
    $username=$_SESSION['username'];
    include('../php/config.php');
    $query = "SELECT p.product_user,u.user_street,u.user_state,u.user_district
    from product p
    JOIN user_table u on p.product_user=u.login_id
    WHERE p.product_id='$pid';";
    
    $result = mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['seller_id']=$row['product_user'];
    $address=$row['user_street'].','.$row['user_district'].','.$row['user_state'];
    $_SESSION['seller-address']=$address;

    $query ="SELECT u.user_street,u.user_state,u.user_district from user_table u where login_id='$username';";
    $result = mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    $address=$row['user_street'].','.$row['user_district'].','.$row['user_state'];
    $_SESSION['buyer-address']=$address;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/checkout.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div class="nav">
        <ul class="navbar-container" id="navbar">
            <li class="icon main"><a href="buyer_portal.php"><i class="fas fa-seedling"></i>&nbsp Home</a></li>
            <li class="icon main"><a href="cart.php"><i class="fas fa-arrow-left"></i></i>&nbsp Back</a></li>
        </ul>
    </div>
    <div class="main-container">
        <form method="POST" class="form-wrapper" action="../php/add_order.php">
            <div class="text-wrapper">
                <h1>Your product ID is: <?php echo $_SESSION['product-order-id']?> </h1>
                <h1>Seller is: <?php echo $_SESSION['seller_id']?></h1>
                <h1>Order weight: <?php echo $_SESSION['weight-item']?></h1>
                <h1>Total Amount: <?php echo "₹".$_SESSION['total-amount']?></h1>
                <h1>Delivering address: <?php echo $_SESSION['buyer-address']?></h1>
                
            </div>
            <div class="btn-wrapper">
                <button class="sub-btn">Confirm Purchase</button>
            </div>
        </form>
    </div>
</body>
<html> 