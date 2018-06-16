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
  case 'create_product':
    $view = ADMIN_TEMPLATE.'Product/addProductView.php';
    break;
  case 'admin':
    $view = ADMIN_TEMPLATE.'Home/homeView.php';
    break;
  default:
    $view = ADMIN_TEMPLATE.'notFound.php';
}

// Подключение View
require_once ADMIN_TEMPLATE.'index.php';