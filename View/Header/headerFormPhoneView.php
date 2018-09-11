<div class="container-fluid header-form-phone js-header-form-phone">
  <div class="form-text-submit">
    <div class="header-form  js-mail-form-contact">
      <img
        class="btn-form-order-close"
        onclick="close_form_phone();"
        src="<?=VIEW ?>img/cartView/clear-button.png"
        alt=""
      >
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