<?php

function addProductCategory()
{

}

/**
 * Получает асооциативный массив категорий.
 *
 * @param string $k_product_category Ключ категории.
 * @return array
 */
function getProductCategory(string $k_product_category=null)
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  if($k_product_category)
    $where = 'k_product_category='.$k_product_category;
  else
    $where = 'true';

  $query = "
    select 
      k_product_category,
      s_description,
      s_img,
      s_title
    from 
      product_category
    where
      ".$where.";
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_category = array();
  while($row = mysqli_fetch_assoc($r_query)){
    $a_category[] = $row;
  }

  return $a_category;
}

?>