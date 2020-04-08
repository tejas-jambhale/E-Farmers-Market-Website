<?php   
    session_start();
    include('php/register_script.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Organo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script language="Javascript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src='js/state.js'></script>
</head>

<body>
    <div class="nav">
        <ul class="navbar-container" id="navbar">
            <li class="icon main"><a href="index.php"><i class="fas fa-seedling"></i> Home</a></li>
        </ul>
    </div>
    <div id="container">
        <div id="about_box">
            <div id="icon_box">
                <i class="fas fa-seedling"></i>
                <P>Organo</P>
            </div>
        </div>
        <div id="signup_box">
            <form id="form_id" method="POST" action="#">
                <p>Select your service:</p>
                <select name="type" class="choices">
                    <option selected value="S">Seller</option>
                    <option value="B">Buyer</option>
                </select>
                <p>Enter your Name:</p>
                <input class="reg-field" name="name" type="text" placeholder="Name">
                <p>Enter your Age</p>
                <input class="reg-field" name="age" id="password" type="number" placeholder="age">
                <p>Enter your Email:</p>
                <input class="reg-field" name="email" type="email" placeholder="Email">
                <p>Enter your Street:</p>
                <input class="reg-field" name="street" type="text" placeholder="Street">
                <p>Select your State:</p>
                <select class="choices" name="state" id="listBox" onchange='selct_district(this.value)'></select>
                <p>Select your District:</p>
                <select class="choices" name="district" id='secondlist'></select>
                <p id="error"></p>
                <button id="REG_button">REGISTER</button>
                <span>
                    <?php
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                        }
                    ?>
                </span>
            </form>
        </div>
    </div>
</body>