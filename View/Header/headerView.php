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
        <p>Продажа и установка автономных канализаций, септиков, дренажных систем, систем отопление, бернеие скважин, монтаж электрики,
          монтаж газгольдера и монтаж автономной канализации в Санкт-Петербурге и области</p>
      </div>
      <div class="col col-md-3 col-sm-5 phone text-phone">
        <img src="<?=VIEW?>img/headerView/old-typical-phone.png" alt="">
        <p>Сделать заказ по телефону:</p>
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
      <div class="col-2 col-md-4 col-sm-5">
        <?php include (USER_TEMPLATE.'Search/searchView.php'); ?>
      </div>
      <div class="col-2 col-md-2 col-sm-1">
        <div class="container-cart" id="cart-header">
          <a class="cart-container-box" href="cart">
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
      <div class="col-md-7 col-sm-5 m-header-target-form-title">
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
      <div class="col col-md-5 col-sm-7">
        <div class="header-form">
          <div class="row form-text-submit js-mail-form-contact">
            <ul>
              <li>
                <input type="text" name="s_name" placeholder="Имя">
              </li>
              <li>
                <input type="tel" name="s_phone" maxlength="15" placeholder="Телефон">
              </li>
              <li>
                <input type="button" onclick="send_contact(this);" class="btn header-btn" value="Заказать бесплатную консультацию">
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>