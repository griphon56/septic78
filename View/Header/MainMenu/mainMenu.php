<?php

$a_product_category_data = getProductCategory();

$a_product_category = [];
foreach ($a_product_category_data as $a_item)
{
  $a_product_category[] = [
    'link' => $a_item['s_title'],
    'href'=>'catalog&k_product_category='.$a_item['k_product_category'],
    'id'=>'catalog',
    ];
}

$a_service_category_data = getServiceCategory();

$a_service_category = [];
foreach ($a_service_category_data as $a_item)
{
  $a_service_category[] = [
    'link' => $a_item['s_name'],
    'href'=>'service&k_service_category='.$a_item['k_service_category'],
    'id'=>'service',
  ];
}

$a_menu = [
  [
    'link'=>'Главная',
    'href'=>'home',
    'id'=>'home'
  ],
  [
    'link'=>'Каталог',
    'href'=>'#',
    'id'=>'catalog',
    'a_submenu' => $a_product_category
  ],
  [
    'link'=>'Наши услуги',
    'href'=>'#',
    'id'=>'service',
    'a_submenu' => $a_service_category
  ],
  [
    'link'=>'О компании',
    'href'=>'about_company',
    'id'=>'about_company'
  ],
  [
    'link'=>'Доставка и оплата',
    'href'=>'shipping_pay',
    'id'=>'shipping_pay'
  ],
  [
    'link'=>'Контакты',
    'href'=>'contact',
    'id'=>'contact'
  ]
];

?>