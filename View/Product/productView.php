<?php
  $a_product = getSingleProduct($_REQUEST['k_product']);
  $a_category = getProductCategory($a_product['k_product_category']);

  $z_data = unserialize($a_product['z_data']);

  $a_config = $z_data['a_config'];
  $a_feature = $z_data['a_feature'];
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item"><?=$a_category['s_title']?></h2>
    </div>
  </div>
</div>
<div class="hr-blue"></div>

<div class="container product-single-container">
  <div class="row">
    <table class="product-config">
      <tr>
        <td class="w-50 align-top">
          <div class="container include-with-product">
            <div class="row">
              <label class="include-with-product-label" for="">Можно подключить:</label>
            </div>
            <div class="row">
              <?php
               foreach ($a_config as $s_key => $a_item)
               {
                 if($a_item)
                 {
                   echo('<div class="col include-with-product-img">');
                   echo('<img src="'.VIEW.'img/productView/'.substr($s_key,2).'.png" alt="">');
                   echo('<p class="include-with-product-count">X'.$a_item.'</p>');
                   echo('</div>');
                 }
               }
              ?>
            </div>
          </div>
        </td>
        <td rowspan="2" class="w-50">
          <div class="product-single-img">
            <img src="<?=VIEW.'upload_img/product/'.$a_product['img']?>" alt="">
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="container">
            <div class="row col">
              <p class="product-single-price">Стоимость:
                <span class="js-price-active"><?=number_format($a_product['i_price'], 0, '.', ' ')?></span><span> руб.</span>
              </p>
            </div>
            <div class="row">
              <div class="col-md-8">
                <a href="#" onclick="add_to_cart_single(this); return false;" name="<?=$a_product['k_product']?>" class="btn btn-info product-single-btn">Заказать</a>
              </div>
              <div class="col-md-4">
                <div class="quantity">
                  <input type="number" min="1" max="9" step="1" value="1" name="qty_product">
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="row">
    <div class="col">
      <h2 class="section-item">Характеристики <?=$a_product['s_name']?></h2>
    </div>
  </div>
  <div class="row col">
    <?php
      if($a_feature)
      {
        echo('<table class="product-feature table table-bordered table-hover">');
        foreach ($a_feature as $a_item)
        {
          echo('
            <tr>
              <td>'.$a_item['z_item_offset'].'</td>
              <td>'.$a_item['z_item_val'].'</td>
            </tr>
          ');
        }
        echo('</table>');
      }
      else
      {
        echo('<h3 class="empty-block">Характеристики отсутствуют</h3>');
      }
    ?>
  </div>
</div>

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


<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Производители</h2>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Home/homeSliderBrandView.php');?>

<?php include(USER_TEMPLATE.'FormCalculationCost/formCalculationCostView.php');?>

<?php include(USER_TEMPLATE.'Footer/footerAboutUs.php');?>
