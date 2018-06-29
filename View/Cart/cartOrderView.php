<div class="container-fluid cart-order-clearance" id="cart-order-clearance">
  <form action="" method="post" class="form-text-submit">
    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="section-header-h3">Оформление заказа</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="cart-order-input" placeholder="Имя" name="s_name">
        </div>
        <div class="col-md-4">
          <input type="text" class="cart-order-input" placeholder="Телефон" maxlength="13" name="s_phone">
        </div>
        <div class="col-md-4">
          <input type="text" class="cart-order-input" placeholder="example@gmail.com" name="s_email">
          <h4 class="cart-placeholder-input">Отправка информации о заказе</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <input type="text" placeholder="Адрес доставки" class="cart-order-input" name="s_address">
          <h4 class="cart-placeholder-input">Рассчитаем стоимость доставки и свяжемся с вами</h4>
        </div>
        <div class="col-md-4">
          <div class="checkbox-container">
            <input type="checkbox" value="1" name="is_agree" id="is_agree">
            <label class="cart-order-label label-input" for="is_agree">Согласен с условиями <span>публичной сферы</span></label>
          </div>
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