<?php
    session_start();
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
    <script src="js/change_password.js"></script>
</head>
<body> 
    <div class="nav"> 
        <ul class="navbar-container" id="navbar">
            <li class="icon main"><a href="seller_portal/seller_portal.php"><i class="fas fa-seedling"></i> Home</a></li>
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
            <form id="form_id" method="POST" action="php/change_password_script.php">
                <p>Enter your Current Password:</p>
                <input class="reg-field" name="password_current" id="username" type="password" placeholder="Password">
                <p>Enter your New Password:</p>
                <input class="reg-field" name="password" id="password" type="password" placeholder="Password">
                <p>Confirm your Password:</p>
                <input class="reg-field" name="con_password" id="con_password" type="password" placeholder="Password">
                <p id="error"></p>
                <p id="error2"></p>
                <?php
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                        }
                ?>
                <button id="REG_button">Register</button>
            </form>
        </div>
    </div>
</body>
</html>