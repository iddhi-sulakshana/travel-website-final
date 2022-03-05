<?php 
    include 'dbcon.php';
    $sql = "SELECT * FROM `table_package`";
    $conn = OpenCon();
    $result = $conn->query($sql);
    CloseCon($conn);
    include 'head.php'
?>
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
	<link rel="stylesheet" href="css/packages.css">
    <title>Packages</title>
<?php include 'header.php' ?>
    <section class="section">
        <h1 class="header-title">Find your perfect vacation package</h1>
    </section> 
    

    <!-- Special Offers -->
    <h1 id="package-title">Special Offers for Travelers</h1>
    <section class="packages">
        <?php
            $count=0;
            foreach($result as $item){
                if($count == 6){ ?>
                    </section>
                    <section>
                        <div class="flex-container banner">
                            <div class="banner-icon">
                                <div class="icon">
                                    <i class="fas fa-dollar-sign icon"></i>
                                </div>
                                <div class="title">
                                    <h3>15 Day Money Back Guarantee</h3>
                                </div>
                                
                            </div>
                            <div class="banner-icon">
                                <div class="icon">
                                    <i class="fas fa-percentage icon"></i>
                                </div>
                                <div class="title">
                                    <h3>Special & Seasonal Offers</h3>
                                </div>
                                
                            </div>
                            <div class="banner-icon">
                                <div class="icon">
                                    <i class="fas fa-shield-virus icon"></i>
                                </div>
                                <div class="title">
                                    <h3>Covid-19 Safety Measures</h3>
                                </div>
                                
                            </div>	
                        </div>
                    </section>
                    <h1 id="package-title">Recommended Packages for Travelers</h1>
                    <section class="packages">
               <?php } ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="img/Packages/<?php echo $item['packageImage'] ?>" alt="<?php echo $item['packageTitle'] ?>-image">
                        </div>
                        <div class="product-description">
                            <h3><?php echo $item['packageTitle'] ?></h3>
                            <p><?php echo $item['packageDescription'] ?></p>
                            <div class="ratings">
                                <?php $rate = $item['packageRating']; ?>
                                <span class="stars">
                                    <i class="<?php echo ($rate >= 1) ? "fas" : "far" ?> fa-star"></i>
                                    <i class="<?php echo ($rate >= 2) ? "fas" : "far" ?> fa-star"></i>
                                    <i class="<?php echo ($rate >= 3) ? "fas" : "far" ?> fa-star"></i>
                                    <i class="<?php echo ($rate >= 4) ? "fas" : "far" ?> fa-star"></i>
                                    <i class="<?php echo ($rate >= 5) ? "fas" : "far" ?> fa-star"></i>
                                </span>
                                <span class="rating-number">
                                <?php echo $rate ?>
                                </span>
                            </div>
                            <span class="price-range">From</span> <span class="currency">LKR <?php echo $item['packagePrice']; ?></span>
                        </div>
                    </div>
               <?php
               $count++;
            }
        ?>
        
    </section>
    <?php include 'footer.php' ?>
</body>
</html>
