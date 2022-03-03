<?php include 'head.php' ?>
	<title>Search For Restaurants</title>
	<link rel="stylesheet" hreflang="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/restaurantSearch.css" type="text/css">
<?php include 'header.php' ?>
	<div class="header-img-container">
		<div class="responsive">
			<img class="header-img" src="img/Restaurant/headimg.png">
			<div class="centered">Grab the BEST BITE with us</div>
		</div>
	</div>

	<section class="advanced-search">
		<h3>Search Restaurant</h3>
		<form name="advanced-search-form" method="GET" action="restaurant_search.php">
			<div class="form-content">
				<div class="wrapper wrapper0">
					<label for="location">Location</label>
					<input type="text" name="location" placeholder="City, Hotel, Restaurants, etc." required="">
				</div>
				<div class="wrapper wrapper1">
					<label for="district">District</label>
					<select name="district" class="inputType" required="">
						<option value="">Select District</option>
						<option value="Ampara">Ampara</option>
						<option value="Anuradhapura">Anuradhapura</option>
						<option value="Badulla">Badulla</option>
						<option value="Batticaloa">Batticaloa</option>
						<option value="Colombo">Colombo</option>
						<option value="Galle">Galle</option>
						<option value="Gampaha">Gampaha</option>
						<option value="Hambantota">Hambantota</option>
						<option value="Jaffna">Jaffna</option>
						<option value="Kalutara">Kalutara</option>
						<option value="Kandy">Kandy</option>
						<option value="Kegalle">Kegalle</option>
						<option value="Kilinochchi">Kilinochchi</option>
						<option value="Kurunegala">Kurunegala</option>
						<option value="Mannar">Mannar</option>
						<option value="Matale">Matale</option>
						<option value="Matara">Matara</option>
						<option value="Moneragala">Moneragala</option>
						<option value="Mullaitivu">Mullaitivu</option>
						<option value="Nuwara Eliya">Nuwara Eliya</option>
						<option value="Polonnaruwa">Polonnaruwa</option>
						<option value="Puttalam">Puttalam</option>
						<option value="Ratnapura">Ratnapura</option>
						<option value="Trincomalee">Trincomalee</option>
						<option value="Vavuniya">Vavuniya</option>
					</select>	
				</div>
				<div class="wrapper wrapper3">
					<button type="Submit" value="submit" class="btn-animation icon"><i class="fa fa-search"
							aria-hidden="true"></i></button>
					<button type="Submit" value="submit" class="btn-animation text">Search</button>
				</div>
			</div>
		</form>
	</section>
	<section class="grid-container">
		<div class="main-content">
			<div class="searched-content grid-view" id="listingContent">
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant1.jpg">
						<h3>Gallery Café</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant2.webp">
						<h3>Hilton</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant3.jpg">
						<h3>Curry Leaf</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant4.jpg">
						<h3>Seafood Cove</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant5.jpg">
						<h3>Ministry of Crab</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant6.jpg">
						<h3>Graze Kitchen</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant7.jpg">
						<h3>Monsoon</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant1.jpg">
						<h3>Gallery Café</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant2.webp">
						<h3>Hilton</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant3.jpg">
						<h3>Curry Leaf</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant4.jpg">
						<h3>Seafood Cove</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
				<div class="searched-item">
					<a href="restaurant_view.php">
						<img src="img/Restaurant/restaurant5.jpg">
						<h3>Ministry of Crab</h3>
						<div>
							<p class="details">10AM-12AM</p>
						</div>
						<h1 class="product-price">&#128101; 2500LKR</h1>
						<div>
							<p class="details">$$$-$$$$</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Colombo</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>


	<?php include 'footer.php' ?>
	<script src="js/restaurantSearch.js"></script>
</body>

</html>