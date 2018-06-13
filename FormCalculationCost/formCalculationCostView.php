<div class="calc-cost-container">
  <div class="container-fluid">
    <form id="calc-cost-form" action="/" method="post">
      <div class="container">
        <div class="row">
          <div class="col">
            <h3 class="calc-cost-title">Расчет стоимости автономной канализации</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 calc-cost-box">
            <ul>
              <li class="calc-cost-relative">
                <h4 class="calc-cost-text">Количество человек в доме</h4>
                <input  class="calc-cost-count" type="text" value="3"/>
              </li>
              <li>
                <div class="calc-cost-scroll"></div>
              </li>
              <li>
                <h4 class="calc-cost-text">Производитель</h4>
                <select name="calc-cost-generator" id="calc-cost-generator" class="scroll">
                  <option value="Септик Астра">Септик Астра</option>
                  <option value="Септик Астра1">Септик Астра1</option>
                  <option value="Септик Астра2">Септик Астра2</option>
                </select>
              </li>
            </ul>
          </div>
          <div class="col-md-3 calc-cost-box">
            <ul>
              <li>
                <input class="calc-cost-contact" type="text" placeholder="Имя">
              </li>
              <li>
                <input class="calc-cost-contact" type="tel" placeholder="Телефон">
              </li>
              <li>
                <input type="submit" class="btn calc-cost-btn" value="ОТПРАВИТЬ">
              </li>
            </ul>
          </div>
          <div class="col-md-5 calc-cost-box">
            <table class="calc-cost-box-table">
              <tr >
                <td rowspan="3">
                  <div class="calc-cost-box-img-title">
                    <img src="../img/formCalculationCostView/1.png" alt="">
                  </div>
                </td>
                <td>
                  <div class="calc-cost-icon-desc">
                    <img src="../img/formCalculationCostView/light-bulb.png" alt="">
                    <span>3 чел.</span>
                  </div>
                  <div class="calc-cost-icon-desc">
                    <img src="../img/formCalculationCostView/light-bulb.png" alt="">
                    <span>0.6м3/сут</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="calc-cost-icon-desc">
                    <img src="../img/formCalculationCostView/light-bulb.png" alt="">
                    <span>0.96л/час.</span>
                  </div>
                  <div class="calc-cost-icon-desc">
                    <img src="../img/formCalculationCostView/light-bulb.png" alt="">
                    <span>150кВт/сут</span>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="calc-cost-item-total">
                  <p>Рекомендуем:</p>
                  <h4>Септик Юнилос Астра 3</h4>
                  <p>Цена 62 050 руб.</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>