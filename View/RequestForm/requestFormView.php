<?php 
  include('actionForm.php');
?>
<div class="container-fluid request-form contact-form">
   <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="section-item">ОСТАВЬТЕ ЗАЯВКУ</h3>
        <form action="<?= $_SERVER['REQUEST_URI']?>" method="post" id="request-form" class="form-text-submit">
          <div class="row">
            <div class="col-6">
              <input type="text" placeholder="Имя" name="s_name">
            </div>
            <div class="col-6">
              <input type="text" placeholder="Телефон" name="s_phone">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="message-container">
                <textarea  class="message" name="s_message"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="request-form-desc">
                <img src="<?=VIEW?>img/contactView/locked-padlock.png"alt="" alt="">
                <p>Мы гарантируем конфеденциальность ваших данных</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-5">
                <input type="submit" value="Отправить" class="btn">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</div> 