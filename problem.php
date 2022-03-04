<?php 
  include 'head.php';
  if(!(isset($_SESSION["error"]))){
    if(!(isset($_SESSION["prevPage"]))){
      header("Location: index.php");
      exit;
    }
    header("Location: " . $_SESSION["prevPage"]);
    exit;
  }
  include 'header.php';
?>
  <section style="height:60vh;display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <h1 style="color:red;">We ran Into the Problem</h1>
    <h2 style="color:darkred;"><?php echo $_SESSION["error"]; ?></h2>
    <a style="text-decoration:none" href='<?php echo $_SESSION["prevPage"] ?>'><h1>Go Back</h1></a>
  </section>
<?php 
  include 'footer.php';
  unset($_SESSION['error']);
  unset($_SESSION['prevPage']);
?>

