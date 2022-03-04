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
  $uname = htmlspecialchars($_REQUEST['uname']);
  $sql = "SELECT `userId` FROM `table_user` WHERE `userName` = '" . $uname . "'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    CloseCon($conn);
    header("Location: login.php?message=Username Already Exist.");
    exit;
  }
  $email = htmlspecialchars($_REQUEST['email']);
  $sql = "SELECT `userId` FROM `table_user` WHERE `email` = '" . $email . "'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    CloseCon($conn);
    header("Location: login.php?message=Email Alrady Exist.&upName=" . $uname);
    exit;
  }
  $pwd = htmlspecialchars($_REQUEST['password']);
  $repwd = htmlspecialchars($_REQUEST['repassword']);
  if(!($pwd === $repwd)){
    CloseCon($conn);
    header("Location: login.php?message=Password Did not match.&upName=" . $uname . "&upEmail=" . $email);
    exit;
  }
  $sql = "INSERT INTO `table_user`(`userName`, `email`, `pwd`) VALUES ('" . $uname . "', '" . $email . "', '" . $pwd ."')";
  if ($conn->query($sql) === TRUE) {
    CloseCon($conn);
    header("Location: checklogin.php?EmailName=" . $email . "&password=" . $pwd);
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>