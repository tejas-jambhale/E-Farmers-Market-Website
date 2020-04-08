<!DOCTYPE html>
<html>
	<head>
		<title>Organo</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="js/main.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Arvo|Roboto|Sacramento" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body>
		
		<div class="nav">	
			<ul class="navbar-container" id="navbar">
				<li class="icon main"><a onclick="scroll_to_top()"><i class="fas fa-seedling"></i> Farmer's E-Market</a></li>
				<li><a onclick="scroll_to_about()"><i class="fas fa-info"></i> About Us</a></li>
				<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
				<li id="sign_up-btn"><a href="sign_up.php" id="Signup"><i class="fas fa-plus-square"></i> Signup</a></li>
				<li class="icon ham"><a id="ham" href="javascript:void(0);"  onclick="menu()">
					<i class="fas fa-bars"></i>
				</a>
				</li>
			</ul>
		</div>
		<div id="container">
			<div id="welcome_div">
				<div id="select_user_div">
					<div id="welcome_message">
						<p>Welcome! What are you looking for?</p>
					</div>
					<div id="user_type">
						<div id="user_seller">
							<div class="pic"  >	
								<a href="login.php"><img src="img/seller.png"></a>
							</div>
							<div class="about_pic">
								<p>Sell</p>
							</div>
						</div>
						<div id="user_buyer">
							<div class="pic">
								<a href="buyer_portal/buyer_portal.php"><img src="img/buyer.png"></a>
							</div>
							<div class="about_pic">
								<p>Buy</p>
							</div>
						</div>	
					</div>
				</div>
				<div id="text_div">
					<div id="text_wrapper">
						<p>Farmers' E-Market aims to replace the middle man when it comes to farm produce and instead aims to connect the customer directly to the producer, at the best rates!
						</p>
					</div>
				</div>
				<div id="about_container">
					<div id="quote_div">
						<p>
							To give real service you must add something which cannot be bought or measured with money, and that is sincerity and
							integrity -Douglas Adams
						</p>
					</div>
					<div id="about_us">
						<p>
							We are a team based in Tamil Nadu that's to aims to support farmers in a symbiotic manner, freeing them from being exploited by middle-men who extort them for
							profit. As well as freeing the consumer from being exploited by the monopoly of the middle-men, by enabling our users to buy produce at a lower price than from the market.
						<br><br>
							We aim to be the pioneer medium through which farmers can sell their produce.

						<br><br>
							Our code, is only to deliver the best, at the best prices and with the highest degree of transprancy and integrity.
						</p>
					</div>
					<div id="contact_us">
						<p>
							Find us at:
						</p>
						<a href="https://www.facebook.com/Farmers-E-Market-103347184420350/"><i class="fab fa-facebook"></i></a>
						<a href="#"><i class="fab fa-twitter-square"></i></a>
						<a href="#"><i class="fab fa-youtube"></i></a>
						<a href="#"><i class="fab fa-reddit-square"></i></a>
					</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>
