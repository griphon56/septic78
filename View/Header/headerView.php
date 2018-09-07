<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?=TITLE?></title>

  <link rel="icon" href="<?=VIEW?>img/headerView/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?=VIEW?>img/headerView/favicon.png" type="image/x-icon">

</head>
<body>
<div class="wrapper">

<?php
  include(USER_TEMPLATE.'Notification/notificationView.php');

  $a_cart_data = getCartHeaderSession();
?>

<div
  class="container-fluid header-search header-cart"
  style="display: none;"
>
  <div class="container">
    <div class="row no-gutters align-items-center">
      <div class="m-header-menu col-3 col-sm-1">
        <div class="m-menu-icon js-m-menu-icon" onclick="menu_open(this);">
          <div class="icon-item-1"></div>
          <div class="icon-item-2"></div>
          <div class="icon-item-3"></div>
        </div>
      </div>
      <div class="col-5 col-md-6 col-sm-5">
        <div class="header-logo">
          <a href="home"><img src="<?=VIEW?>img/headerView/logo.png" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
  include ('MainMenu/mainMenuView.php');
  include ('headerFormTargetView.php');
?>