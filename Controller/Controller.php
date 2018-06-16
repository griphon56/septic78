<?php

session_start();

// подключение модели
require_once MODEL;

// Подключение библиотеки функций
require_once 'Core/Function.php';

$id_page = getPageId();

if(empty($id_page))
  $id_page = 'home';

switch($id_page)
{
  case 'about_company':
    $view = PATH.VIEW.'AboutCompany/aboutCompanyView.php';
    break;
  case 'catalog':
    $view = PATH.VIEW.'Catalog/catalogView.php';
    break;
  case 'contact':
    $view = PATH.VIEW.'Contact/contactView.php';
    break;
  case 'home':
    $view = PATH.VIEW.'Home/homeView.php';
    break;
  case 'shipping_pay':
    $view = PATH.VIEW.'ShippingPayment/shippingPaymentView.php';
    break;
  case 'service':
    $view = PATH.VIEW.'Service/serviceView.php';
    break;
  default:
    $view = PATH.VIEW.'notFound.php';
}

// Подключение View
require_once PATH.VIEW.'index.php';