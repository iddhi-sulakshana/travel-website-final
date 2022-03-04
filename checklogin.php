<?php
  session_start();
  if(isset($_SESSION["logged"])){
    header("Location: profile.php");
    exit;
  }
  include 'dbcon.php';
  $conn = OpenCon();
  if($conn->connect_error){
    $_SESSION["error"] = "Connection Error";
    $_SESSION["prevPage"] = "login.php";
    header('Location: problem.php');
    exit;
  }
  $EmailName = htmlspecialchars($_REQUEST['EmailName']);
  $password = htmlspecialchars($_REQUEST['password']);
  if(trim($EmailName) == ''){
    header("Location: login.php?message=Username / Email Cant be Empty");
    exit;
  }
  $sql = "SELECT `userId` FROM `table_user` WHERE `userName` = '" . $EmailName . "' OR `email` = '" . $EmailName . "'";
  $result = $conn->query($sql);
  if(!($result->num_rows == 1)){
    CloseCon($conn);
    header("Location: login.php?message=Username / Email Did Not match");
    exit;
  }
  $result = $result->fetch_assoc();
  $sql2 = "SELECT `userId` from `table_user` WHERE `userId` = '" . $result['userId'] . "' AND `pwd` = '" . $password . "'";
  $result2 = $conn->query($sql2);
  CloseCon($conn);
  if(!($result2->num_rows == 1)){
    header("Location: login.php?EmailNamePhone=" . $EmailNamePhone . "&message=Password Did Not match");
    exit;
  }
  $result2 = $result2->fetch_assoc();
  $_SESSION["logged"] = 1;
  $_SESSION["Id"] = $result2['userId']; 
  header("Location: profile.php");
  exit;
?>