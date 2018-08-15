<?php
  include('View/Product/productAbstaract.php');

/**
 * Метод получения продуктов хитов продаж.
 *
 * @param array|null $a_product_category <tt>Массив ключей категорий товара</tt>, для вывода всех товаров одной категории.
 * @param bool $is_not <tt>Если <b>true</b> - тогда метод вернёт товары которые НЕ относятся к категориям из массива.</tt>
 * @return array <tt>Массив продуктов.</tt>
 */
function getProductLeaderSalesSeptic(array $a_product_category=null, bool $is_not=false)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($a_product_category)
  {
    $s_status = $is_not ? 'not' : '';
    $s_product_category = implode(',',$a_product_category);
    $where = 'product.k_product_category '.$s_status.' in(' . $s_product_category.')';
  }
  else
    $where = 'true';

  $query = "
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
      ".$where."
    limit 16;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query)){
    $a_product[] = $row;
  }

  return $a_product;
}

/**
 * Метод получения продуктов по категории.
 *
 * @param array|null $a_product_category <tt>Массив ключей категории товара</tt>, для вывода всех товаров одной категории.
 * @return array <tt>Массив продуктов</tt>
 */
function getProductLeaderSalesCellar(array $a_product_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($a_product_category)
  {
    $s_product_category = implode(',',$a_product_category);
    $where = 'product.k_product_category in(' . $s_product_category.')';
  }
  else
    $where = 'true';

  $query = "
    select
      product.i_discount,
      product.img,
      product.i_price,
      product.is_active,
      product.is_stock,
      product.k_product,
      product_category.s_title as name_category,
      product_category.k_product_category,
      product.s_name,
      product.z_data
    from 
      product inner join
      product_category on
        product_category.k_product_category=product.k_product_category
    where
      product.is_active=1 and
      ".$where."
    order by
      product.s_name asc
    limit 12;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_product = [];
  while($row = mysqli_fetch_assoc($r_query))
  {
    $a_product[] = $row;
  }

  return $a_product;
}

?>