<?php

/**
 * Метод получения массива "Метода оплаты".
 *
 * @return array Массив методов оплаты.
 */
function getDelivery()
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $query = "
    select
      k_delivery,
      s_name
    from 
      delivery;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_delivery =  [];
  while ($row = mysqli_fetch_assoc($r_query))
    $a_delivery[] = $row;

  return $a_delivery;
}

/**
 * Метод получения товаров для корзины.
 *
 * @param array $a_data Массив товаров из Сессии.
 * @return array Массив товаров в корзине.
 */
function getCartProduct(array $a_data)
{
  $a_product_session = [];
  foreach ($a_data as $a_item)
  {
    if(!isset($a_product_session[$a_item['k_product']]))
    {
      $a_product_session[$a_item['k_product']] = [
        'k_product' => $a_item['k_product'],
        'i_qty' => 0,
        'i_price' => $a_item['i_price']
      ];
    }
    $a_product_session[$a_item['k_product']]['i_qty'] += $a_item['i_qty'];
  }

  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $s_product = implode(',', array_column($a_product_session,'k_product'));

  $query = "
    select
      product.img,
      product.k_product,
      product.s_name
    from 
      product
    where
      product.k_product in(".$s_product.");
  ";

  $r_query = mysqli_query($link, $query);
  mysqli_close($link);

  $a_product =  [];
  while ($row = mysqli_fetch_assoc($r_query))
    $a_product[] = $row;

  $a_cart_product = [];
  foreach ($a_product as $a_item)
  {
    $a_cart_product[$a_item['k_product']] = [
      'i_qty' => $a_product_session[$a_item['k_product']]['i_qty'],
      'i_price' => $a_product_session[$a_item['k_product']]['i_price'],
      'img' => $a_item['img'],
      'k_product' => $a_item['k_product'],
      's_name' => $a_item['s_name']
    ];
  }

  return $a_cart_product;
}

/**
 * Формирует массив для корзины в шапке.
 *
 * @return array
 */
function getCartHeaderSession()
{
  $i_qty = 0;
  $i_total = 0;

  if(isset($_SESSION['cart']))
  {
    foreach ($_SESSION['cart'] as $a_item)
    {
      $i_total += $a_item['i_price'];
      $i_qty += $a_item['i_qty'];
    }
  }

  return
  [
    'i_total' => $i_total,
    'i_qty' => $i_qty
  ];
}

/**
 * Метод отправки уведомления заказчику и BO.
 */
function sendMessageCart()
{
  // empty.
}
?>