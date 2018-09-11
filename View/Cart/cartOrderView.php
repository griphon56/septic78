<div
  class="container-fluid cart-order-clearance js-cart-order-clearance"
  id="cart-order-clearance"
>
  <form action="" method="post" class="form-text-submit">
    <div class="container cart-order-clearance-box">
      <img
        class="btn-form-order-close"
        onclick="close_order_form();"
        src="<?=VIEW ?>img/cartView/clear-button.png"
        alt=""
      >
      <div class="row">
        <div class="col">
          <h3 class="section-header-h3">Оформление заказа</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="cart-order-input m-cart-input-text" placeholder="Имя" name="s_name">
        </div>
        <div class="col-md-4">
          <input type="text" class="cart-order-input m-cart-input-text" placeholder="Телефон" maxlength="13" name="s_phone">
        </div>
        <div class="col-md-4">
          <input type="text" class="cart-order-input" placeholder="example@gmail.com" name="s_email">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <input type="text" placeholder="Адрес доставки" class="cart-order-input" name="s_address">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h4 class="cart-order-delivery-method">Варианты оплаты</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="radio-container">
          <?php
            $a_delivery = getDelivery();
            foreach ($a_delivery as $a_item)
            {
              echo (' 
                <input type="radio" id="delivery_'.$a_item['k_delivery'].'" value="'.$a_item['k_delivery'].'" name="delivery">
                <label class="cart-order-label label-input" for="delivery_'.$a_item['k_delivery'].'">'.$a_item['s_name'].'</label>
              ');
            }
          ?>
          </div>
        </div>
        <div class="col-md-4">
          <a href="#" onclick="save_order(this); return false;" class="btn btn-info cart-order-btn">Отправить</a>
        </div>
      </div>
    </div>
  </form>
</div>