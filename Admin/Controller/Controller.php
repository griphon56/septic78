<?php
session_start();

// Подключение файла функций пользовательской части
include_once '../Core/Function.php';

// подключение файла функций административной части
include_once '../Admin/Function/Function.php';

$id_page = getPageId();

if(empty($id_page))
  $id_page = 'admin';

switch($id_page)
{
  case 'product_category':
    $view = ADMIN_TEMPLATE.'Product/productCategoryView.php';
    break;
  case 'add_product_category':
    $view = ADMIN_TEMPLATE.'Product/addProductCategoryView.php';
    break;
  case 'edit_product_category':
    $view = ADMIN_TEMPLATE.'Product/editProductCategoryView.php';
    break;
  case 'product':
    $view = ADMIN_TEMPLATE.'Product/productView.php';
    break;
  case 'add_product':
    $view = ADMIN_TEMPLATE.'Product/addProductView.php';
    break;
  case 'edit_product':
    $view = ADMIN_TEMPLATE.'Product/editProductView.php';
    break;
  case 'admin':
    $view = ADMIN_TEMPLATE.'Home/homeView.php';
    break;
  default:
    $view = USER_TEMPLATE.'notFound.php';
}

// Подключение View
require_once ADMIN_TEMPLATE.'index.php';