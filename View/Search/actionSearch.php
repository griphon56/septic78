<?php

/**
 * Метод получения результата поиска товаров.
 *
 * @param string $s_search Назване товара.
 * @return array массив товаров.
 */
function getSearchResult(string $s_search = '')
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link,'utf8');

  $query = '
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product_category.s_title as name_category,
      product.s_name,
      product.z_data
    from 
      product inner join
      product_category on
        product_category.k_product_category=product.k_product_category
    where
      product.is_active=1 and
      product.s_name like "%'.$s_search.'%"
  ';

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_product[] = $row;
  }

  return $a_product;
}

?>