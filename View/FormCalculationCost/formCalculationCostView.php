<?php
  include('formCalculationCostModel.php');

  $a_category_form = getCategoryFormCalc([
    CATEGORY_SEPTIC_ASTRA,
    CATEGORY_SEPTIC_BIODEKA,
    CATEGORY_SEPTIC_ROSTOK,
    CATEGORY_SEPTIC_EUROBION,
    CATEGORY_SEPTIC_KOLOVESI
  ]);
?>
<div class="calc-cost-container">
  <div class="container-fluid">
    <form id="calc-cost-form" action="/" method="post">
      <div class="container">
        <div class="row">
          <div class="col">
            <h3 class="section-header-h3">Расчет стоимости автономной канализации</h3>
          </div>
        </div>
        <div class="row js-calc-cost-container">
          <div class="col-md-4 calc-cost-box">
            <ul>
              <li class="calc-cost-relative">
                <h4 class="calc-cost-text">Количество человек в доме</h4>
                <input class="calc-cost-count js-calc-cost-count" type="text" value="2"/>
              </li>
              <li>
                <div class="calc-cost-range-container">
                  <input type="range" min="1" max="15" value="2" class="calc-cost-range" id="range-calc-cost"/>
                </div>
              </li>
              <li>
                <h4 class="calc-cost-text">Производитель</h4>
                <select name="calc-cost-generator" id="calc-cost-generator" class="calc-cost-generator">
                  <?php
                    foreach($a_category_form as $k => $a_item)
                    {
                      echo('<option value="'.$a_item['k_product_category'].'">'.$a_item['s_title'].'</option>');
                    }
                  ?>
                </select>
              </li>
            </ul>
          </div>
          <div class="col-md-3 calc-cost-box js-mail-calc-cost">
            <ul>
              <li>
                <input class="calc-cost-contact" name="s_name" type="text" placeholder="Имя">
              </li>
              <li>
                <input class="calc-cost-contact" name="s_phone" type="tel" placeholder="Телефон">
              </li>
              <li>
                <input type="button" onclick="send_calc_form(this);return false;" class="btn calc-cost-btn" value="ОТПРАВИТЬ">
              </li>
            </ul>
          </div>
          <div class="col-md-5 calc-cost-box js-calc-cost-box">
            <?php
              foreach($a_product_form as $k => $a_item)
              {
                $s_active = $k==0 ? 'active-calc-cost ' : '';

                echo('
                  <table class="'.$s_active.'calc-cost-box-table js-table-item-'.$k.'">
                    <tr >
                      <td rowspan="3">
                        <div class="calc-cost-box-img-title">
                          <img 
                            class="js-calc-cost-box-img-title" 
                            src="'.VIEW.'upload_img/product/'.$a_item['img'].'" 
                            alt=""
                          >
                        </div>
                      </td>
                      <td>
                        <div class="calc-cost-icon-desc">
                          <img src="'.VIEW.'img/formCalculationCostView/people.png" alt="">
                          <span class="js-calc-cost-count-people">2</span>
                          <span> чел.</span>
                        </div>
                        <div class="calc-cost-icon-desc">
                          <img src="'.VIEW.'img/formCalculationCostView/valve.png" alt="">
                          <span>'.(0.6+$k*0.5).' м3/сут</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="calc-cost-icon-desc">
                          <img src="'.VIEW.'img/formCalculationCostView/water-faucet.png" alt="">
                          <span>'.(0.96+$k*0.5).' л/час.</span>
                        </div>
                        <div class="calc-cost-icon-desc">
                          <img src="'.VIEW.'img/formCalculationCostView/lightbulb.png" alt="">
                          <span>'.(150+$k*50).' кВт/сут</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="calc-cost-item-total">
                        <p>Рекомендуем:</p>
                        <h4 class="js-calc-cost-title-septic">'.$a_item['s_name'].'</h4>
                        <p>Цена 
                          <span class="js-calc-cost-price-septic">'
                            .number_format($a_item['i_price'], 0, '.', ' ').' руб.
                          </span>
                        </p>
                      </td>
                    </tr>
                  </table>
                ');
              }
            ?>
            <h3 class="js-calc-cost-phone calc-cost-phone section-header-h3">
              Обратитесь в офис по телефону<br/>
              <span class="font-weight-bold">+7 (812) 413-92-98</span>
            </h3>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>