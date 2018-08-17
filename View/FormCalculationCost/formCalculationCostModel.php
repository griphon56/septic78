<?php
  if(isset($_POST['k_product_category']))
    ajaxGetProductFormCalc($_POST['k_product_category']);
  else
    $a_product_form = getProductFormCalc(CATEGORY_SEPTIC_ASTRA);

  /**
   * Метод получения продуктов для формы.
   *
   * @param string $k_product_category <tt>Ключ категори товара,
   * для вывода всех товаров одной категории.</tt>
   * @return array <tt>Массив продуктов.</tt>
   */
  function getProductFormCalc(string $k_product_category)
  {
    $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
    mysqli_set_charset($link,'utf8');

    $query = '
      select
        i_price,
        img,
        k_product,
        s_name
      from
        product
      where 
        product.k_product_category='.$k_product_category.'
      order by 
        s_name asc
      limit 3
    ';

    $r_query = mysqli_query($link,$query);
    mysqli_close($link);

    $a_data = [];
    while($row = mysqli_fetch_assoc($r_query))
      $a_data[] = $row;

    return $a_data;
  }

  /**
   * Метод получения продуктов для формы, после запроса ajax.
   *
   * @param string $k_product_category <tt>Ключ категори товара, для вывода всех товаров одной категории.</tt>
   */
  function ajaxGetProductFormCalc(string $k_product_category)
  {
    $link = mysqli_connect('localhost', 'root', '', 'septic');
    mysqli_set_charset($link,'utf8');

    $query = '
      select
        i_price,
        img,
        k_product,
        s_name
      from
        product
      where 
        product.k_product_category='.$k_product_category.'
      order by 
        s_name asc
      limit 3
    ';

    $r_query = mysqli_query($link,$query);
    mysqli_close($link);

    $a_data = [];
    while($row = mysqli_fetch_assoc($r_query))
      $a_data[] = $row;

    $s_result = '';
    foreach($a_data as $k => $a_item)
    {
      $s_active = $k==0 ? 'active-calc-cost ' : '';

      $s_result .= '
        <table class="'.$s_active.'calc-cost-box-table js-table-item-'.$k.'">
          <tr >
            <td rowspan="3">
              <div class="calc-cost-box-img-title">
                <img 
                  class="js-calc-cost-box-img-title" 
                  src="/View/upload_img/product/'.$a_item['img'].'" 
                  alt=""
                >
              </div>
            </td>
            <td>
              <div class="calc-cost-icon-desc">
                <img src="/View/img/formCalculationCostView/people.png" alt="">
                <span class="js-calc-cost-count-people">2</span>
                <span> чел.</span>
              </div>
              <div class="calc-cost-icon-desc">
                <img src="/View/img/formCalculationCostView/valve.png" alt="">
                <span>'.(0.6+$k*0.5).' м3/сут</span>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="calc-cost-icon-desc">
                <img src="/View/img/formCalculationCostView/water-faucet.png" alt="">
                <span>'.(0.96+$k*0.5).' л/час.</span>
              </div>
              <div class="calc-cost-icon-desc">
                <img src="/View/img/formCalculationCostView/lightbulb.png" alt="">
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
      ';
    }

    $s_result .= '
      <h3 class="js-calc-cost-phone calc-cost-phone section-header-h3">
        Обратитесь в офис по телефону<br/>
        <span class="font-weight-bold">+7 (812) 413-92-98</span>
      </h3>
    ';

    echo($s_result);
  }

  function getCategoryFormCalc(array $a_product_category)
  {
    $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
    mysqli_set_charset($link,'utf8');

    $s_product_category = implode(',',$a_product_category);
    $query = '
      select
        k_product_category,
        s_title
      from
        product_category
      where
        k_product_category in('.$s_product_category.')
      order by
        s_title asc
    ';

    $r_query = mysqli_query($link,$query);
    mysqli_close($link);

    $a_data = [];
    while($row = mysqli_fetch_assoc($r_query))
      $a_data[] = $row;

    return $a_data;
  }
?>