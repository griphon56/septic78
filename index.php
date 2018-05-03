<?php
  require_once('header/mainMenu/mainMenu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style/main.css" rel="stylesheet">
  <title>Septic78</title>
  
  <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <div class="wrapper">
     <?php
      include ('header/headerView.php');

      include ('index.inc.php');

      include ('footer/footerView.php');
    ?>
  </div>
  
  
  <script src="js/main.js"></script>
</body>
</html>