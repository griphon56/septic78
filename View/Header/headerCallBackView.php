<div class="header-call-back">
  <img
    class="header-call-back-btn"
    src="<?=VIEW?>img/headerView/phone-symbol.png"
    alt="call-back"
    onclick="open_form_callBack();"
  >
</div>

<div class="container-fluid header-form-phone js-header-call-back">
  <div class="form-text-submit">
    <div class="header-form  js-mail-form-contact">
      <img
        class="btn-form-order-close"
        src="<?=VIEW ?>img/cartView/clear-button.png"
        alt=""
        onclick="close_form_phone();"
      >
      <h2 class="header-form-phone-title">
        У вас есть вопросы?
      </h2>
      <ul>
        <li hidden>
          <input type="text" name="s_name" placeholder="Имя" value="noname">
        </li>
        <li>
          <input type="tel" name="s_phone" maxlength="15" placeholder="Телефон">
        </li>
        <li>
          <input type="button" onclick="send_contact(this);" class="btn header-btn" value="Позвоните мне">
        </li>
      </ul>
    </div>
  </div>
</div>