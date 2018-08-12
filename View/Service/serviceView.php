<?php
  $a_service_category = getServiceCategory($_GET['k_service_category']);
?>
<div class="container service">
  <div class="row">
    <div class="col-md-12">
      <h2 class="section-header">Наши услуги</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item"><?=$a_service_category['s_name'];?></h3>
      <div class="service-category-desc">
        <?=$a_service_category['s_description'];?>
      </div>
    </div>
  </div>
</div>

<?php include('sliderView.php');?>

<div class="service-form-bg m-service-form-bg">
  <img class="img-bg m-img-bg" src="<?=VIEW?>img/serviceView/water3.png" alt="">
  <div class="container service">
    <div class="row">
        <div class="col-md-12">
          <h3 class="section-item m-service-item">Узнать подробности у специалиста</h3>
        </div>
    </div>
  </div>

  <?php include(USER_TEMPLATE.'RequestForm/requestFormView.php');?>
</div>