<div class="container cart-product-container" id="cart-product-container">
  <div class="row">
    <div class="col">
      <h2 class="section-item">Корзина</h2>
    </div>
  </div>

  <form action="" method="post" id="cart-product-form">
    <?php

      $i_total = 0;
      if(isset($_SESSION['cart'])&&count($_SESSION['cart']))
      {
        $a_data = getCartProduct($_SESSION['cart']);
        $i = 0;
        foreach ($a_data as $a_item)
        {
          $i_total += $a_item['i_price'];
          $i += 1;
          echo('
            <div class="row cart-product-item align-items-center m-cart-box">
              <div class="col-md-2 m-cart-table-img">
                <div class="cart-product-img-wrap">
                  <a href="index.php?id_page=product&k_product='.$a_item['k_product'].'">
                    <img src="' . VIEW . 'upload_img/product/' . $a_item['img'] . '" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-4 m-cart-table-title">
              <h3 class="cart-product-text"><a href="index.php?id_page=product&k_product='.$a_item['k_product'].'">' . $a_item['s_name'] . '</a></h3>
              </div>
              <div class="col-md-3 m-cart-table-qty">
                <div class="quantity js-quantity-cart">
                  <input type="number" min="1" max="50" step="1" value="' . $a_item['i_qty'] . '" name="' . $a_item['k_product'] . '">
                </div>
              </div>
              <div class="col-md-3 m-cart-table-total js_cart_product_total' . $a_item['k_product'] . '">
                <h3 class="cart-product-text">' . number_format($a_item['i_price'], 0, '.', ' ') . ' руб.</h3>
              </div>
              <a href="#" onclick="del_product_cart(this); return false;" name="' . $a_item['k_product'] . '" class="cart-product-del">
                <img src="' . VIEW . 'img/cartView/clear-button.png" alt="">
              </a>
            </div>
          ');
        }
      }
      else
        echo('
          <div class="row">
            <div class="col">
              <h3 class="cart-product-empty">Корзина пуста</h3>
            </div>
          </div>
        ');
    ?>
  </form>

  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4" id="cart-total">
      <p class="cart-total m-cart-total">
        Итого <?php echo(number_format($i_total, 0, '.', ' ')); ?> руб.
      </p>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Cart/cartOrderView.php')?>