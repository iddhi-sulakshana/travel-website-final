<?php include 'head.php' ?>
	<title>Profile</title>
	<link rel="stylesheet" hreflang="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/profile.css" type="text/css">
<?php include 'header.php' ?>
  <section>
    <div class="user-details">
      <img src="img/User/user.png" alt="User Image" class="user-img">
      <div>
        <p>Name : Name Names</p>
        <p>Phone : 0111111111</p>
        <p>Email : any@hotmail.com</p>
      </div>
    </div>
    <table class="user-update">
      <tr>
        <td><label for="uname">UserName </label></td>
        <td><input type="text" value="hello" readonly></td>
      </tr>
      <form action="#" method="POST">
        <tr>
          <td><label for="phone">Phone No </label></td>
          <td><input type="text" name="phone"></td>
        </tr>
        <tr>
          <td><label for="email">E-Mail </label></td>
          <td><input type="text" name="email"></td>
        </tr>
        <tr>
          <td><label for="first">First Name </label></td>
          <td><input type="text" name="first"></td>
        </tr>
        <tr>
          <td><label for="last">Last Name </label></td>
          <td><input type="text" name="last"></td>
        </tr>
        <tr>
          <th colspan="2"><input type="submit" value="Update" class="btn-animation"></th>
        </tr>
      </form>
    </table>
  </section>
  <?php include 'footer.php' ?>
</body>
</html>