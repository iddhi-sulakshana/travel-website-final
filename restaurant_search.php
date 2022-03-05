<?php 
		include 'head.php';
		if(isset($_REQUEST['restaurantname']) && trim($_REQUEST['restaurantname']) != ''){
			$restname = htmlspecialchars($_REQUEST['restaurantname']);
		}
		if(isset($_REQUEST['district']) && trim($_REQUEST['district']) != ''){
			$district = htmlspecialchars($_REQUEST['district']);
		}
		include 'dbcon.php';
		$sql = "SELECT `restaurantId`, `restaurantImagePri`, `restaurantName`, `restaurantPrice`, `restaurantDistrict`, `restaurantRating` FROM `table_restaurant`";
		if(isset($restname) || isset($district)){
			$sql .= " WHERE";
			if(isset($restname)){
				$sql .= " restaurantName LIKE '%" . $restname . "%'";
			}
			if(isset($district)){
				$tmpsql = explode(" ", $sql);
				if(end($tmpsql) == "WHERE"){
					$sql .= " restaurantDistrict='" . $district . "'";
				} else{
					$sql .= " AND restaurantDistrict='" . $district . "'";
				}
				unset($tempsql);
			}
		}
		$conn = OpenCon();
		$result = $conn->query($sql);
		CloseCon($conn);
	?>
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
		<form name="advanced-search-form" method="POST" action="restaurant_search.php">
			<div class="form-content">
				<div class="wrapper wrapper0">
					<label for="restaurantname">Restaurant Name</label>
					<input type="text" name="restaurantname" placeholder="Restaurants Name.">
				</div>
				<div class="wrapper wrapper1">
					<label for="district">District</label>
					<select name="district" class="inputType">
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
				<?php
				if($result->num_rows > 0){
					foreach ($result as $item) { ?>
						<div class="searched-item">
							<a href="restaurant_view.php?RId=<?php echo $item['restaurantId'] ?>">
								<img src="img/Restaurant/<?php echo $item['restaurantImagePri'] ?>">
								<h3><?php echo $item['restaurantName'] ?></h3>
								<h1 class="product-price">&#128101; <?php echo $item['restaurantPrice'] ?></h1>
								<div>
									<p class="details">$$$-$$$$</p>
									<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $item['restaurantDistrict'] ?></p>
									<p class="details"><i class="fa fa-star checked"></i> <?php echo $item['restaurantRating'] ?></p>
								</div>
							</a>
						</div>
				<?php	
					}
				} else {
					echo "<h1>No Result</h1>";
				}
				?>
			</div>
		</div>
	</section>


	<?php include 'footer.php';
		include 'messageDisplay.php';	 ?>
	<script src="js/restaurantSearch.js"></script>
</body>

</html>