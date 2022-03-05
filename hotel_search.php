<?php 
    include 'head.php';
    if(isset($_REQUEST['hotelname']) && trim($_REQUEST['hotelname']) != ''){
        $hotelname = htmlspecialchars($_REQUEST['hotelname']);
    }
    if(isset($_REQUEST['district']) && trim($_REQUEST['district']) != ''){
        $district = htmlspecialchars($_REQUEST['district']);
    }
    include 'dbcon.php';
    $sql = "SELECT `hotelId`, `hotelImagePri`, `hotelName`, `hotelFacilities`, `hotelPrice`, `hotelDistrict`, `hotelRating` FROM `table_hotel`";
    if(isset($hotelname) || isset($district)){
        $sql .= " WHERE";
        if(isset($hotelname)){
            $sql .= " hotelName LIKE '%" . $hotelname . "%'";
        }
        if(isset($district)){
            $tmpsql = explode(" ", $sql);
            if(end($tmpsql) == "WHERE"){
                $sql .= " hotelDistrict='" . $district . "'";
            } else{
                $sql .= " AND hotelDistrict='" . $district . "'";
            }
            unset($tempsql);
        }
    }
    $conn = OpenCon();
    $result = $conn->query($sql);
    CloseCon($conn);
?>
    <title>Search For Hotels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/hotelSearch.css">
<?php include 'header.php' ?>
    <div class="hero">
        <div class="container">
            <div class="main-heading">
                <h1 style="font-size: 7vw; padding-left: 50px;">Discover</h1>
                <h2 style="font-size: 6vw; padding-left: 50px;">Best Hotels for Best Price</h2>
            </div>
        </div>
    </div>
    <br>
    <!-- Hotel search bar-->

    
    <section class="hotel-search">
        <h3>Look For Hotels</h3>
        <form name="hotel-search-form" method="POST" action="hotel_search.php">
            <div class="form-content">
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
                    <label for="hotelname">Name</label>
                    <input type="text" name="hotelname" placeholder="Enter Hotel Name">
                </div>
                <div class="wrapper wrapper3">
                    <button type="submit" value="submit" class="btn-animation icon"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <button type="submit" value="submit" class="btn-animation text">Search</button>
                </div>
            </div>
        </form>
    </section>

    <hr>

    <section class="grid-container">
        <div class="content">
            <div class="searched-content grid-view">
            <?php
            if($result->num_rows > 0){
                foreach ($result as $item) { ?>
                <div class="searched-item">
                    <a href="hotel_view.php?HId=<?php echo $item['hotelId'] ?>">
                    <h2><b><?php echo $item['hotelName'] ?></b></h2>
                    <p><?php echo $item['hotelDistrict'] ?>, Sri Lanka</p>
                    <img src="img/Hotel/<?php echo $item['hotelImagePri'] ?>" height="300px" width="350px">
                    <h1 class="hotel-price">LKR <?php echo $item['hotelPrice'] ?></h1>
                    <a href="hotel_view.php?HId=<?php echo $item['hotelId'] ?>"><button class="btn-animation" type="submit" name="booknow-submit" value="submit">View Deal</button></a>
                    <div>
                        <p class="detail">
                            <?php $rate =  $item['hotelRating']; ?>
                            <i class="<?php echo ($rate >= 1) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
                            <i class="<?php echo ($rate >= 2) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
                            <i class="<?php echo ($rate >= 3) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
                            <i class="<?php echo ($rate >= 4) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
                            <i class="<?php echo ($rate >= 5) ? "fa" : "fa-regular" ?> fa-star" style="color: orange;"></i>
                        </p>
                        <div>
                            <?php 
                                $facilities = explode(",",  $item['hotelFacilities']); 
                                if(in_array("wifi", $facilities)){
                                    echo '<p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>';
                                } if(in_array("parking", $facilities)) {
                                    echo '<p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>';
                                } if(in_array("swimmer", $facilities)) {
                                    echo '<p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>';
                                } if(in_array("dumbbell", $facilities)) {
                                    echo '<p class="detail"><i class="fas fa-dumbbell" style="color: blue;"></i> Fitness Center</p>';
                                } if(in_array("wifi", $facilities)){
                                    echo '<p class="detail"><i class="fas fa-sun" style="color: blue;"></i> Beach</p>';
                                }
                            ?>
                        </div>
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
<?php include 'footer.php' ?>
    <script src="js/hotelSearch.js"></script>
</body>

</html