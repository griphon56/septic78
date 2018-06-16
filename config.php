<?php
// Домен.
define('PATH', $_SERVER['DOCUMENT_ROOT']);

// Модель.
define('MODEL', 'Model/Model.php');

// Контроллер.
define('CONTROLLER', 'Controller/Controller.php');

// Вид.
define('VIEW', '/View/');

// Директория с активным шаблоном клиента
define('USER_TEMPLATE', PATH.VIEW);

// Директория с активным шаблоном администратора
define('ADMIN_TEMPLATE', PATH.'/Admin/View/');

// максимально допустимый вес загружаемых картинок - 1 Мб
define('SIZE', 1048576);

// сервер БД
define('HOST', 'localhost');

// Пользователь
define('USER', 'root');

// Пароль
define('PASS', '');

// БД
define('DB', 'septic');

// название магазина - title
define('TITLE', 'Септик5.рф');

// email администратора
define('ADMIN_EMAIL', '');

$link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
mysqli_query($link, "SET NAMES 'UTF8'") or die('Cant set charset');
?>