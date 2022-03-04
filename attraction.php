<?php
	$sql = "SELECT `attractionId`, `attractionTitle`, `attractionImageHome` FROM `table_attraction`";
	include 'dbcon.php';
	$conn = OpenCon();
	$result = $conn->query($sql);
	include 'head.php'
?>
  <title>Atricles</title>
	<link rel="stylesheet" href="css/attraction.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <?php include 'header.php' ?>
<section class="locations">
		<?php
			$count = 0;
			foreach($result as $item){
				if($count == 0){
					echo '<div class="row">';
				}	
			?>
				<div class="locations-col">
				<a href="attraction_view.php?attractionId=<?php echo $item['attractionId'] ?>">
					<img src="img/Attraction/Home/<?php echo $item['attractionImageHome'] ?>">
					<div class="layer">
						<h3><?php echo $item['attractionTitle'] ?></h3>
						<h4>read more</h4>
					</div>
				</a>
				</div>
			<?php	
				$count++;
				if($count == 3){
					echo '</div>';
					$count = 0;
				}
			}
		?>
	<?php include 'footer.php' ?>
	<script src="js/main.js"></script>
</body>
</html>