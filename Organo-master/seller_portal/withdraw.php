<?php
     session_start();
     include('../php/config.php');


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
    <div class="main-wrapper">
        <div class="withdraw-wrapper">
            <form method="POST" class="form-container" action='../php/withdraw.php'> 
             <h1>Do you want to widthdraw?</h1>
             <h2>The amount of: <?php echo $_SESSION['wallet'] ?></h2>
             <button class='withdraw-btn'>Withdraw</button>
            </form>
        </div>
    </div>
</body>
</html>