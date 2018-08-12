<?php
  $id_page = getPageId();
  if($id_page == 'service')
  {
    $a_single_category = getServiceCategory($_GET['k_service_category']);
    $z_data = unserialize($a_single_category['z_data']);
    echo('
      <div 
        class="container-fluid header-target-form"
        style="background-image: url('.VIEW.'upload_img/category_service/'.$z_data['img'].');"
      >
    ');
    echo('
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7 col-sm-5 m-header-target-form-title">
            <h3 class="header-target-form-title">'.$a_single_category['s_name'].'</h3>
            <p class="header-target-form-desc">
              Оформите заказ прямо сейчас
            </p>
          </div>
    ');
  }
  else
  {
    echo('
      <div 
        class="container-fluid header-target-form"
        style="
          background-image: url('.VIEW.'img/headerView/bg.png);
          background-position-y: 0;"
      >
    ');
    echo('
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7 col-sm-5 m-header-target-form-title">
            <h3 class="header-target-form-title">Нужна канализация?</h3>
            <p class="header-target-form-desc">
              Септик5.рф - городской комфорт
            </p>
            <p class="header-target-form-desc">
              в загородном доме с выгодой
            </p>
            <p class="header-target-form-desc">
              для вашего кошелька
            </p>
          </div>
    ');
  }
?>
      <div class="col col-md-5 col-sm-7">
        <div class="header-form">
          <div class="row form-text-submit js-mail-form-contact">
            <ul>
              <li>
                <input type="text" name="s_name" placeholder="Имя">
              </li>
              <li>
                <input type="tel" name="s_phone" maxlength="15" placeholder="Телефон">
              </li>
              <li>
                <input type="button" onclick="send_contact(this);" class="btn header-btn" value="Заказать">
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>