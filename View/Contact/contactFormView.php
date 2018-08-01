<div class="container-fluid contact-form">
  <div class="container">
   <div class="row">
     <div class="col-md-12">
       <h3 class="contact-form-title">Оставьте свои контакты и мы перезвоним вам</h3>
     </div>
   </div>
    <form action="#" id="contact-form" class="form-text-submit js-mail-form-contact">
      <div class="row">
        <div class="col-md-4 m-view"><input type="text" name="s_name" placeholder="Имя"></div>
        <div class="col-md-4 m-view"><input type="text" name="s_phone" maxlength="15" placeholder="Телефон"></div>
        <div class="col-md-4 m-view"><input type="submit" onclick="send_contact(this);return false;" value="Отправить" class="btn"></div>
      </div>
    </form>
    <div class="row">
      <div class="col-md-12">
        <div class="contact-seal">
          <img src="<?=VIEW?>img/contactView/locked-padlock.png" alt="">
          <p>Мы гарантируем конфеденциальность ваших данных</p>
        </div>
      </div>
    </div>
  </div>
</div>


