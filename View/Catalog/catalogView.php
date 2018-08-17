<?php
  include(USER_TEMPLATE.'Product/productAbstaract.php');
  include(USER_TEMPLATE.'Catalog/catalogMarkerCategory.php');

  $k_product_category = $_REQUEST['k_product_category'];
  $a_product = getProduct($k_product_category);

  if(isset($a_product[0]['name_category']))
    include(USER_TEMPLATE.'Catalog/catalogCategoryProductView.php');
  else
    echo('<h3 class="empty-text">В категории нет товаров</h3>');

  include(USER_TEMPLATE.'Cart/cartOrderView.php');

  include(USER_TEMPLATE.'Catalog/catalogCategoryDescriptionView.php');
?>

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
