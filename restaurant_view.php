<?php
	include 'dbcon.php';
	if(is_null($_REQUEST['RId']) || $_REQUEST['RId'] <= 0){
		header('Location: restaurant_search.php');
		exit();
	}
	$rid = htmlspecialchars($_REQUEST['RId']);
	
	$sqlrestaurant = "SELECT * FROM `table_restaurant` WHERE `restaurantId` = " . $rid;
	$sqlrating = "SELECT `table_restaurantreview`.*, `table_user`.firstName, `table_user`.lastName, `table_user`.userImg FROM `table_restaurantreview` INNER JOIN `table_user` ON `table_user`.`userId` = `table_restaurantreview`.`userId` WHERE `restaurantId` = " . $rid;

	$conn = OpenCon();

	$resultrestaurant = $conn->query($sqlrestaurant);
	$resultrating = $conn->query($sqlrating);
	$sql = "SELECT COUNT(`rate`) AS 'Count' FROM `table_restaurantreview` WHERE `restaurantId` = " . $rid . " AND `rate` = ";
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
	if($resultrestaurant->num_rows < 1){
		header('Location: restaurant_search.php');
		exit();
	}
	include 'head.php';
	$restaurantRow = $resultrestaurant->fetch_assoc();
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
	<title><?php echo $restaurantRow['restaurantName'] ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/restaurantView.css" type="text/css">
<?php include 'header.php' ?>
	<section class="grid-container">
		<div class="grid-images">
			<img id="main-image" src="img/restaurant/<?php echo $restaurantRow['restaurantImagePri'] ?>" alt="image display">
			<img src="img/restaurant/<?php echo $restaurantRow['restaurantImagePri'] ?>"  class="sub-image">
			<?php 
				if(!(is_null($restaurantRow['restaurantImage1']))){
					echo '<img src="img/restaurant/' . $restaurantRow['restaurantImage1'] . '"  class="sub-image">';
				}
				if(!(is_null($restaurantRow['restaurantImage2']))){
					echo '<img src="img/restaurant/' . $restaurantRow['restaurantImage2'] . '"  class="sub-image">';
				}
				if(!(is_null($restaurantRow['restaurantImage3']))){
					echo '<img src="img/restaurant/' . $restaurantRow['restaurantImage3'] . '"  class="sub-image">';
				}
			?>
			</div>
		<div>
			<div class="grid-details">
			<h1><?php echo $restaurantRow['restaurantName'] ?></h1>
			<p><b>Cuisine:</b> <?php echo $restaurantRow['restaurantMenu'] ?></p>
			<p><b>Address:</b> <?php echo $restaurantRow['restaurantAddress'] ?> <i class="fa fa-map-marker" style="color: red" aria-hidden="true"></i> </p>
			<p><b>Price Range:</b> <?php echo $restaurantRow['restaurantPrice'] ?> <i class="fa fa-money" style="color: green" aria-hidden="true"></i></p><br><br><br>
				<div class="buttons">
				<a href="tel:<?php echo $restaurantRow['restaurantPhoneNo'] ?>"><button class="button"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $restaurantRow['restaurantPhoneNo'] ?></button></a>
					<a href="<?php echo $restaurantRow['restaurantWebsite'] ?>" target="_blank"><button class="button"><i class="fa fa-link" aria-hidden="true"></i> Website</button></a>
					<a href="<?php echo $restaurantRow['restaurantMap'] ?>"><button class="button"><i class="fa fa-street-view" aria-hidden="true"></i> Google Map</button></a>
				</div>
		</div>
		</div>

		<div class="description">
			<p><b>About</b></p>
			<p><?php echo $restaurantRow['restaurantDescription'] ?></p>
		</div>
		<div class="review-overview">
			<h3>Review Overview</h3>
			<div class="rating-details">
			<p><b><?php echo $restaurantRow['restaurantRating'] ?></b></p>
				<p>/5</p>
				<p>
				<?php
				$full = 0;
				$half = 0;
				if($restaurantRow['restaurantRating'] > 4.5){
					$full = 5;
				} else if($restaurantRow['restaurantRating'] > 4.0){
					$full = 4;	$half = 1;
				} else if($restaurantRow['restaurantRating'] > 3.5){
					$full = 4;
				} else if($restaurantRow['restaurantRating'] > 3.0){
					$full = 3;	$half = 1;
				} else if($restaurantRow['restaurantRating'] > 2.5){
					$full = 3;
				} else if($restaurantRow['restaurantRating'] > 2.0){
					$full = 2;	$half = 1;
				} else if($restaurantRow['restaurantRating'] > 1.5){
					$full = 2;
				} else if($restaurantRow['restaurantRating'] > 1.0){
					$full = 1;	$half = 1;
				} else if($restaurantRow['restaurantRating'] > 0.5){
					$full = 1;
				} else if($restaurantRow['restaurantRating'] > 0){
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
				<p><?php echo ($resultrating->num_rows > 0) ? $resultrating->num_rows : "No" ?> Reviews</p>
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
					$displayalert = 'initial';
					$displayform = 'none'; 
				}
			?>
			<div class="alert-login" style="display:<?php echo $displayalert ?>;">
				<h1>Please Login to Submit Review</h1>
				<a href="login.php" class="login"><button class="btn-animation">Login</button></a>
			</div>
			<form action="submitrestaurantreview.php?RId=<?php echo $rid ?>" name="review_submit" method="POST" style="display:<?php echo $displayform ?>">
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
	<script src="js/restaurantView.js"></script>
</body>
</html>