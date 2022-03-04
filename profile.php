<?php 
  include 'head.php';
  if(!(isset($_SESSION["logged"]))){
    header("Location: login.php");
    exit;
  }
  include 'dbcon.php';
  $conn = OpenCon();
  if($conn->connect_error){
    $_SESSION['error'] = "Connection error";
    $_SESSION['prevPage'] = "login.php";
    header("Location: problem.php");
    exit;
  }
  $sql = "SELECT * FROM `table_user` WHERE `userId` = " . $_SESSION['Id'];
  $result = $conn->query($sql);
  CloseCon($conn);
  $result = $result->fetch_assoc();
  $img = $result['userImg'];
  $uname = $result['userName'];
  $fname = $result['firstName'];
  $lname = $result['lastName'];
  $phone = $result['phoneNo'];
  $mail = $result['email'];
  $password = $result['pwd'];
  unset($conn, $sql, $result);
?>
	<title>Profile</title>
	<link rel="stylesheet" hreflang="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/profile.css" type="text/css">
<?php include 'header.php' ?>
  <section>
    <div class="user-details">
      <img src="img/User/<?php echo $img ?>" alt="User Image" class="user-img">
      <div>
        <p>Name : <?php echo $fname ?> <?php echo $lname ?></p>
        <p>Phone : <?php echo $phone ?></p>
        <p>Email : <?php echo $mail ?></p>
        <a href="logout.php"><input type="button" class="btn-animation" value="Log Out" style="padding:10px;"></a>
      </div>
    </div>
    <table class="user-update">
      <tr>
        <td><label for="uname">UserName </label></td>
        <td><input type="text" value="<?php echo $uname ?>" readonly></td>
      </tr>
      <form action="update.php" method="POST" enctype="multipart/form-data">
        <tr>
          <td><label for="phone">Phone No </label></td>
          <td><input type="text" name="phone" value="<?php echo $phone ?>"></td>
        </tr>
        <tr>
          <td><label for="email">E-Mail </label></td>
          <td><input type="email" name="email" value="<?php echo $mail ?>" required></td>
        </tr>
        <tr>
          <td><label for="first">First Name </label></td>
          <td><input type="text" name="first" value="<?php echo $fname ?>"></td>
        </tr>
        <tr>
          <td><label for="last">Last Name </label></td>
          <td><input type="text" name="last" value="<?php echo $lname ?>"></td>
        </tr>
        <tr>
          <td><label for="img">Change Image </label></td>
          <td><input type="file" name="img"></td>
        </tr>
        <tr>
          <td><label for="password">Password </label></td>
          <td><input type="password" name="password" id="password" value="<?php echo $password ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="checkbox" onclick="fun1(this)"> Show Password</td>
        </tr>
        <tr>
          <th colspan="2"><input type="submit" value="Update" class="btn-animation"></th>
        </tr>
      </form>
    </table>
  </section>
  <?php include 'footer.php'; include 'messageDisplay.php' ?>
  <script>
    const pwd = document.getElementById('password');
    function fun1(e){
      if(e.checked){
        pwd.type = "text";
      }else{
        pwd.type = "password";
      }
    }
  </script>
</body>
</html>