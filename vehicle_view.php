<?php
	include 'dbcon.php';
	if(is_null($_REQUEST['VId']) || $_REQUEST['VId'] <= 0){
		header('Location: vehicle_search.php');
		exit();
	}
	$vid = htmlspecialchars($_REQUEST['VId']);
	
	$sqlvehicle = "SELECT * FROM `table_vehicle` WHERE `vehicleId` = " . $vid;
	$sqlrating = "SELECT `table_vehiclereview`.*, `table_user`.firstName, `table_user`.lastName, `table_user`.userImg FROM `table_vehiclereview` INNER JOIN `table_user` ON `table_user`.`userId` = `table_vehiclereview`.`userId` WHERE `vehicleId` = " . $vid;

	$conn = OpenCon();

	$resultvehicle = $conn->query($sqlvehicle);
	$resultrating = $conn->query($sqlrating);
	$sql = "SELECT COUNT(`rate`) AS 'Count' FROM `table_vehiclereview` WHERE `vehicleId` = " . $vid . " AND `rate` = ";
	$count5 = $conn->query($sql . "5");
	$count4 = $conn->query($sql . "4");
	$count3 = $conn->query($sql . "3");
	$count2 = $conn->query($sql . "2");
	$count1 = $conn->query($sql . "1");
	$count5 = $count5->fetch_assoc();
	$count4 = $count4->fetch_assoc();
	$count3 = $count3->fetch_assoc();
	$count2 = $count2->fetch_assoc();
	$count1 = $count1->fetch_assoc();
	CloseCon($conn);
	if($resultvehicle->num_rows < 1){
		header('Location: vehicle_search.php');
		exit();
	}
	include 'head.php';
	$vehicleRow = $resultvehicle->fetch_assoc();
	if(isset($_SESSION['Id'])){
		$uid = htmlspecialchars($_SESSION['Id']);
		foreach ($resultrating as $sqlratingresult) {
			if($sqlratingresult['userId'] == $uid){
				$currentUserReview = $sqlratingresult;
				break;
			}
		}
	}
