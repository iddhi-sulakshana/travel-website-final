<?php include 'head.php' ?>
	<title>Search For Vehicle</title>
	<link rel="stylesheet" hreflang="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/vehicleSearch.css" type="text/css">
<?php include 'header.php' ?>
	<section class="top-image">Rent a Vehicle</section>
	<section class="advanced-search">
		<h3>Rent Vehicle</h3>
		<form name="advanced-search-form" method="GET" action="vehicle_search.php">
			<div class="form-content">
				<div class="wrapper wrapper0">
					<label for="vehicleType">Vehicle Type</label>
					<select name="vehicleType" class="inputType" required="">
						<option value="">Vehicle Type</option>
						<option value="Car">Car</option>
						<option value="Van">Van</option>
						<option value="Bus">Bus</option>
					</select>
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
				<div class="wrapper wrapper2">
					<label for="seats">seats</label>
					<select name="seats" class="inputType" required="">
						<option value="">Select Seat Count</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="4">4</option>
						<option value="5+">5+</option>
					</select>
				</div>
				<div class="wrapper wrapper3">
					<button type="Submit" value="submit" class="btn-animation icon"><i class="fa fa-search" aria-hidden="true"></i></button>
					<button type="Submit" value="submit" class="btn-animation text">Search</button>
				</div>
			</div>
		</form>
	</section>
	
	<hr>

	<section class="grid-container">
			<div class="main-content">
				<div class="searched-content" id="listingContent">
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/car1.jpg" alt="product image">
						<h3>Rent a Car</h3>
						<h1 class="product-price">$ 4500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/van1.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a car</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/car2.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a 3-Wheel</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/van2.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a Car</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;4</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/van3.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a Bus</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/bus1.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a car</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/car3.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a car</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
					<div class="searched-item">
						<a href="vehicle_view.php">
						<img src="img/Vehicle/car4.jpg" class="product-image" alt="product image">
						<h3 class="product-title">Rent a car</h3>
						<h1 class="product-price">$ 1500.<h2>00</h2></h1>
						<div>
							<p class="details">&#128186;5</p>
							<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> Anuradhapura</p>
							<p class="details"><i class="fa fa-star checked"></i> 4.5</p>
						</div>
						</a>
					</div>
				</div>
			</div>
	</section>
	
	<?php include 'footer.php' ?>
	<script src="js/vehicleSearch.js"></script>
</body>
</html>
