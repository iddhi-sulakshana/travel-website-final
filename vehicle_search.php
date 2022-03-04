	<?php 
		include 'head.php';
		if(isset($_REQUEST['vehicleType']) && trim($_REQUEST['vehicleType']) != ''){
			$vType = htmlspecialchars($_REQUEST['vehicleType']);
		}
		if(isset($_REQUEST['district']) && trim($_REQUEST['district']) != ''){
			$district = htmlspecialchars($_REQUEST['district']);
		}
		if(isset($_REQUEST['seats']) && trim($_REQUEST['seats']) != ''){
			$seat = htmlspecialchars($_REQUEST['seats']);
		}
		include 'dbcon.php';
		$sql = "SELECT `vehicleId`, `vehicleImagePri`, `vehicleName`, `vehiclePrice`, `vehicleSeats`, `vehicleDistrict`, `vehiclePrice`, `vehicleRating` FROM `table_vehicle`";
		if(isset($vType) || isset($district) || isset($seat)){
			$sql .= " WHERE";
			if(isset($vType)){
				$sql .= " vehicleType='" . $vType . "'";
			}
			if(isset($district)){
				$tmpsql = explode(" ", $sql);
				if(end($tmpsql) == "WHERE"){
					$sql .= " vehicleDistrict='" . $district . "'";
				} else{
					$sql .= " AND vehicleDistrict='" . $district . "'";
				}
				unset($tempsql);
			}
			if(isset($seat)){
				$tmpsql = explode(" ", $sql);
				if($seat == '5+'){
					$seat = " > 5";
				} else {
					$seat = "=" . $seat;
				}
				if(end($tmpsql) == "WHERE"){
					$sql .= " vehicleSeats" . $seat;
				} else{
					$sql .= " AND vehicleSeats" . $seat;
				}
				unset($tempsql);
			}
		}
		$conn = OpenCon();
		$result = $conn->query($sql);
		CloseCon($conn);
	?>
	<title>Search For Vehicle</title>
	<link rel="stylesheet" hreflang="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/vehicleSearch.css" type="text/css">
	<?php include 'header.php' ?>
	<section class="top-image">Rent a Vehicle</section>
	<section class="advanced-search">
		<h3>Rent Vehicle</h3>
		<form name="advanced-search-form" method="POST" action="vehicle_search.php">
			<div class="form-content">
				<div class="wrapper wrapper0">
					<label for="vehicleType">Vehicle Type</label>
					<select name="vehicleType" class="inputType">
						<option value="">Vehicle Type</option>
						<option value="Car" >Car</option>
						<option value="Van">Van</option>
						<option value="Bus">Bus</option>
					</select>
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
				<div class="wrapper wrapper2">
					<label for="seats">seats</label>
					<select name="seats" class="inputType">
						<option value="">Select Seat Count</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
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
					<?php
						if($result->num_rows > 0){
							foreach ($result as $resultItem){ ?>
								<div class="searched-item">
									<a href="vehicle_view.php?VId=<?php echo $resultItem['vehicleId'] ?>">
									<img src="img/Vehicle/<?php echo $resultItem['vehicleImagePri'] ?>" alt="product image">
									<h3><?php echo $resultItem['vehicleName'] ?></h3>
									<h1 class="product-price">Rs. <?php echo $resultItem['vehiclePrice'] ?></h1>
									<div>
										<p class="details">&#128186;<?php echo $resultItem['vehicleSeats'] ?></p>
										<p class="details"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $resultItem['vehicleDistrict'] ?></p>
										<p class="details"><i class="fa fa-star checked"></i> <?php echo $resultItem['vehicleRating'] ?></p>
									</div>
									</a>
								</div>
						<?php 
							}
						}
						else{
							echo "<h1>No Results</h1>";
						}
					?>
				</div>
			</div>
	</section>
	
	<?php 
		include 'footer.php';
		include 'messageDisplay.php';	
	?>
	<script src="js/vehicleSearch.js"></script>
</body>
</html>
