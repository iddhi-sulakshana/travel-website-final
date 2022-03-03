<?php include 'head.php' ?>
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
        <form name="hotel-search-form" method="GET" action="hotel-search.php">
            <div class="form-content">
                <div class="wrapper wrapper1">
                    <label for="rooms">Rooms</label>
                    <select name="rooms" class="inputType" required="">
                        <option value="">Select No. of Rooms</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="wrapper wrapper2">
                    <label>Location</label>
                    <input type="text" name="location" placeholder="Enter Location" required="">
                </div>
                <div class="wrapper wrapper3">
                    <button type="submit" value="submit" class="btn-animation icon"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <button type="submit" value="s ubmit" class="btn-animation text">Search</button>
                </div>
            </div>
        </form>
    </section>

    <hr>

    <section class="grid-container">
        <div class="content">
            <div class="searched-content grid-view">
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel1 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel2 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel3 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel4 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel5 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="searched-item">
                    <a href="hotel_view.php">
                    <h2><b>Weligama Bay Marriott Resort & Spa</b></h2>
                    <p>Matara, Sri Lanka</p>
                    <img src="img/Hotel/hotel6 (1).jpg" height="300px" width="350px">
                    <h1 class="hotel-price">LKR 25,000</h1>
                    <button class="btn-animation" type="submit" name="booknow-submit" value="submit"><a href="hotel_search.php"></a>View Deal</button>
                    <div>
                        <p class="detail">
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star checked" style="color: orange;"></i>
                            <i class="fa fa-star-half-full" style="color: orange;"></i>
                        </p>
                        <div>
                            <p class="detail"><i class="fa fa-wifi" aria-hidden="true" style="color: blue;"></i> Free Wifi</p>
                            <p class="detail"><i class="fas fa-parking" aria-hidden="true" style="color: blue;"></i> Free Parking</p>
                            <p class="detail"><i class="fas fa-swimmer" aria-hidden="true" style="color: blue;"></i> Swimming Pool</p>
                            <p class="detail"><i class="fas fa-coffee" aria-hidden="true" style="color: blue;"></i> Free Breakfast</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php include 'footer.php' ?>
    <script src="js/hotelSearch.js"></script>
</body>

</html