<div class="container-fluid footer">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="footer-item-title">
          <h4>Контакты</h4>
        </div>
        <ul class="footer-item">
          <li>
            <img src="<?=VIEW?>img/footerView/facebook-placeholder-for-locate-places-on-maps.png" alt="">
            <p>ул. Речная 64</p>
          </li>
          <li>
            <img src="<?=VIEW?>img/footerView/telephone-of-old-design.png" alt="">
            <p>+7 (821) 413-92-98</p>
          </li>
          <li>
            <p>  +8 (800) 200-68-57</p>
          </li>
          <li>
            <img src="<?=VIEW?>img/footerView/close-envelope.png" alt="">
            <p>mail@example.com</p>
          </li>
        </ul>
      </div>
      <div class="col-md-2">
        <div class="footer-item-title">
          <h4>Наши услуги</h4>
        </div>
        <ul class="footer-item">
          <?php

            $a_data_service_category = getServiceCategory();

            foreach ($a_data_service_category as $key => $a_item)
            {
              echo ('<li><a href="index.php?id_page=service&k_service_category='.$a_item['k_service_category'].'">'.$a_item['s_name'].'</a></li>');
            }  
          ?>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="footer-item-title">
          <h4>Каталог</h4>
        </div>
        <div class="row">
          <ul class="footer-item col-md-6">
            <li><a href="#">Септики</a></li>
            <li><a href="#">Погреба</a></li>
            <li><a href="#">Бойлеры</a></li>
            <li><a href="#">Насосные системы</a></li>
          </ul>
          <ul class="footer-item col-md-6">
            <li><a href="#">Септики</a></li>
            <li><a href="#">Погреба</a></li>
            <li><a href="#">Бойлеры</a></li>
            <li><a href="#">Насосные системы</a></li>
          </ul>
        </div>
      </div>  
      <div class="col-md-2">
        <div class="footer-item-title">
          <h4>О компании</h4>
        </div>
        <ul class="footer-item">
          <li><a href="index.php?id_page=about_company">Наши партнеры</a></li>
        </ul>
      </div> 
      <div class="col-md-2">
        <div class="footer-item-title">
          <h4>Доставка и оплата</h4>
        </div>
        <ul class="footer-item">
          <li><a href="index.php?id_page=shipping_pay">Выбор и заказ</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid copyright">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-md-3">
        <p class="copyright-title">&copy; Web Studio "Little Landing", 2018</p>
      </div>
      <div class="col-md-3">
        <ul class="copyright-social">
          <li><a href="#"><img src="<?=VIEW?>img/footerView/facebook-logo-button.png" alt=""></a></li>
          <li><a href="#"><img src="<?=VIEW?>img/footerView/instagram.png" alt=""></a></li>
          <li><a href="#"><img src="<?=VIEW?>img/footerView/twitter-logo-button.png" alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

</div>

<script src="<?=VIEW?>js/slick.js"></script>
<script src="<?=VIEW?>js/main.js"></script>
</body>
</html>