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
          background-image: url('.VIEW.'img/headerView/bghome.jpg);
          background-position-y: 1;"
      >
    ');
    echo('
      <div class="container">
        <div class="row align-items-center header-top-content">
          <div class="col col-md-3 col-sm-4 text-phone text">
            <p>Автономные канализации в СПб
              и Ленинградской области.</p>
          </div>
          <div class="col col-md-6 col-sm-4 text-phone text">
            <p>Продажа и установка автономных канализаций, септиков, дренажных систем,
              систем отопление, бернеие скважин, монтаж электрики,
              монтаж газгольдера.</p>
          </div>
          <div class="col col-md-3 col-sm-4 phone text-phone">
            <p class="header-call-btn js-header-call-btn" onclick="open_form_phone();">Заказать звонок:</p>
            <ul>
              <li>
                <p class="header-phone">+7 (821) 413-92-98</p>
              </li>
              <li>
                <p class="header-phone">+8 (800) 200-68-57</p>
              </li>
            </ul>
          </div>
        </div>
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
        <?php include(USER_TEMPLATE.'Header/headerInstallmentView.php');?>
      </div>
    </div>
  </div>
</div>