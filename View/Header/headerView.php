<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?=TITLE?></title>

  <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
  <script src="<?=VIEW?>js/bootstrap.min.js"></script>
  <script src="<?=VIEW?>js/jquery.swipebox.js"></script>

  <link href="<?=VIEW?>style/main.css" rel="stylesheet">
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
      <div class="col col-md-8 text-phone text">
        <p>Продажа и установка автономных канализаций, септиков в Санкт-Петербурге и области</p>
      </div>
      <div class="col col-md-2 phone text-phone">
        <p>Сделать заказ по телефону:</p>
      </div>
      <div class="col col-md-2 phone">
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
      <div class="col-md-6">
        <div class="header-logo">
          <a href="index.php?id_page=home"><img src="<?=VIEW?>img/headerView/3.png" alt=""></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="search-input">
          <div class="box-search">
            <input type="search" id="search" placeholder="Поиск по сайту..." />
              <img src="<?=VIEW?>img/headerView/magnifying-glass.png" alt="" />
            </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="container-cart" id="cart-header">
          <a class="cart-container-box" href="index.php?id_page=cart">
            <div
              class="js-container-cart-count-product container-cart-count-product"
              <?php if($a_cart_data['i_qty']) echo('style="display:block;"');?>
            >
              <div class="cart-count-product">
                <span class="js-cart-count-product"><?=$a_cart_data['i_qty']?></span>
              </div>
            </div>
            <div class="cart">
              <div>
                <img src="<?=VIEW?>img/headerView/shopping-purse-icon.png" alt="">
                <p>Корзина <span id=header-cost><?=number_format($a_cart_data['i_total'], 0, '.', ' ');?></span> руб.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include ('MainMenu/mainMenuView.php'); ?>


<div class="container-fluid header-target-form">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-7">
        <h3 class="header-target-form-title">Нужна канализация?</h3>
        <p class="header-target-form-desc">
          Септик5.рф - городской комфорт
        </p>
        <p class="header-target-form-desc">
          в загородном доме с выгодой
        </p>
        <p class="header-target-form-desc">
          для вашего кошелька
        </p>
      </div>
      <div class="col-md-5">
        <form action="" class="header-form">
          <div class="row form-text-submit">
            <ul>
              <li>
                <input type="text" placeholder="Имя">
              </li>
              <li>
                <input type="tel" placeholder="Телефон">
              </li>
              <li>
                <input type="submit" class="btn" value="Заказать">
              </li>
            </ul>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>