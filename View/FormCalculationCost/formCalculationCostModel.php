<?php
  /**
   * Метод получения продуктов для формы.
   *
   * @param string $a_product_category <tt>Ключ категори товара,
   * для вывода всех товаров одной категории.</tt>
   * @return array <tt>Массив продуктов.</tt>
   */
  function getProductFormCalc(string $k_product_category)
  {
    $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
    mysqli_set_charset($link,'utf8');

    $query = '
      select
        img,
        i_price,
        k_product,
        s_name
      from
        product
      where 
        product.k_product_category='.$k_product_category.'
      limit 3
    ';

    $r_query = mysqli_query($link,$query);
    mysqli_close($link);

    $a_data = [];
    while($row = mysqli_fetch_assoc($r_query))
      $a_data[] = $row;

    return $a_data;
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
    ';

    $r_query = mysqli_query($link,$query);
    mysqli_close($link);

    $a_data = [];
    while($row = mysqli_fetch_assoc($r_query))
      $a_data[] = $row;

    return $a_data;
  }
?>