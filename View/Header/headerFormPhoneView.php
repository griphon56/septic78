<div class="container-fluid header-form-phone js-header-form-phone">
  <img class="btn-form-order-close" src="<?=VIEW ?>img/cartView/clear-button.png" alt="">
  <div class="close-order-form" onclick="close_form_phone();"></div>
  <div class="form-text-submit">
    <div class="header-form  js-mail-form-contact">
      <h2 class="header-form-phone-title">
        Заказать обратный звонок
      </h2>
      <ul>
        <li>
          <input type="text" name="s_name" placeholder="Имя">
        </li>
        <li>
          <input type="tel" name="s_phone" maxlength="15" placeholder="Телефон">
        </li>
        <li>
          <input type="button" onclick="send_contact(this);" class="btn header-btn" value="Заказать звонок">
        </li>
      </ul>
    </div>
  </div>
</div>