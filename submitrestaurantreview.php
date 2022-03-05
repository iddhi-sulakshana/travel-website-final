<?php
  session_start();
	include 'dbcon.php';
	if(is_null($_REQUEST['RId']) || $_REQUEST['RId'] <= 0){
		header('Location: restaurant_search.php');
		exit();
	}
	$rid = htmlspecialchars($_REQUEST['RId']);
  if(!(isset($_SESSION['Id']))){
    header('Location: restaurant_view.php?RId=' . $rid);
		exit();
  }
  $uid = htmlspecialchars($_SESSION['Id']);
	$sqlrestaurant = "SELECT `restaurantRating` FROM `table_restaurant` WHERE `restaurantId` = " . $rid;
	$sqlrating = "SELECT * FROM `table_restaurantreview` WHERE `restaurantId` = " . $rid;

	$conn = OpenCon();

	$resultrestaurant = $conn->query($sqlrestaurant);
	$resultrating = $conn->query($sqlrating);
	

	if($resultrestaurant->num_rows < 1){
    CloseCon($conn);
		header('Location: restaurant_view.php?RId=' . $rid);
		exit();
	}
  $usermessage = htmlspecialchars($_REQUEST['usermessage']);
  $rate = htmlspecialchars($_REQUEST['rate']);
  if(!($rate == 1 || $rate == 2 || $rate == 3 || $rate == 4 || $rate == 5) && trim($rate) == ''){
    CloseCon($conn);
    header('Location: restaurant_view.php?RId=' . $rid . '&message=Bad Rate Value&umessage=' . $usermessage);
		exit();
  }
  if(trim($usermessage) == ''){
    CloseCon($conn);
    header('Location: restaurant_view.php?RId=' . $rid . '&message=Empty message');
		exit();
  }
  if(strlen($usermessage) > 100){
    CloseCon($conn);
    header('Location: restaurant_view.php?RId=' . $rid . '&message=Message Length Exceeded Limit');
		exit();
  }
  if($resultrating->num_rows > 0){
    foreach ($resultrating as $sqlratingresult) {
      if($sqlratingresult['userId'] == $uid){
        $sql = "UPDATE `table_restaurantreview` SET `rate` = '" . $rate . "', `message` = '" . $usermessage . "' WHERE `userId` = " . $uid ;
        break;
      }
      $sql = "INSERT INTO `table_restaurantreview`(`restaurantId`, `userId`, `rate`, `message`) VALUES (" . $rid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
    }
  } else {
    $sql = "INSERT INTO `table_restaurantreview`(`restaurantId`, `userId`, `rate`, `message`) VALUES (" . $rid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
  }
  if($conn->query($sql) === TRUE){
    $sql = "SELECT SUM(`rate`) as 'Sum', COUNT(`rate`) as 'Count' FROM `table_restaurantreview` WHERE `restaurantId` = " . $rid;
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    $sum = $result['Sum'];
    $count = $result['Count'];
    $restaurantrate = $sum / $count;
    $sql = "UPDATE `table_restaurant` SET `restaurantRating` = '" . $restaurantrate . "' WHERE `restaurantId` = " . $rid;
    $conn->query($sql);    
    CloseCon($conn);
    header("Location: restaurant_view.php?RId=" . $rid);
    exit;
  }else{
    CloseCon($conn);
    $_SESSION["error"] = "Failed to Insert Data";
    $_SESSION['prevPage'] = "restaurant_view.php?RId=" . $rid;
    header("Location: problem.php");
    exit;
  }
  ?>