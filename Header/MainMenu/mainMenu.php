<?php
  $a_menu = [
    ['link'=>'Каталог', 'href'=>'index.php?id_page=catalog'],
    ['link'=>'О компании', 'href'=>'index.php?id_page=about_company'],
    ['link'=>'Наши услуги', 'href'=>'index.php?id_page=service'],
    ['link'=>'Доставка и оплата', 'href'=>'index.php?id_page=payment'],
    ['link'=>'Контакты', 'href'=>'index.php?id_page=contact']
  ];

function drawMenu(array $a_menu)
{
  echo('<ul>');
  foreach($a_menu as $item)
  {
    echo('<li>');
    echo('<a href='.$item["href"].'>'.$item["link"].'</a>');
    echo('</li>');
  }
  echo('</ul>');
}

?>