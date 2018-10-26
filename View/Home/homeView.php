<?php
  include ('View/Home/homeModel.php');

  include(USER_TEMPLATE.'Cart/cartOrderView.php');
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Лидеры продаж септики</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Product/productListHitSalesView.php');?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Лидеры продаж погребы</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Product/productListView.php');?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Примеры работ</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Home/homeSliderOurWorkView.php');?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Наши услуги</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Home/homeSliderServiceView.php');?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Наши преимущества</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Home/homeSkillView.php');?>

<div class="container m-home-brand">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Производители</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Home/homeSliderBrandView.php');?>

<?php include(USER_TEMPLATE.'FormCalculationCost/formCalculationCostView.php');?>

<?php include(USER_TEMPLATE.'Footer/footerAboutUs.php');?>
