<div class="container-fluid slider-our-work">

  <div
    class="container carousel slide"
    id="our-work"
    data-ride="carousel"
    data-interval="false"
  >
    <a class="carousel-control-prev slider-product-control-prev" href="#our-work" data-slide="prev">
      <span class="slider-product-control-prev-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/left-arrow.png" alt="">
      </span>
    </a>
    <a class="carousel-control-next slider-product-control-next" href="#our-work" data-slide="next">
      <span class="slider-product-control-next-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/right-arrow.png" alt="">
      </span>
    </a>

    <ol class="carousel-indicators">
      <?php
        for($j = 0; $j < 4; $j++)
        {
          $i_item = $j+1;
          if($j==0)
            echo('<li data-target="#our-work" data-slide-to="'.$j.'"class="active slider-product-indicators">');
          else
            echo('<li data-target="#our-work" data-slide-to="'.$j.'"class="slider-product-indicators">');
          echo('<span class="indicators-text">'.$i_item.'</span>');
          echo('</li>');
        }
      ?>
    </ol>

    <div class="hr-blue"></div>

    <div class="carousel-inner">

      <div class="carousel-item active">
        <div class="row product-list-row">
          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/1.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_tank.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Септик Танк</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/2.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_yunilos.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Септик Юнилос</h4>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row product-list-row">
          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/5.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/6.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/7.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/8.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row product-list-row">
          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/11.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_astra.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Септик астра</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_yunolis_pl.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Юнилос +</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/12.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row product-list-row">
          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_tank1.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Септик Танк</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/13.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/14.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Монтаж Септика</h4>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 m-product-list">
            <div class="product-item">
              <ul>
                <li class="product-item-img">
                  <img src="<?=VIEW?>img/ourWorkView/septic_tank2.jpg" alt="">
                </li>
                <li class="product-item-title">
                  <h4>Септик Танк</h4>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hr-blue m-0 m-hr-blue"></div>
    <a class="m-2 carousel-control-prev slider-product-control-prev m-product-control" href="#our-work" data-slide="prev">
      <span class="slider-product-control-prev-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/left-arrow.png" alt="">
      </span>
    </a>
    <a class="m-2 carousel-control-next slider-product-control-next m-product-control" href="#our-work" data-slide="next">
      <span class="slider-product-control-next-icon">
        <img class="icon-arrow" src="<?=VIEW?>img/productView/right-arrow.png" alt="">
      </span>
    </a>
  </div>
</div>