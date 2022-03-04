<?php
  session_start();
	include 'dbcon.php';
	if(is_null($_REQUEST['VId']) || $_REQUEST['VId'] <= 0){
		header('Location: vehicle_search.php');
		exit();
	}
	$vid = htmlspecialchars($_REQUEST['VId']);
  if(!(isset($_SESSION['Id']))){
    header('Location: vehicle_view.php?VId=' . $vid);
		exit();
  }
  $uid = htmlspecialchars($_SESSION['Id']);
	$sqlvehicle = "SELECT `vehicleRating` FROM `table_vehicle` WHERE `vehicleId` = " . $vid;
	$sqlrating = "SELECT * FROM `table_vehiclereview` WHERE `vehicleId` = " . $vid;

	$conn = OpenCon();

	$resultvehicle = $conn->query($sqlvehicle);
	$resultrating = $conn->query($sqlrating);
	

	if($resultvehicle->num_rows < 1){
    CloseCon($conn);
		header('Location: vehicle_view.php?VId=' . $vid);
		exit();
	}
  $usermessage = htmlspecialchars($_REQUEST['usermessage']);
  $rate = htmlspecialchars($_REQUEST['rate']);
  if(!($rate == 1 || $rate == 2 || $rate == 3 || $rate == 4 || $rate == 5) && trim($rate) == ''){
    CloseCon($conn);
    header('Location: vehicle_view.php?VId=' . $vid . '&message=Bad Rate Value&umessage=' . $usermessage);
		exit();
  }
  if(trim($usermessage) == ''){
    CloseCon($conn);
    header('Location: vehicle_view.php?VId=' . $vid . '&message=Empty message');
		exit();
  }
  if(strlen($usermessage) > 100){
    CloseCon($conn);
    header('Location: vehicle_view.php?VId=' . $vid . '&message=Message Length Exceeded Limit');
		exit();
  }
  if($resultrating->num_rows > 0){
    foreach ($resultrating as $sqlratingresult) {
      if($sqlratingresult['userId'] == $uid){
        $sql = "UPDATE `table_vehiclereview` SET `rate` = '" . $rate . "', `message` = '" . $usermessage . "' WHERE `userId` = " . $uid ;
        break;
      }
      $sql = "INSERT INTO `table_vehiclereview`(`vehicleId`, `userId`, `rate`, `message`) VALUES (" . $vid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
    }
  } else {
    $sql = "INSERT INTO `table_vehiclereview`(`vehicleId`, `userId`, `rate`, `message`) VALUES (" . $vid .", " . $uid .", '" . $rate . "', '" . $usermessage . "')";
  }
  if($conn->query($sql) === TRUE){
    $sql = "SELECT SUM(`rate`) as 'Sum', COUNT(`rate`) as 'Count' FROM `table_vehiclereview` WHERE `vehicleId` = " . $vid;
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    $sum = $result['Sum'];
    $count = $result['Count'];
    $vehiclerate = $sum / $count;
    $sql = "UPDATE `table_vehicle` SET `vehicleRating` = '" . $vehiclerate . "'";
    $conn->query($sql);    
    CloseCon($conn);
    header("Location: vehicle_view.php?VId=" . $vid);
    exit;
  }else{
    CloseCon($conn);
    $_SESSION["error"] = "Failed to Insert Data";
    $_SESSION['prevPage'] = "vehicle_view.php?VId=" . $vid;
    header("Location: problem.php");
    exit;
  }
  ?>