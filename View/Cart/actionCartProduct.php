<?php

require_once '../../config.php';
require_once '../../Model/Model.php';

if($_POST)
{
  session_start();
  switch ($_POST['action_cart'])
  {
    case 'add':
      addCartProduct($_POST['k_product']);
      break;

    case 'del':
      delCartProduct($_POST['k_product']);
      break;

    case 'del_single':
      delCartProductSingle($_POST['k_product']);
      break;

    case 'save_order':
      saveOrder();
      break;
  }
}

/**
 * Добавить товар в корзину / сессию.
 *
 * @param string $k_product Ключ продукта.
 */
function addCartProduct(string $k_product)
{
  if($_SESSION['cart'][$k_product]['i_qty']<50)
  {
    $i_qty = empty((int)$_POST['i_qty']) ? 1 : (int)$_POST['i_qty'];
    $i_price = (int)$_POST['i_price'];
    if (!isset($_SESSION['cart'][$k_product]))
    {
      $_SESSION['cart'][$k_product] = [
        'k_product' => $k_product,
        'i_qty' => $i_qty,
        'i_price' => $i_qty * $i_price,
        'i_price_product' => $i_price
      ];
    }
    else
    {
      $i_price_product = $_SESSION['cart'][$k_product]['i_price_product'];

      $_SESSION['cart'][$k_product]['k_product'] = $k_product;
      $_SESSION['cart'][$k_product]['i_qty'] += $i_qty;
      $_SESSION['cart'][$k_product]['i_price'] += $i_qty * $i_price_product;
    }

    $a_data = getCartHeaderSession();

    // [1] => 'i_total'
    // [2] => 'i_qty'
    echo($a_data['i_total'] . '/' . $a_data['i_qty']);
  }
}

/**
 * Удалить товар из корзину / сессии.
 *
 * @param string $k_product Ключ продукта.
 */
function delCartProductSingle(string $k_product)
{
  if($_SESSION['cart'][$k_product]['i_qty']>1)
  {
    $i_price = (int)$_SESSION['cart'][$k_product]['i_price_product'];

    $_SESSION['cart'][$k_product]['k_product'] = $k_product;
    $_SESSION['cart'][$k_product]['i_qty'] -= 1;
    $_SESSION['cart'][$k_product]['i_price'] -= $i_price;
  }
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

function saveOrder()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  date_default_timezone_set('UTC');

  $dt_date = date('Y-m-d H:i:s');

  $a_cart = getCartProduct($_SESSION['cart']);

  if(!$a_cart)
    return;

  $s_name = trim($_POST['s_name']);
  $s_phone = trim($_POST['s_phone']);
  $s_email = trim($_POST['s_email']);
  $s_address = trim($_POST['s_address']);
  $k_delivery = trim($_POST['k_delivery']);

  $z_data = serialize('is_agree='.trim($_POST['is_agree']));

  $q_order = "
    insert into
      order_product(dt_date,s_name,s_phone,s_email,s_address,status,k_delivery,z_data)
    values
      ('$dt_date','$s_name','$s_phone','$s_email','$s_address',0,'$k_delivery','$z_data')
  ";
  mysqli_query($link, $q_order);
  $k_order = mysqli_insert_id($link);

  $z_data_product = serialize([]);
  $a_insert_value = [];
  foreach ($a_cart as $a_item)
  {
    $a_insert_value[] = '("'.$dt_date.'","'.$k_order.'","'.$a_item['k_product'].'","'.$a_item['i_qty'].'","'.$z_data_product.'")';
  }

  $s_insert_value = implode(',',$a_insert_value);

  if($s_insert_value)
  {
    $q_product = "
      insert into
        sale_product(dt_date,k_order,k_product,i_qty,z_data)
      values
        ".$s_insert_value."
    ";
    mysqli_query($link, $q_product);
    echo($q_product);
  }

  mysqli_close($link);

  $a_data_mail = [
    'a_cart' => $a_cart,
    'dt_date' => $dt_date,
    'k_delivery' => $k_delivery,
    'k_order' => $k_order,
    's_address' => $s_address,
    's_email' => $s_email,
    's_name' => $s_name,
    's_phone' => $s_phone,
  ];

  unset($_SESSION['cart']);
  // Отправить уведомление клиенту и BO.

  sendMail($s_email,TEMPLATE_CART_CUSTOMER,$a_data_mail);
  sendMail(MAIL_BO,TEMPLATE_CART_BO,$a_data_mail);

}
?>