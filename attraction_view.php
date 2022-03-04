<?php
	include 'dbcon.php';
	if(is_null($_REQUEST['attractionId']) || $_REQUEST['attractionId'] <= 0){
		header('Location: vehicle_search.php');
		exit();
	}
	$aid = htmlspecialchars($_REQUEST['attractionId']);
	
	$sqlattraction = "SELECT * FROM `table_attraction` WHERE `attractionId` = " . $aid;
	
	$conn = OpenCon();

	$resultattraction = $conn->query($sqlattraction);
	
	CloseCon($conn);
	if($resultattraction->num_rows < 1){
		header('Location: attraction.php');
		exit();
	}
	$resultattraction = $resultattraction->fetch_assoc();
	include 'head.php';
?>
  <title><?php echo $resultattraction['attractionTitle'] ?></title>
	<link rel="stylesheet" href="css/attraction.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.header{
			min-height: 70vh;
			width: 100%;
			background-image: linear-gradient(rgba(4,9,30,0.5),rgba(4,9,30,0.2)),url("img/Attraction/<?php echo $resultattraction['attractionImagePri'] ?>");
			background-position: center;
			background-size: cover;
			position: relative;
		}
	</style>
	<?php include 'header.php' ?>

	<section class="header">	
	<div class="text-box">
	<h1><?php echo $resultattraction['attractionTitle'] ?></h1>
	</div>
	</section>
<!--content-->
		<br>
	<section><?php echo $resultattraction['attractionDescription'] ?></section>
		<br>
	
	<section style="width: 100%;">
		<iframe style="width: 100%;" src="<?php echo $resultattraction['attractionLocationLink'] ?>" width="1150" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</section>
	<section class="cta">
		<a href="attraction.php" class="back-btn">BACK</a>
	</section>

	<?php include 'footer.php' ?>
	<script src="js/main.js"></script>
</body>
</html>