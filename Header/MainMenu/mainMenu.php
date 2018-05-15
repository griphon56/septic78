<?php
  $a_menu = [
    [
      'link'=>'Каталог',
      'href'=>'index.php?id_page=catalog',
      'id'=>'catalog'
    ],
    [
      'link'=>'Наши услуги',
      'href'=>'index.php?id_page=service',
      'id'=>'service'
    ],
    [
      'link'=>'О компании',
      'href'=>'index.php?id_page=about_company',
      'id'=>'about_company'
    ],
    [
      'link'=>'Доставка и оплата',
      'href'=>'index.php?id_page=shipping_pay',
      'id'=>'shipping_pay'
    ],
    [
      'link'=>'Контакты',
      'href'=>'index.php?id_page=contact',
      'id'=>'contact'
    ]
  ];


function getPageId()
{
  $id_page = isset($_GET['id_page']) ? strtolower(strip_tags(trim($_GET['id_page']))) : '';
  
  return $id_page;
}

function drawMenu(array $a_menu)
{
  $id_page = getPageId();

  if(empty($id_page))
    $id_page = 'catalog';

  echo('<ul>');
  foreach($a_menu as $item)
  {
    echo('<li>');
    
    if($item['id']==$id_page)
      echo('<a class="active-menu" href='.$item["href"].'>'.$item["link"].'</a>');
    else
      echo('<a href='.$item["href"].'>'.$item["link"].'</a>');
    
    echo('</li>');
  }
  echo('</ul>');
}

?>