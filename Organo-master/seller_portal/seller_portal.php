<?php
    session_start();
    include('../php/config.php');
    $username = $_SESSION['username'];
    $query ="SELECT wallet_amount from user_table where login_id='$username';";
    $result = mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    $_SESSION['wallet']=$row['wallet_amount'];
    

?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/seller.css">
    <script language="Javascript" src="../js/jquery.js"></script>
    <script src="../js/seller.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto|Sacramento" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div class="nav">
        <ul class="navbar-container">
            <li><a href="seller_portal.php"><i class="fas fa-seedling"></i>&nbsp Home</a></li>
            <li><a href="my_items.php"><i class="fas fa-carrot"></i>&nbsp My Items</a></li>
            <li><a class="inactive" href=""><i class="fas fa-user"></i>&nbsp <?php echo " " . $username ?> &nbsp <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown-1">
                    <li><a href="withdraw.php">My Wallet:&nbsp₹<?php echo $_SESSION['wallet'] ?></a></li>
                    <li><a href="../change_details.php">Change My Details</a></li>
                    <li><a href="../change_password.php">Change Password</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main-container">
        <div class="Choice-banner" >
            <p id="top-banner">What would you like to sell?<p>
        </div>
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
                    <div class='item-pic' onclick="input_item('guava','fruit')">
                        <img src="../img/guava.png">
                    </div>
                    <div class='item-desc'>
                        Guava
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('pomegranate','fruit')">
                        <img src="../img/pomegranate.png">
                    </div>
                    <div class='item-desc'>
                        Pomegranate
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('banana','fruit')">
                        <img src="../img/banana.png">
                    </div>
                    <div class='item-desc'>
                        Banana
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('pineapple','fruit')">
                        <img src="../img/pineapple.png">
                    </div>
                    <div class='item-desc'>
                        Pineapple
                    </div>
                </div>
                <div class="item" onclick="input_item('apple','fruit')">
                    <div class='item-pic'>
                        <img src="../img/apple.png">
                    </div>
                    <div class='item-desc'>
                        Apple
                    </div>
                </div>
                <button class="back-btn" onclick="back('fruit','none')">back</button>
            </div>
        </div>
        <div class="Veg-container" id="veg-wrapper">
        <div class="items">
            <div class="item">
                    <div class='item-pic' onclick="input_item('cabbage','veg')">
                        <img src="../img/cabbage.png">
                    </div>
                    <div class='item-desc'>
                        Cabbage
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('carrot','veg')">
                        <img src="../img/carrot.png">
                    </div>
                    <div class='item-desc'>
                        Carrot
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('radish','veg')">
                        <img src="../img/radish.png">
                    </div>
                    <div class='item-desc'>
                        Radish
                    </div>
                </div>
                <div class="item">
                    <div class='item-pic' onclick="input_item('beans','veg')">
                        <img src="../img/beans.png">
                    </div>
                    <div class='item-desc'>
                        Beans
                    </div>
                </div>
                <div class="item" onclick="input_item('Tomato','veg')">
                    <div class='item-pic'>
                        <img src="../img/tomato.png">
                    </div>
                    <div class='item-desc'>
                        Tomato
                    </div>
                </div>
                <button class="back-btn" onclick="back('veg','none')">back</button>
            </div>
        </div>

        <div class="itemprice-container" id="item_price">
            
            <form id="form_id" method="POST" action="../php/add_item_script">
                <input type="hidden" name="item-type" id="item-type">
                <p>Enter the weight(in KG):</p>
                <input class="reg-field" name="amount" id="amount-reg" type="number" placeholder="amount">
                <p>Enter the price per KG:</p>
                <input class="reg-field" name="price" id="price-reg" type="number" placeholder="price">
                <p id="error"></p>
                <span id="suggested-price"></span>
                <button id="REG_button">SUBMIT</button>
                <span id="ajax-msg"></span>
            </form>
            <button class="back-btn" onclick="window.location.reload()">back</button>
        </div>
    </div>
</body>

</html> 