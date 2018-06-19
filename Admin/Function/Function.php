<?php

function addProductCategory()
{

}

/**
 * Получает асооциативный массив категорий.
 *
 * @return array
 */
function getProductCategory()
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $query = '
    select 
      k_product_caregory,
      s_title 
    from 
      product_category;
  ';

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_category = array();
  while($row = mysqli_fetch_assoc($r_query)){
    $a_category[] = $row;
  }

  return $a_category;
}

?>