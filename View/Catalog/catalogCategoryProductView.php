<?php
  $k_product_category = $_REQUEST['k_product_category'];
  $a_product = getProduct($k_product_category);
?>
<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="section-item"><?=$a_product[0]['name_category']?></h2>
    </div>
  </div>
</div>

<div class="container-fluid bootstrap-slider-product-hit-sales">

  <div
    class="container carousel slide"
    id="product-list"
    data-ride="carousel"
    data-interval="false"
  >
    <a class="carousel-control-prev slider-product-control-prev" href="#product-list" data-slide="prev">
      <span class="slider-product-control-prev-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/left-arrow.png" alt="">
      </span>
    </a>
    <a class="carousel-control-next slider-product-control-next" href="#product-list" data-slide="next">
      <span class="slider-product-control-next-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/right-arrow.png" alt="">
      </span>
    </a>

    <ol class="carousel-indicators">
      <?php
      for($j=0;$j<abs(count($a_product)/12);$j++)
      {
        $i_item = $j+1;
        if($j==0)
          echo('<li data-target="#product-list" data-slide-to="'.$j.'"class="active slider-product-indicators">');
        else
          echo('<li data-target="#product-list" data-slide-to="'.$j.'"class="slider-product-indicators">');

        echo('
            <span class="indicators-text">'.$i_item.'</span>
          </li>
        ');
      }
      ?>
    </ol>

    <div class="hr-blue"></div>

    <div class="carousel-inner">
      <?php
      $i_count = 0;
      $j_count = 0;
      foreach($a_product as $a_item)
      {
        if($i_count==0)
        {
          echo('
            <div class="carousel-item active">
              <div class="row product-list-row">
          ');
        }

        $i_count += 1;
        $j_count += 1;
        if($i_count == 13)
        {
          $i_count=1;
          echo('<div class="carousel-item">');
        }

        if($j_count == 5)
        {
          $j_count=1;
          echo('<div class="row product-list-row">');
        }

        $o_img = $a_item['is_stock'] ? '<img class="product-item-status-img" src="'.VIEW.'img/productView/Aktsia.png" alt="">' : '';

        echo('
        <div class="col-md-3 col-sm-6 m-product-list">
          <div class="product-item">
            '.$o_img.'
            <ul>
              <li class="product-item-img">
                <a href="product&k_product='.$a_item['k_product'].'">
                  <img src="'.VIEW.'upload_img/product/'.$a_item['img'].'" alt="">
                </a>
              </li>
              <li class="product-item-title">
                <h4>
                  <a href="product&k_product='.$a_item['k_product'].'">'.$a_item['s_name'].'</a>
                </h4>
              </li>
              <li class="product-item-box">
                <div class="container">
                  <div class="row">
                    <div class="product-item-cost col-9">
        ');

        if($a_item['i_discount'])
        {
          echo('
            <p class="price">
              <span class="js-price-active">'.number_format($a_item['i_price'], 0, '.', ' ').'</span> руб.
            </p>
            <p class="discount">'.number_format($a_item['i_discount'], 0, '.', ' ').' руб.</p>
          ');
        }
        else
        {
          echo ('<p class="price-active"><span class="js-price-active">'.number_format($a_item['i_price'], 0, '.', ' ').'</span> руб.</p>');
        }
        echo('
                        </div>
                        <div class="col-3 add-cart-box">
                          <a href="#" onclick="add_to_cart(this); return false;" name="'.$a_item['k_product'].'" class="add-to-cart">
                            <img src="'.VIEW.'img/productView/shopping-cart.png" alt="">
                          </a>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        ');

        if($j_count==4&&$i_count!=12)
          echo('</div>');

        if($i_count == 12)
        {
          echo('</div>');
          echo('</div>');
        }
      }
      ?>
    </div>
  </div>

  <div class="hr-blue m-0 m-hr-blue"></div>
  <a class="carousel-control-prev slider-product-control-prev m-product-control" href="#product-list" data-slide="prev">
    <span class="slider-product-control-prev-icon">
      <img class="icon-arrow" src="<?=VIEW?>img/productView/left-arrow.png" alt="">
    </span>
  </a>
  <a class="carousel-control-next slider-product-control-next m-product-control" href="#product-list" data-slide="next">
    <span class="slider-product-control-next-icon">
      <img class="icon-arrow" src="<?=VIEW?>img/productView/right-arrow.png" alt="">
    </span>
  </a>
</div>
</div>
</div>