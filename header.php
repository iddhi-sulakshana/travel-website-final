</head>
<body>
	<header>
		<a href="index.php"><img src="img/main/logo.png" class="main-logo" alt="logo"></a>
		<nav>
			<ul class="nav_link">
				<li><a href="index.php">Home</a></li>
				<li><a href="hotel_search.php">Hotels</a></li>
				<li><a href="vehicle_search.php">Vehicles</a></li>
				<li><a href="restaurant_search.php">Restaurants</a></li>
				<li><a href="packages.php">Packages</a></li>
				<li><a href="notice.php">Notices</a></li>
				<li><a href="attraction.php">Attraction</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<?php
					if(isset($_SESSION['logged'])){
						echo '<li><a href="profile.php" class="login"><button class="btn-animation">Account</button></a></li>';
					}else{
						echo '<li><a href="login.php" class="login"><button class="btn-animation">Login</button></a></li>';
					}
				?>
			</ul>
		</nav>
		<div class="burger">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
		</div>
	</header>
	<hr>