?>
	<title><?php echo $vehicleRow['vehicleName'] ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/vehicleView.css" type="text/css">
	<?php include 'header.php' ?>
	<section class="grid-container">
		<div class="grid-images">
			<img id="main-image" src="img/Vehicle/<?php echo $vehicleRow['vehicleImagePri'] ?>" alt="image display">
			<img src="img/Vehicle/<?php echo $vehicleRow['vehicleImagePri'] ?>"  class="sub-image">
			<?php 
				if(!(is_null($vehicleRow['vehicleImage1']))){
					echo '<img src="img/Vehicle/' . $vehicleRow['vehicleImage1'] . '"  class="sub-image">';
				}
				if(!(is_null($vehicleRow['vehicleImage2']))){
					echo '<img src="img/Vehicle/' . $vehicleRow['vehicleImage2'] . '"  class="sub-image">';
				}
				if(!(is_null($vehicleRow['vehicleImage3']))){
					echo '<img src="img/Vehicle/' . $vehicleRow['vehicleImage3'] . '"  class="sub-image">';
				}
			?>
		</div>
		<div>
			<div class="grid-details">
			<h1><?php echo $vehicleRow['vehicleName'] ?></h1>
			<p>Location	: <?php echo $vehicleRow['vehicleAddress'] ?> <i class="fa fa-map-marker" style="color: red" aria-hidden="true"></i> </p>
			<p>Seats		: <?php echo $vehicleRow['vehicleSeats'] ?> &#128186;</p>
			<p class="button price">Rs. <?php echo $vehicleRow['vehiclePrice'] ?> / day</p>
				<div class="buttons">
					<a href="tel:<?php echo $vehicleRow['vehiclePhoneNo'] ?>"><button class="button"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $vehicleRow['vehiclePhoneNo'] ?></button></a>
					<a href="<?php echo $vehicleRow['vehicleWebsite'] ?>" target="_blank"><button class="button"><i class="fa fa-link" aria-hidden="true"></i> Website</button></a>
					<a href="<?php echo $vehicleRow['vehicleMap'] ?>"><button class="button"><i class="fa fa-street-view" aria-hidden="true"></i> Google Map</button></a>
				</div>
		</div>
		</div>
		<div class="description">
			<p><?php echo $vehicleRow['vehicleDescription'] ?></p>
		</div>
		<div class="review-overview">
			<h3>Review Overview</h3>
			<div class="rating-details">
			<p><b><?php echo $vehicleRow['vehicleRating'] ?></b></p>
				<p>/5</p>
				<p>
				<?php
				$full = 0;
				$half = 0;
				if($vehicleRow['vehicleRating'] > 4.5){
					$full = 5;
				} else if($vehicleRow['vehicleRating'] > 4.0){
					$full = 4;	$half = 1;
				} else if($vehicleRow['vehicleRating'] > 3.5){
					$full = 4;
				} else if($vehicleRow['vehicleRating'] > 3.0){
					$full = 3;	$half = 1;
				} else if($vehicleRow['vehicleRating'] > 2.5){
					$full = 3;
				} else if($vehicleRow['vehicleRating'] > 2.0){
					$full = 2;	$half = 1;
				} else if($vehicleRow['vehicleRating'] > 1.5){
					$full = 2;
				} else if($vehicleRow['vehicleRating'] > 1.0){
					$full = 1;	$half = 1;
				} else if($vehicleRow['vehicleRating'] > 0.5){
					$full = 1;
				} else if($vehicleRow['vehicleRating'] > 0){
					$half = 1;
				}
				$i = $full;
				while($i > 0 ){
					echo '<i class="fa fa-star"></i> ';
					$i--;
				}
				if($half == 1){
					echo '<i class="fa fa-star-half-full"></i> ';
					$full++;
				}
				$i = $full;
				while($i < 5){
					echo '<i class="fa fa-star-o"></i> ';
					$i++;
				}
				?>
				</p>
				<p><?php echo ($resultrating->num_rows > 0) ? $resultrating->num_rows : "No" ?> ratings</p>
			</div>
			<div class="seperate-rating">
			<?php $numrows = ($resultrating->num_rows > 0) ? $resultrating->num_rows : 1; ?>					
				<div class="rate-wrapper">
					<p>5 <i class="fa fa-star"></i></p>
					<div class="rating">
						<div class="rating-value" style="width: <?php echo ($count5['Count'] / $numrows) * 100 ?>%;"></div>
					</div>
					<p><?php echo $count5['Count'] ?></p>
				</div>
				<div class="rate-wrapper">
					<p>4 <i class="fa fa-star"></i></p>
					<div class="rating">
						<div class="rating-value" style="width: <?php echo ($count4['Count'] / $numrows) * 100 ?>%;"></div>
					</div>
					<p><?php echo $count4['Count'] ?></p>
				</div>
				<div class="rate-wrapper">
					<p>3 <i class="fa fa-star"></i></p>
					<div class="rating">
						<div class="rating-value" style="width: <?php echo ($count3['Count'] / $numrows) * 100 ?>%;"></div>
					</div>
					<p><?php echo $count3['Count'] ?></p>
				</div>
				<div class="rate-wrapper">
					<p>2 <i class="fa fa-star"></i></p>
					<div class="rating">
						<div class="rating-value" style="width: <?php echo ($count2['Count'] / $numrows) * 100 ?>%;"></div>
					</div>
					<p><?php echo $count2['Count'] ?></p>
				</div>
				<div class="rate-wrapper">
					<p>1 <i class="fa fa-star"></i></p>
					<div class="rating">
						<div class="rating-value" style="width: <?php echo ($count1['Count'] / $numrows) * 100 ?>%;"></div>
					</div>
					<p><?php echo $count1['Count'] ?></p>
				</div>
			</div>
		</div>
		
		<div class="grid-review">
			<?php
			if($resultrating->num_rows > 0){
				foreach ($resultrating as $sqlratingresult) { ?>
					<div class="review">
						<img src="img/User/<?php echo $sqlratingresult['userImg'] ?>" alt="user">
						<p><?php echo $sqlratingresult['message'] ?></p>
						<p><?php echo $sqlratingresult['firstName'] . " " . $sqlratingresult['lastName'] ?></p>
						<p><?php echo $sqlratingresult['rate'] ?>
							<i class="<?php echo ($sqlratingresult['rate'] >= 1)? "fa fa-star" : "fa fa-star-o" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 2)? "fa fa-star" : "fa fa-star-o" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 3)? "fa fa-star" : "fa fa-star-o" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 4)? "fa fa-star" : "fa fa-star-o" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 5)? "fa fa-star" : "fa fa-star-o" ?>"></i>
						</p>
					</div>
				<?php }
			} else {
				echo "No Result";
			}				
			?>
		</div>
		<div class="submit-review-container">
			<?php
				if(isset($_SESSION['logged'])){
					$displayalert = 'none';
					$displayform = 'initial'; 
				}else{
					$displayalert = 'flex';
					$displayform = 'none'; 
				}
			?>
			<div class="alert-login" style="display:<?php echo $displayalert ?>;">
				<h1>Please Login to Submit Review</h1>
				<a href="login.php" class="login"><button class="btn-animation">Login</button></a>
			</div>
			<form action="submitvehiclereview.php?VId=<?php echo $vid ?>" name="review_submit" method="POST" style="display:<?php echo $displayform ?>">
				<div class="submit-review">
					<div class="star-container">
						<?php
							$rate = '0';
							if(isset($currentUserReview)){
								switch($currentUserReview['rate']){
									case '1': $rate = '1';break;
									case '2': $rate = '2';break;
									case '3': $rate = '3';break;
									case '4': $rate = '4';break;
									case '5': $rate = '5';break;
								}
							}
						?>
						<input type="radio" name="rate" value="5" id="rate-5" required <?php echo ($rate == '5') ? "checked" : '' ?>>
						<label for="rate-5" class="fa fa-star"></label>
						<input type="radio" name="rate" value="4" id="rate-4" required <?php echo ($rate == '4') ? "checked" : '' ?>>
						<label for="rate-4" class="fa fa-star"></label>
						<input type="radio" name="rate" value="3" id="rate-3" required <?php echo ($rate == '3') ? "checked" : '' ?>>
						<label for="rate-3" class="fa fa-star"></label>
						<input type="radio" name="rate" value="2" id="rate-2" required <?php echo ($rate == '2') ? "checked" : '' ?>>
						<label for="rate-2" class="fa fa-star"></label>
						<input type="radio" name="rate" value="1" id="rate-1" required <?php echo ($rate == '1') ? "checked" : '' ?>>
						<label for="rate-1" class="fa fa-star"></label>
					</div>
					<div class="head-message"><?php echo (isset($currentUserReview)) ? "Update Review" : "Review" ?></div>
					<textarea name="usermessage" maxlength="50" rows="5" placeholder="Say how's you feel about this" required><?php 
					if(isset($_REQUEST['umessage'])){
						echo htmlspecialchars($_REQUEST['umessage']);
					} else if(isset($currentUserReview)){
						echo htmlspecialchars($currentUserReview['message']);
					}
					?></textarea>
					<input type="submit" class="btn-animation" value="<?php echo (isset($currentUserReview)) ? "Update" : "Post" ?>">
				</div>
			</form>
		</div>
	</section>
	
	<?php include 'footer.php' ?>

	<?php include 'messageDisplay.php' ?>
	<script src="js/vehicleView.js"></script>
</body>
</html>
