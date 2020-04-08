<?php
    session_start();
    $username=$_SESSION['username'];
    include('../php/config.php');
    $query="SELECT * from product where product_user='$username';";
    $result=mysqli_query($link,$query);
    if(!$result)
    {
        die("error".mysqli_error($result));
    }
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $product_id=$_POST['button'];
        $query="DELETE FROM product WHERE product_id=$product_id;";
        $result=mysqli_query($link,$query);
        if(!$result)
        {
            die('error'.mysqli_error($link));
        }
        else
        {
            header("Refresh: 0");
        }
    }
    mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/myitems.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body> 
    <div class="nav"> 
        <ul class="navbar-container" id="navbar">
            <li class="icon main"><a href="seller_portal.php"><i class="fas fa-seedling"></i> Home</a></li>
        </ul>
    </div>
    <div class="main-container">
        <div class="header">
            <div class="header-text">ID</div>
            <div class="header-text">Item Type</div>
            <div class="header-text">Weight</div>
            <div class="header-text">Price/kg</div>
            <div class="header-text">Purchsed Weight</div>
            <div class="header-text">Remove listing</div>
        </div>
        <?php 
            while($row=mysqli_fetch_assoc($result))
            {
        ?>
        <div class="table-row">
            <div class="text"><?php echo $row['product_id'] ?></div>
            <div class="text"><?php echo $row['product_type'] ?></div>
            <div class="text"><?php echo $row['product_weight'] ?></div>
            <div class="text"><?php echo $row['product_pricePkg'] ?></div>
            <div class="text"><?php echo $row['purchased_weight'] ?></div>
            <div class="btn-wrapper">
                <form class="form-wrapper" method="POST">
                    <button class="remove-btn" name="button" type="submit" value="<?php echo $row['product_id'] ?>">Confirm</button>
                </form>
            </div>
        </div>

        <?php
            }
        ?>
    </div>
</body>
</html>
