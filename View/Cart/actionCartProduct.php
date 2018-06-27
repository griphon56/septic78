<?php

require_once '../../Model/Model.php';

if($_POST)
{
  session_start();
  switch ($_POST['action_cart'])
  {
    case 'add':
      addCartProduct();
      break;
    case 'del':
      delCartProduct($_POST['k_product']);
      break;

    case 'edit':
      editCartProduct($_POST['k_product']);
      break;
  }
}

/**
 * Добавить товар в корзину / сессию.
 */
function addCartProduct()
{
  $_SESSION['cart'][] = [
    'k_product' => $_POST['k_product'],
    'i_qty' => $_POST['i_qty'] ?? '1',
    'i_price' => $_POST['i_price']
  ];

  $a_data = getCartHeaderSession();

  // [1] => 'i_total'
  // [2] => 'i_qty'
  echo($a_data['i_total'].'/'.$a_data['i_qty']);
}

/**
 * Удалить товар из корзины.
 *
 * @param string $k_product
 */
function delCartProduct(string $k_product)
{
  foreach ($_SESSION['cart'] as $k => $a_item)
  {
    if($a_item['k_product'] == $k_product)
    {
      unset($_SESSION['cart'][$k]);
    }
  }
}

/**
 * Редактировать товар в корзине.
 *
 * @param string $k_product
 */
function editCartProduct(string $k_product)
{

}
?>