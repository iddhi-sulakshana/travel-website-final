<?php
  session_start();
  include 'dbcon.php';
  $conn = OpenCon();
  if(!(isset($_SESSION['logged']) AND isset($_SESSION['Id']))){
    header("Location: login.php");
    exit;
  }
  $phone = htmlspecialchars($_REQUEST['phone']);
  $email = htmlspecialchars($_REQUEST['email']);
  $first = htmlspecialchars($_REQUEST['first']);
  $last = htmlspecialchars($_REQUEST['last']);
  $pwd = htmlspecialchars($_REQUEST['password']);
  if(trim($email == '')){
    $message = "Provide Proper Email Address";
    header("Location: profile.php?message=" . $message);
    exit;
  }
  $sql = "SELECT `userId` FROM `table_user` WHERE `email` = '" . $email . "'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $result = $result->fetch_assoc();
    if(!($result['userId'] == $_SESSION['Id'])){
      CloseCon($conn);
      header("Location: profile.php?message=Email Alrady Exist.");
      exit;
    }
  }
  if(!(trim($phone == ''))){
    $sql = "SELECT `userId` FROM `table_user` WHERE `phoneNo` = '" . $phone . "'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $result = $result->fetch_assoc();
      if(!($result['userId'] == $_SESSION['Id'])){
        CloseCon($conn);
        header("Location: profile.php?message=Phone No Alrady Exist.");
        exit;
      }
    }
  }
  if($_FILES["img"]["error"] == 4){
    $img = 'user.png';
  }else{
    $path_parts = pathinfo($_FILES["img"]["name"]);
    $ext = $path_parts['extension'];
    $extensions= array("jpeg","jpg","png");
    if(in_array($ext,$extensions) === false){
      $message = "Not Supported Image File";
      header("Location: profile.php?message=" . $message);
      exit;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      $message = "Sorry, your file is too large.";
      header("Location: profile.php?message=" . $message);
      exit;
    }
    $img = $_SESSION['Id'] . "." . $ext;
    $target_file = "img/User/" . $img;
    if (file_exists($target_file) AND $img != "user.png"){
      unlink($target_file);
    }
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
  }
  $sql = "UPDATE `table_user` SET `phoneNo` = '" . $phone . "', `email` = '" . $email . "', `firstName` = '" . $first . "', `lastName` = '" . $last . "', `pwd` = '" . $pwd . "', `userImg` ='" . $img . "' WHERE `userId` = " . $_SESSION['Id'];
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: profile.php");
    exit;
  } else {
    echo "Error updating record: " . $conn->error;
  }
  CloseCon($conn);
?>
