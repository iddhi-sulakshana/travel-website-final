<?php 
    include 'dbcon.php';
    $conn = OpenCon();
    $sql = "SELECT `vehicleId`, `vehicleName`, `vehiclePrice`, `vehicleSeats`, `vehicleAddress` FROM `table_vehicle` ORDER BY RAND() LIMIT 3";
    $vehicleResult = $conn->query($sql);
    $sql = "SELECT `hotelId`, `hotelName`, `hotelDistrict`, `hotelPrice` FROM `table_hotel` ORDER BY RAND() LIMIT 3";
    $hotelResult = $conn->query($sql);
    $sql = "SELECT `restaurantId`, `restaurantName`, `restaurantDistrict`, `restaurantPrice` FROM `table_restaurant` ORDER BY RAND() LIMIT 3";
    $restaurantResult = $conn->query($sql);
    CloseCon($conn);
    include 'head.php'
?>
    <title>Plan&Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/home.css">
<?php include 'header.php' ?>
    <!--header-->
    <section class="flex1">
        <div class="container">
            <div class="header-title">
                <h1>Leave Your Footprints</h1>
                <p>
                The tourism industry plays a significant role in the Sri Lankan economy with over 1600Km of coastline, Sri Lanka is famous for tropical beaches and other tourist attractions such as Ancient heritage and archeological sites ,forests, wild-life sanctuaries and many more. Tourists are attracted because of Sri Lanka's cultural diversities. However there are many amazing places that you should not miss out whenever you visit Sri Lanka.
                </p>
            </div>
        </div>
    </section>

    <!--featured section-->

    <section id="featured" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="lg-title">know about some places befor Your Travel</span>
                <h2 class="lg-title">About 09 Provinces</h2>
            </div>
        
            <div class="featured-row">
                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc10.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                           Northern Province
                        </span>
                        <div>
                             <p class="text">The Northern province is located in the north of sri lanka just 85 km from india.Jaffnais capital of Northern province.In this area you will be able to see the sea and religious places</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc7.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                           North Central Province
                        </span>
                        <div>
                             <p class="text">The largest provincein srilanaka. the province capital Anuradhapura. one of the must sacred cities in sri lanaka. As many places of buddhist worship are located in this ancient city.</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc5.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                         North Western Province
                        </span>
                        <div>
                             <p class="text">North Western province is a provinceof sri lanka.its' capital is a kurunegala, the province is known mainly for its numerous coconut plantations. </p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc4.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Western Province
                        </span>
                        <div>
                             <p class="text">the most dencely populated province of sri lanaka. ita' capital is a colombo. it is also home to the country's commercial hub. in this area you will be able to see the beautiful beach like hikkaduwa.</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc3.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Sothern Province
                        </span>
                        <div>
                             <p class="text">The southern province is a geographic area consisting of the districts of galle, matara and hambantota. subsistence farming and fishing is the main source of this region. in this area have many beautiful beach and attraction place like hummanaya</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc1.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Sabaragamuwa Province
                        </span>
                        <div>
                             <p class="text">This is the first level administrative division of sri lanaka. ratnapura and kegalle are contains of sabaragamuwa provinsce. this province has attractive climate and beautiful environment. it is a mountainous region</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc6.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Central Province
                        </span>
                        <div>
                             <p class="text">The centrel province is primarily in the central mountainous terrain of sri lanaka.This area is iseal for mountaineers.the temple of the tooth is located in this province</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc2.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Uva Province
                        </span>
                        <div>
                             <p class="text">Uva province is sri lanka's second least populated province. it consists of two districts badhulla and monaragala. badhulla district has many beautiful whaterfalls and attractive place lke 9 arch bridge.</p>
                        </div>
                    </div>
                </div>

                <div class="featured-item my-2 shadow">
                    <img src="img/Home/nc9.jpeg" alt="####">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Eastern Province
                        </span>
                        <div>
                             <p class="text">Eastern province has the attractive beach in sri lanaka. it is a pasikuda beach. and this province has the second largest natural harbor in the world</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>

    <!--services section-->

    <section id="services" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Know About Our Services</span>
                <h2 class="lg-title">Our Services</h2>
        </div>
            <div class="all-select">
            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-hotel"></i>
                    </span>
                    <h3>Luxurious Hotel</h3>
                    <p class="text">Now you can get Luxurious accommodation at Luxurious hotels from our website. we connect you to best Luxurious hotel for your accommadatoin</p>
                    <a href="hotel_search.php" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <h3>Travel Guide Map</h3>
                    <p class="text">we are give best parth for your travel points allways. it's main benefit is, it work without a signal..that way you can travel in any area without any fear</p>
                    <a href="https://www.srilanka.travel/tourist-map" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-cocktail"></i>
                    </span>
                    <h3>Restaurants</h3>
                    <p class="text">We give information to you about island wide Restaurants at your travel locations.We hope it will be useful to your dream tour.</p>
                    <a href="restaurant_search.php" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-car"></i>
                    </span>
                    <h3>Vehicles</h3>
                    <p class="text">You can select a Vehicle duly for your tour and according to your wishes. and you able to go your destination safety.our web page is bound for that</p>
                    <a href="vehicle_search.php" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-suitcase-rolling"></i>
                    </span>
                    <h3>Travel Accessories</h3>
                    <p class="text">YOu will wont different Accessories for your tour. don't worry about that. you can get the Accessories you need from us as per your requirment.we are committed to that</p>
                    <a href="http://campinggear.lk/" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-id-badge"></i>
                    </span>
                    <h3>Packages</h3>
                    <p class="text">This can be described as a offer we give for you.this parts like a full Package for your trip. A hotel, Restaurants, a Vehicle are belong to for that</p>
                    <a href="packages.php" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-male"></i>
                    </span>
                    <h3>Travel Guide</h3>
                    <p class="text">We give well-balanced Guides for your tour. And also we guarantee faithfull about them.it can be described as an additional Qualification provided to you by our web page</p>
                    <a href="#Guide" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-user-shield"></i>
                    </span>
                    <h3>About Us</h3>
                    <p class="text">This page provides an opporunity for you to contact us if you encounter any problems or shortcomings in our website</p>
                    <a href="aboutus.php" class="btn">Read More..</a>
                </div>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-user-alt"></i>
                        
                    </span>
                    <h3>Create Account</h3>
                    <p class="text">You can create yourown account on our website. then we offer you special offers and discounts.</p>
                    <a href="login.php" class="btn">Read More..</a>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!--sevice section end-->


    <!--special offers session start-->
    <section id="offers" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">know about Our special offers</span>
                <h2 class="lg-title">
                    <?php
                        if($vehicleResult->num_rows == 0 AND $hotelResult->num_rows == 0 AND $restaurantResult->num_rows == 0){
                            echo "No Special Offers";
                        } else {
                            echo "Special Offers";
                    ?>
                </h2>
        </div>
            <div class="all-select">
            <?php if($vehicleResult->num_rows > 0){
                foreach($vehicleResult as $item){ ?>
                    <div class="offers-row">
                        <div class="offers-item">
                            <span class="offers-icon">
                                <i class="fas fa-car"></i>
                            </span>
                            <h4><?php echo $item['vehicleName'] ?></h4>
                            <p class="text">
                                Rs. <?php echo $item['vehiclePrice'] ?> <br>
                                <?php echo $item['vehicleSeats'] ?> Seats <br>
                                <?php echo $item['vehicleAddress'] ?><br>
                            </p>
                            <a href="vehicle_view.php?VId=<?php echo $item['vehicleId'] ?>" class="btn">Check Out</a>
                        </div>
                    </div>
            <?php }} ?>
            <?php if($hotelResult->num_rows > 0){
                foreach($hotelResult as $item){ ?>
                    <div class="offers-row">
                        <div class="offers-item">
                            <span class="offers-icon">
                                <i class="fas fa-hotel"></i>
                            </span>
                            <h4><?php echo $item['hotelName'] ?></h4>
                            <p class="text">
                                Rs. <?php echo $item['hotePrice'] ?> <br>
                                <?php echo $item['hotelDistrict'] ?><br>
                            </p>
                            <a href="hotel_view.php?VId=<?php echo $item['hotelId'] ?>" class="btn">Check Out</a>
                        </div>
                    </div>
            <?php }} ?>
            <?php if($vehicleResult->num_rows > 0){
                foreach($restaurantResult as $item){ ?>
                    <div class="offers-row">
                        <div class="offers-item">
                            <span class="offers-icon">
                                <i class="fas fa-bars"></i>
                            </span>
                            <h4><?php echo $item['restaurantName'] ?></h4>
                            <p class="text">
                                Rs. <?php echo $item['restaurantPrice'] ?> <br>
                                <?php echo $item['restaurantDistrict'] ?><br>
                            </p>
                            <a href="restaurant_view.php?VId=<?php echo $item['restaurantId'] ?>" class="btn">Check Out</a>
                        </div>
                    </div>
            <?php }}} ?>
            </div>
        </div>
    </section>
    
    <!--special offers session end-->

    <!--Guide contact session start-->
    <section id="Guide" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">this page is help you contact for GUide</span>
                <h2 class="lg-title">Contact Guide</h2>
            </div>
        <div class="guide-ditels">    
        
        <div class="guide-d">   
        <span style="--i:1;"><img src="img/Home/nc12.jpg" alt="">
            Name:Gamini rathnayaka
            contact:0723726658
            Email: gmini10@gmail.com
           
        </span>
        <span style="--i:2;"><img src="img/Home/nc13.jpg" alt="">
            Name:de.silva
            contact:0703726658
            Email: silva0@gmail.com
        </span>
        <span style="--i:3;"><img src="img/Home/nc14.jpg" alt="">
            Name:anuradha herath
            contact:0723724567
            Email: thilakarathna10@gmail.com
        </span>
        <span style="--i:4;"><img src="img/Home/nc15.jpg" alt="">
            Name:mahinda rathnayaka
            contact:0783498601
            Email: rathnayaka10@gmail.com
        </span>
        <span style="--i:5;"><img src="img/Home/nc16.jpg" alt="">
            Name:amali dasanayaka
            contact:0715408256
            Email: amalid20@gmail.com
        </span>
        <span style="--i:6;"><img src="img/Home/nc17.jpg" alt="">
            Name:sisira kumara
            contact:0758762309
            Email: kumaras20@gmail.com
        </span>
        <span style="--i:7;"><img src="img/Home/nc18.jpg" alt="">
            Name:D.karunathilaka
            contact:0714870794
            Email: karunaD20@gmail.com
        </span>
        <span style="--i:8;"><img src="img/Home/nc19.jpg" alt="">
            Name:upali de silva
            contact:0704568210
            Email: upalide@gmail.com
        </span>
        </div>
        </div>
        </div>
    </section>


    
    
    <!--Guide contact session End-->
    <!--js-->
    <?php include 'footer.php' ?>
    <script src="js/home.js"></script>

    <!--swiper website for duide parts-->
  
    
   
</body>
</html>
