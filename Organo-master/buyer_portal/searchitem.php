<?php
    $item_type = $_GET['item'];
    session_start();
    include('../php/config.php');
/*
function bubble_Sort($my_array )
{
	do
	{
		$swapped = false;
		for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ )
		{
			if( $my_array[$i] > $my_array[$i + 1] )
			{
				list( $my_array[$i + 1], $my_array[$i] ) =
						array( $my_array[$i], $my_array[$i + 1] );
				$swapped = true;
			}
		}
	}
	while( $swapped );
return $my_array;
}
*/
    $query = "SELECT product_id,product_user,product_weight AS weight,user_state,user_district,product_pricePkg from product JOIN user_table on product.product_user=user_table.login_id where product_type='$item_type' AND product.product_weight>0 ORDER BY product_pricePkg";
    $result = mysqli_query($link, $query);
    if (!$result) 
    {
        die("error" . mysqli_error($result));
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if ($_SESSION['username'] === 'GUEST') 
        {
                header('Location: ../login.php');
        } 
        else 
        {
            $username=$_SESSION['username'];
            $product_id = $_POST['button'];
            $query = "INSERT INTO cart(product_id,user_id) values('$product_id','$username');";
            $result2 = mysqli_query($link, $query);
            if (!$result2 && mysqli_errno($link)!=1062) 
            {
                die('error' . mysqli_errno($link));
                
            }
            if($result2) 
            {
                $_SESSION['msg']="Item Added";
                header("Refresh: 0");
            }
            else if(mysqli_errno($link)==1062)
            {
                $_SESSION['msg']="Item Already Added";
                header("Refresh: 0");

            } 
        }
    }

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
            <li class="icon main"><a href="cart.php"><i class="fas fa-shopping-cart"></i></i>&nbsp Cart</a></li>
        </ul>
    </div>
    <div class="main-container">
        <div class="banner">
            <p>Serach Result for: <?php echo $_GET['item'];
                echo '<br>'; 
            
                if(isset($_SESSION['msg']))
                {
                    echo $_SESSION['msg'];
                }
                ?>
                
            </p>
        </div>
        <div class="header">
            <div class="header-text">ID</div>
            <div class="header-text">Seller</div>
            <div class="header-text">District</div>
            <div class="header-text">State</div>
            <div class="header-text">Weight</div>
            <div class="header-text">Price/kg</div>
            <div class="header-text">Add to Cart</div>
        </div>
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <div class="table-row">
            <div class="text"><?php echo $row['product_id'] ?></div>
            <div class="text"><?php echo $row['product_user'] ?></div>
            <div class="text"><?php echo $row['user_district'] ?></div>
            <div class="text"><?php echo $row['user_state'] ?></div>
            <div class="text"><?php echo $row['weight'] ?></div>
            <div class="text"><?php echo $row['product_pricePkg'] ?></div>
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