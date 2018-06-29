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
            <div class="row cart-product-item align-items-center">
              <div class="col-md-2">
                <img src="' . VIEW . 'upload_img/product/' . $a_item['img'] . '" alt="">
              </div>
              <div class="col-md-4">
              <h3 class="cart-product-text">' . $a_item['s_name'] . '</h3>
              </div>
              <div class="col-md-3">
                <div class="quantity" name="' . $a_item['k_product'] . '" onmouseenter="edit_product_cart(this);">
                  <input type="number" min="1" max="50" step="1" value="' . $a_item['i_qty'] . '"  name="qty_product">
                </div>
              </div>
              <div class="col-md-3 js_cart_product_total' . $a_item['k_product'] . '">
                <h3 class="cart-product-text">' . number_format($a_item['i_price'], 0, '.', ' ') . ' руб.</h3>
              </div>
              <a href="#" onclick="del_product_cart(this); return false;" name="' . $a_item['k_product'] . '" class="cart-product-del">
                <img src="' . VIEW . 'img/cartView/clear-button.png" alt="">
              </a>
            </div>
          ');

          if ($i != count($a_data))
            echo('<div class="hr-silver"></div>');
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
    <div class="col-md-9"></div>
    <div class="col-md-3" id="cart-total">
      <p class="cart-total">
        Итого <?php echo(number_format($i_total, 0, '.', ' ')); ?> руб.
      </p>
    </div>
  </div>
</div>

<?php include(USER_TEMPLATE.'Cart/cartOrderView.php')?>