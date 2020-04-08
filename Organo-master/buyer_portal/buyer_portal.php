<?php
    session_start();
    unset($_SESSION['msg']);
    if(isset($_SESSION['username']) && $_SESSION['username']!=='GUEST')
    {
        $username = $_SESSION['username'];
        
    }
    else
    {
        $_SESSION['username'] = "GUEST";
        $username = $_SESSION['username'];
        echo "<script src='../js/buyer.js'> </script>";
        echo "<script> var guest_session=true;</script>";
    }   
    $query = http_build_query($_GET);
    // echo $query;
    if ($query!="")
    {
        header('location: searchitem.php'."?".$query);
        $_GET=array();

    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/buyer.css">
    <script language="Javascript" src="../js/jquery.js"></script>
    <script src="../js/buyer.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto|Sacramento" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <div class="nav">
        <ul class="navbar-container" id='ad'>
            <li><a href="buyer_portal.php"><i class="fas fa-seedling"></i>&nbsp Home</a></li>
            <li><a id="cart-btn" href="cart.php"><i class="fas fa-shopping-cart"></i></i>&nbsp Cart</a></li>
            <li><a class="inactive" href=""><i class="fas fa-user"></i>&nbsp <?php echo " " . $username ?> &nbsp <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-1">
                    <li id="details-btn"><a href="../change_details.php">Change My Details</a></li>
                    <li id="password-btn"><a href="../change_password.php">Change Password</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main-container">
        <div class="Choice-banner" >
            <p id="top-banner">What would you like to Buy?<p>
        </div>
        <form id="item-form" class="form-wrapper" method="GET">
            <div class="Choice-containter" id="choice-wrapper">
                <div class="Choice Fruit">
                    <div class="pic" onclick="load_fruit()">
                        <img src="../img/fruit_trans.png">
                    </div>
                    <div class="about_pic">
                        <p>Fruit</p>
                    </div>
                </div>
                <div class="Choice Vegetable">
                    <div class="pic" onclick="load_veg()">
                        <img src="../img/vegt.png">
                    </div>
                    <div class="about_pic">
                        <p>Vegetable</p>
                    </div>
                </div>
            </div>
        
            <div class="Fruit-container" id="fruit-wrapper">
                <div class="items">
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('guava')">
                            <img src="../img/guava.png">
                        </div>
                        <div class='item-desc'>
                            Guava
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('pomegranate')">
                            <img src="../img/pomegranate.png">
                        </div>
                        <div class='item-desc'>
                            Pomegranate
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('banana')">
                            <img src="../img/banana.png">
                        </div>
                        <div class='item-desc'>
                            Banana
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('pineapple')">
                            <img src="../img/pineapple.png">
                        </div>
                        <div class='item-desc'>
                            Pineapple
                        </div>
                    </div>
                    <div class="item" onclick="submit_form('apple')">
                        <div class='item-pic'>
                            <img src="../img/apple.png">
                        </div>
                        <div class='item-desc'>
                            Apple
                        </div>
                    </div>
                    <div class="back-btn" onclick="back('fruit','none')">back</div>
                </div>
            </div>
            <div class="Veg-container" id="veg-wrapper">
            <div class="items">
                <div class="item">
                        <div class='item-pic' onclick="submit_form('cabbage')">
                            <img src="../img/cabbage.png">
                        </div>
                        <div class='item-desc'>
                            Cabbage
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('carrot')">
                            <img src="../img/carrot.png">
                        </div>
                        <div class='item-desc'>
                            Carrot
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('radish')">
                            <img src="../img/radish.png">
                        </div>
                        <div class='item-desc'>
                            Radish
                        </div>
                    </div>
                    <div class="item">
                        <div class='item-pic' onclick="submit_form('beans')">
                            <img src="../img/beans.png">
                        </div>
                        <div class='item-desc'>
                            Beans
                        </div>
                    </div>
                    <div class="item" onclick="submit_form('tomato')">
                        <div class='item-pic'>
                            <img src="../img/tomato.png">
                        </div>
                        <div class='item-desc'>
                            Tomato
                        </div>
                    </div>
                    <div class="back-btn" onclick="back('veg','none')">back</div>
                </div>
                <input id="item-type" name="item" type="hidden">
            </div>
        </form>
    </div>
</body>
<script>
if(guest_session===true)
{
    var details_change = document.getElementById('details-btn');
    var password_change = document.getElementById('password-btn');
    var cart = document.getElementById('cart-btn');
    details_change.style.display = 'none';
    password_change.style.display = 'none';
    cart.href='../login.php';
    console.log('Guest Session Initalised');
}
</script>

</html>