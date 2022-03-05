<?php
  session_start();
	include 'dbcon.php';
	if(is_null($_REQUEST['HId']) || $_REQUEST['HId'] <= 0){
		header('Location: hotel_search.php');
		exit();
	}
	$hid = htmlspecialchars($_REQUEST['HId']);
  if(!(isset($_SESSION['Id']))){
    header('Location: hotel_view.php?HId=' . $hid);
		exit();
  }
  $uid = htmlspecialchars($_SESSION['Id']);
	$sqlhotel = "SELECT `hotelRating` FROM `table_hotel` WHERE `hotelId` = " . $hid;
	$sqlrating = "SELECT * FROM `table_hotelreview` WHERE `hotelId` = " . $hid;

	$conn = OpenCon();

	$resulthotel = $conn->query($sqlhotel);
	$resultrating = $conn->query($sqlrating);
	

	if($resulthotel->num_rows < 1){
    CloseCon($conn);
		header('Location: hotel_view.php?HId=' . $hid);
		exit();
	}
  $usermessage = htmlspecialchars($_REQUEST['usermessage']);
  $rate = htmlspecialchars($_REQUEST['rate']);
  if(!($rate == 1 || $rate == 2 || $rate == 3 || $rate == 4 || $rate == 5) && trim($rate) == ''){
    CloseCon($conn);
    header('Location: hotel_view.php?HId=' . $hid . '&message=Bad Rate Value&umessage=' . $usermessage);
		exit();
  }
  if(trim($usermessage) == ''){
    CloseCon($conn);
    header('Location: hotel_view.php?HId=' . $hid . '&message=Empty message');
		exit();
  }
  if(strlen($usermessage) > 100){
    CloseCon($conn);
    header('Location: hotel_view.php?HId=' . $hid . '&message=Message Length Exceeded Limit');
		exit();
  }
  if($resultrating->num_rows > 0){
    foreach ($resultrating as $sqlratingresult) {
      if($sqlratingresult['userId'] == $uid){
        $sql = "UPDATE `table_hotelreview` SET `rate` = '" . $rate . "', `message` = '" . $usermessage . "' WHERE `userId` = " . $uid ;
        break;
      }
      $sql = "INSERT INTO `table_hotelreview`(`hotelId`, `userId`, `rate`, `message`) VALUES (" . $hid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
    }
  } else {
    $sql = "INSERT INTO `table_hotelreview`(`hotelId`, `userId`, `rate`, `message`) VALUES (" . $hid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
  }
  if($conn->query($sql) === TRUE){
    $sql = "SELECT SUM(`rate`) as 'Sum', COUNT(`rate`) as 'Count' FROM `table_hotelreview` WHERE `hotelId` = " . $hid;
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    $sum = $result['Sum'];
    $count = $result['Count'];
    $hotelrate = $sum / $count;
    $sql = "UPDATE `table_hotel` SET `hotelRating` = '" . $hotelrate . "' WHERE `hotelId` = " . $hid;
    $conn->query($sql);    
    CloseCon($conn);
    header("Location: hotel_view.php?HId=" . $hid);
    exit;
  }else{
    CloseCon($conn);
    $_SESSION["error"] = "Failed to Insert Data";
    $_SESSION['prevPage'] = "hotel_view.php?HId=" . $hid;
    header("Location: problem.php");
    exit;
  }
  ?>