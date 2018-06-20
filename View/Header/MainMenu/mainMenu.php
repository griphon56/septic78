<?php

$a_product_category_data = getProductCategory();

$a_product_category = [];
foreach ($a_product_category_data as $a_item)
{
  $a_product_category[] = [
    'link' => $a_item['s_title'],
    'href'=>'index.php?id_page=catalog&k_product_category='.$a_item['k_product_category'],
    'id'=>'catalog',
    ];
}

$a_menu = [
  [
    'link'=>'Главная',
    'href'=>'index.php?id_page=home',
    'id'=>'home'
  ],
  [
    'link'=>'Каталог',
    'href'=>$a_product_category[0]['href'],
    'id'=>'catalog',
    'a_submenu' => $a_product_category
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

?>