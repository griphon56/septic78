<div class="container-fluid slider-home-service">
  <div class="row">
    <?php
    $a_data_service = getServiceCategory();

    if($a_data_service)
    {
      foreach($a_data_service as $k=>$a_item)
      {
        if($k==6) break;
        $a_config = unserialize($a_item['z_data']);
        echo('
          <div class="col-md-2 p-0">
            <div class="item-slider-home-container">
              <div class="slider-home-service-shadow"></div>
              <img src="'.VIEW.'upload_img/category_service/'.$a_config['img'].'" alt="" class="slider-home-img-bg">
              <div class="slider-home-item-text">
                <h4 class="slider-home-title">'.$a_item['s_name'].'</h4>
              </div>
              <div class="slider-home-item-text slider-display-button">
                <a href="index.php?id_page=service&k_service_category='.$a_item['k_service_category'].'" class="slider-home-button">Подробнее</a>
              </div>
            </div>
          </div>
        ');
      }
    }
    ?>
  </div>
</div>