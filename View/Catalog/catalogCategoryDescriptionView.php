<?php
  $k_product_category = $_REQUEST['k_product_category'];
  $a_category = getProductCategory($k_product_category);
?>

<div
  class="container-fluid catalog-category-desc-container"
  style="background-image: url(<?=VIEW.'upload_img/category_product/'.$a_category['s_img']?>);"
>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="catalog-category-desc-title"><?=$a_category['s_title']?></h2>
        <div>
          <p class="catalog-category-desc-content"><?=$a_category['s_description']?></p>
        </div>
      </div>
    </div>
  </div>
</div>
