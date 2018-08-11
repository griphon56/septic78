<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Septic5 - Administration</title>

  <link rel="icon" href="<?=VIEW?>img/headerView/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?=VIEW?>img/headerView/favicon.png" type="image/x-icon">

</head>
<body>
  <div class="wrapper">

    <div class="m-header-menu col-3 col-sm-1">
      <div class="m-menu-icon js-m-menu-icon" onclick="menu_open(this);">
        <div class="icon-item-1"></div>
        <div class="icon-item-2"></div>
        <div class="icon-item-3"></div>
      </div>
    </div>

  <?php include ('MainMenu/mainMenuView.php');?>