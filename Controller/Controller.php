<?php

session_start();

// подключение модели
require_once MODEL;

// Подключение библиотеки функций
require_once 'Core/Function.php';
require_once 'Admin/Function/Function.php';

$id_page = getPageId();

if(empty($id_page))
  $id_page = 'home';

switch($id_page)
{
  case 'about_company':
    $view = USER_TEMPLATE.'AboutCompany/aboutCompanyView.php';
    break;
  case 'cart':
    $view = USER_TEMPLATE.'Cart/cartView.php';
    break;
  case 'catalog':
    $view = USER_TEMPLATE.'Catalog/catalogView.php';
    break;
  case 'contact':
    $view = USER_TEMPLATE.'Contact/contactView.php';
    break;
  case 'home':
    $view = USER_TEMPLATE.'Home/homeView.php';
    break;
  case 'shipping_pay':
    $view = USER_TEMPLATE.'ShippingPayment/shippingPaymentView.php';
    break;
  case 'service':
    $view = USER_TEMPLATE.'Service/serviceView.php';
    break;
  case 'product':
    $view = USER_TEMPLATE.'Product/productView.php';
    break;
  default:
    $view = USER_TEMPLATE.'notFound.php';
}

// Подключение View
require_once USER_TEMPLATE.'index.php';