<div class="slider">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <?php

      $a_service = getAllService($_REQUEST['k_service_category'],1);
      if($a_service)
      {
        foreach ($a_service as $k => $a_item)
        {
          $s_active = '';
          if ($k == 0)
            $s_active = 'active';
          if ($k % 2 == 0)
            $s_align = 'justify-content-end';
          else
            $s_align = 'justify-content-start';

          echo('<div class="carousel-item ' . $s_active . '">
          <div class="slide-item">
            <img class="img-fluid" src="' . VIEW . 'upload_img/service/' . $a_item['img'] . '" alt="">
            <div class="container">
              <div class="row  ' . $s_align . '">
                <div class="col-md-5 slide-item-desc">
                  <h2>' . $a_item['s_name'] . '</h2>
                  <div>
                    ' . $a_item['s_description'] . '
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>');
        }
      }
      else
      {
        echo('<h3 class="service-category-empty">В категории отсутствуют услуги</h3>');
      }
      ?>
    </div>

    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>