<?php
    session_start();
    if(session_destroy())
    {
        header("Refresh: 3; url=index.php");
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arvo|Roboto|Sacramento" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="css/logout.css">
</head>
<body>
    <div class='main-container'>
        <div class='banner'>
            <h1>Logging you out,Please wait</h1>
        </div>
        <div class='loading-container'>
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
</body>
</html>