<?php
	include 'dbcon.php';
	if(is_null($_REQUEST['HId']) || $_REQUEST['HId'] <= 0){
		header('Location: hotel_search.php');
		exit();
	}
	$hid = htmlspecialchars($_REQUEST['HId']);
	
	$sqlhotel = "SELECT * FROM `table_hotel` WHERE `hotelId` = " . $hid;
	$sqlrating = "SELECT `table_hotelreview`.*, `table_user`.firstName, `table_user`.lastName, `table_user`.userImg FROM `table_hotelreview` INNER JOIN `table_user` ON `table_user`.`userId` = `table_hotelreview`.`userId` WHERE `hotelId` = " . $hid;

	$conn = OpenCon();

	$resulthotel = $conn->query($sqlhotel);
	$resultrating = $conn->query($sqlrating);
	$sql = "SELECT COUNT(`rate`) AS 'Count' FROM `table_hotelreview` WHERE `hotelId` = " . $hid . " AND `rate` = ";
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
	if($resulthotel->num_rows < 1){
		header('Location: hotel_search.php');
		exit();
	}
	include 'head.php';
	$hotelRow = $resulthotel->fetch_assoc();
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
    <title><?php echo $hotelRow['hotelName'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/hotelView.css">
<?php include 'header.php' ?>
    <!-- Main header -->
    <div class="heading">
        <h1><b><?php echo $hotelRow['hotelName'] ?></b></h1>
        <br>
        <h4><?php echo $hotelRow['hotelAddress'] ?></h4>
        <font color="orange" size="5"><?php echo explode(".", $hotelRow['hotelRating'])[0]; ?>
            <?php $rate = $hotelRow['hotelRating']; ?>
            <i class="<?php echo ($rate >= 1) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
            <i class="<?php echo ($rate >= 2) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
            <i class="<?php echo ($rate >= 3) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
            <i class="<?php echo ($rate >= 4) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
            <i class="<?php echo ($rate >= 5) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
        </font>
    </div>
    <hr>
    <section class="grid-container">
        <div class="slideshow-container">
            <?php
                $images = explode(",", $hotelRow['hotelImageSlide']);
                $count = 1;
                foreach($images as $image){ ?>
                    <div class="mySlides fade">
                        <div class="numbertext"> <?php echo $count . " / " . count($images); ?></div>
                        <img src="img/Hotel/<?php echo $image; ?>" style="width: 100%;">
                        <div class="text1"><b><?php echo $hotelRow['hotelName'] ?></b></div>
                    </div>
            <?php  $count++; }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div style="text-align:center">
            <?php
            $count = 1;
            foreach($images as $image){ ?>
                <span class="dot" onclick="currentSlides(<?php echo $count ?>)"></span>
            <?php $count++; } ?>
            </div>
        </div>
        <br>
        <div class="grid-details">
            <h3>Check for a perfect reservation</h3>
            <p>Location : <?php echo $hotelRow['hotelAddress'] ?> <i class="fa fa-map maker" style="color: red;" aria-hidden="true"></i></p>
            <p class="button-price"><b>LKR <?php echo $hotelRow['hotelPrice'] ?> / NIGHT</b></p>
            <div class="buttons">
                <a href="tel:<?php echo $hotelRow['hotelPhoneNo'] ?>"><button class="button"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $hotelRow['hotelPhoneNo'] ?></button></a>
                <a href="<?php echo $hotelRow['hotelWebsite'] ?>" target="_blank"><button class="button"><i class="fa fa-link" aria-hidden="true"></i> Official Website</button></a>
                <a href="<?php echo $hotelRow['hotelMap'] ?>"><button class="button"><i class="fa fa-street-view" aria-hidden="true"></i> Directions</button></a>
            </div>
        </div>
        <div class="description">
            <div class="description-paragraph">
                <p><?php echo $hotelRow['hotelDescription'] ?></p>
            </div>
            <br>
            <div class="description-facilities">
                <h4><b>Most Popular Facilities</b></h4>
                <?php
                    $hFac = explode(",", $hotelRow['hotelFacilities']);
                    if(in_array("wifi", $hFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-wifi" style="color: blue;"></i> Free Wifi </style></p>';
                    } if(in_array("parking", $hFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-parking" style="color: blue;" style="color: darkblue;"></i> Free Parking</p>';
                    } if(in_array("swimmer", $hFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-swimmer" style="color: blue;"></i> Swimming Pool</p>';
                    } if(in_array("dumbbell", $hFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-dumbbell" style="color: blue;"></i> Fitness Center</p>';
                    } if(in_array("sun", $hFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-sun" style="color: blue;"></i> Beach</p>';
                    }
                ?>                          
            </div>
            <div class="description-facilities1">
                <h4><b>Room Facilities</b></h4>
                <?php
                    $rFac = explode(",", $hotelRow['roomFacilities']);
                    if(in_array("snowflake", $rFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="far fa-snowflake" style="color: blue;"></i> Air Conditioning</p>';
                    } if(in_array("wine-bottle", $rFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-wine-bottle" style="color: blue;"></i> Minibar</p>';
                    } if(in_array("bed", $rFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-bed" style="color: blue;"></i> Private Balcony</p>';
                    } if(in_array("bell", $rFac)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-bell" style="color: blue;"></i> Room Service</p>';
                    }
                ?>    
            </div>
            <div class="description-facilities2">
                <h4><b>Room Types</b></h4>
                <?php
                    $rType = explode(",", $hotelRow['roomTypes']);
                    if(in_array("eye", $rType)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fas fa-eye" style="color: blue;"></i> Ocean View</p>';
                    } if(in_array("bed-family", $rType)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-bed" style="color: blue;"></i> Family Suits</p>';
                    } if(in_array("bed-delux", $rType)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-bed" style="color: blue;"></i> Delux Rooms</p>';
                    } if(in_array("bed-bridal", $rType)){
                        echo '<p class="facility" style="color: darkblue;"><i class="fa fa-bed" style="color: blue;"></i> Bridal Suits</p>';
                    }
                ?>  
            </div>
        </div>


        <br><br><br><br><br><br>
        <div class="review-overview">
            <h3>Review Overview</h3>
            <div class="rating-details">
                <p><b><?php echo $hotelRow['hotelRating']; ?></b></p>
                <p>/5</p>
                <p>
                <?php
				$full = 0;
				$half = 0;
				if($hotelRow['hotelRating'] > 4.5){
					$full = 5;
				} else if($hotelRow['hotelRating'] > 4.0){
					$full = 4;	$half = 1;
				} else if($hotelRow['hotelRating'] > 3.5){
					$full = 4;
				} else if($hotelRow['hotelRating'] > 3.0){
					$full = 3;	$half = 1;
				} else if($hotelRow['hotelRating'] > 2.5){
					$full = 3;
				} else if($hotelRow['hotelRating'] > 2.0){
					$full = 2;	$half = 1;
				} else if($hotelRow['hotelRating'] > 1.5){
					$full = 2;
				} else if($hotelRow['hotelRating'] > 1.0){
					$full = 1;	$half = 1;
				} else if($hotelRow['hotelRating'] > 0.5){
					$full = 1;
				} else if($hotelRow['hotelRating'] > 0){
					$half = 1;
				}
				$i = $full;
				while($i > 0 ){
					echo '<i class="fa fa-star"></i> ';
					$i--;
				}
				if($half == 1){
					echo '<i class="fa-solid fa-star-half"></i> ';
					$full++;
				}
				$i = $full;
				while($i < 5){
					echo '<i class="fa-regular fa-star"></i> ';
					$i++;
				}
				?>
                </p>
                <p><?php echo ($resultrating->num_rows > 0) ? $resultrating->num_rows : "No" ?> Reviews</p>
            </div>
            <div class="advanced-rating">
            <?php $numrows = ($resultrating->num_rows > 0) ? $resultrating->num_rows : 1; ?>
                <div class="rating-wrapper">
                    <p1>5 <i class="fa fa-star"></i></p1>
                    <div class="rating">
                        <div class="rating-value" style="width: <?php echo ($count5['Count'] / $numrows) * 100 ?>%;"></div>
                    </div>
                    <p2><b><?php echo $count5['Count'] ?></b></p2>
                </div>
                <div class="rating-wrapper">
                    <p1>4 <i class="fa fa-star"></i></p1>
                    <div class="rating">
                        <div class="rating-value" style="width: <?php echo ($count4['Count'] / $numrows) * 100 ?>%;"></div>
                    </div>
                    <p2><b><?php echo $count4['Count'] ?></b></p2>
                </div>
                <div class="rating-wrapper">
                    <p1>3 <i class="fa fa-star"></i></p1>
                    <div class="rating">
                        <div class="rating-value" style="width: <?php echo ($count3['Count'] / $numrows) * 100 ?>%;"></div>
                    </div>
                    <p2><b><?php echo $count3['Count'] ?></b></p2>
                </div>
                <div class="rating-wrapper">
                    <p1>2 <i class="fa fa-star"></i></p1>
                    <div class="rating">
                        <div class="rating-value" style="width: <?php echo ($count2['Count'] / $numrows) * 100 ?>%;"></div>
                    </div>
                    <p2><b><?php echo $count2['Count'] ?></b></p2>
                </div>
                <div class="rating-wrapper">
                    <p1>1 <i class="fa fa-star"></i></p1>
                    <div class="rating">
                        <div class="rating-value" style="width: <?php echo ($count1['Count'] / $numrows) * 100 ?>%;"></div>
                    </div>
                    <p2><b><?php echo $count1['Count'] ?></b></p2>
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
							<i class="<?php echo ($sqlratingresult['rate'] >= 1)? "fa fa-star" : "fa-regular fa-star" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 2)? "fa fa-star" : "fa-regular fa-star" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 3)? "fa fa-star" : "fa-regular fa-star" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 4)? "fa fa-star" : "fa-regular fa-star" ?>"></i>
							<i class="<?php echo ($sqlratingresult['rate'] >= 5)? "fa fa-star" : "fa-regular fa-star" ?>"></i>
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
                <h1>Please Login to Submit Your Review</h1>
                <a href="login.php" class="login"><button class="btn-animation"> Login</button></a>
            </div>
            <form action="submithotelreview.php?HId=<?php echo $hid ?>" name="submit_review" method="POST" style="display:<?php echo $displayform ?>">
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
        <div class="covid-message">
            <h2><b>Covid-19 Update</b></h2>

            <ul>
                <li>Due to Coronavirus(Covid-19), It may request additional documents from guests.</li><br>
                <li>Face maskes required for all guests in public areas.</li><br>
                <li>Food & beverages may be limited due to the Coronavirus(Covid-19).</li><br>
                <li>Contactless check-in and check-out.</li>
            </ul>
        </div>
    </section>
    <?php include 'footer.php' ?>
	<?php include 'messageDisplay.php' ?>
    <script src="js/hotelView.js"></script>
</body>

</html>