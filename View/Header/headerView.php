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

<div class="container-fluid header-top-line">
  <div class="container">
    <div class="row no-gutters">
      <div class="col col-md-7 col-sm-4 text-phone text">
        <p>Автономные канализации в СПб
          и Ленинградской области.</p>
      </div>
      <div class="col col-md-7 col-sm-4 text-phone text">
        <p>Продажа и установка автономных канализаций, септиков, дренажных систем,
          систем отопление, бернеие скважин, монтаж электрики,
          монтаж газгольдера.</p>
      </div>
      <div class="col col-md-3 col-sm-5 phone text-phone">
        <img src="<?=VIEW?>img/headerView/old-typical-phone.png" alt="">
        <p>Заказать бесплатную консультацию:</p>
      </div>
      <div class="col col-md-2 col-sm-3 phone">
        <ul>
          <li>
            <p>+7 (821) 413-92-98</p>
          </li>
          <li>
            <p>+8 (800) 200-68-57</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid header-search header-cart">
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
          <a href="home"><img src="<?=VIEW?>img/headerView/3.png" alt=""></a>
        </div>
      </div>
      <div class="col-4 col-md-6 col-sm-6">
        <?php include (USER_TEMPLATE.'Search/searchView.php'); ?>
      </div>
    </div>
  </div>
</div>


<?php
  include ('MainMenu/mainMenuView.php');

  include ('headerFormTargetView.php');
?>