<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style/main.css" rel="stylesheet">
  <title>Septic78</title>
  
  <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    
</head>
<body>
  <div class="wrapper">
     <?php
        include ('header/headerView.php');
        include ('header/mainMenu/mainMenuView.php');
		include ('ShippingPayment/ShippingPaymentView.php');
        include ('Form/FormView.php');
        include ('Footer/footerView.php');
     ?>
  </div>
</body>
</html>