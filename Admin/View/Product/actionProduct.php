<?php

if($_POST)
{
  switch ($_POST['action_form'])
  {
    case 'add_product':
      addProduct();
    break;

    case 'del_product':
      ajaxRemoveProduct($_POST['k_product']);
    break;

    case 'edit_product':
      editProduct($_POST['k_product']);
    break;
  }
}

/**
 * Метод добавленя продукта.
 */
function addProduct()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $a_data = $_POST;
  $a_data['id_product'] = trim($_REQUEST['id_product']);

  $s_name = trim($a_data['name_product']);
  $k_product_category = trim($a_data['id_category']);

  $img_product = '';
  if($s_name)
    $img_product = uploadImage('img_product','product');

  $i_price = trim($a_data['i_cost']);
  $i_discount = trim($a_data['i_discount']);
  $is_active = isset($a_data['is_active']) ? 1 : 0;
  $is_stock = isset($a_data['is_stock']) ? 1 : 0;

  $a_feature = [];
  for($i_count = 0; $i_count < $a_data['count_item']; $i_count++)
  {
    $a_feature[] = [
      'z_item_offset' => trim($a_data['z_item_offset_'.$i_count]),
      'z_item_val' => trim($a_data['z_item_val_'.$i_count])
    ];
  }

  $a_config = [
    'a_config' => [
      'i_bathtub' => trim($a_data['i_bathtub'] ?? 0),
      'i_laundry' => trim($a_data['i_laundry'] ?? 0),
      'i_sink' => trim($a_data['i_sink'] ?? 0),
      'i_shower' => trim($a_data['i_shower'] ?? 0),
      'i_toilet' => trim($a_data['i_toilet'] ?? 0)
    ],
    'a_feature' => $a_feature,
    'id_product' => $a_data['id_product']
  ];

  $z_data = serialize($a_config);

  $query = "
    insert into
     product(k_product_category, s_name, i_price, i_discount, img, is_active, is_stock, z_data)
    values
      ('$k_product_category','$s_name','$i_price','$i_discount','$img_product','$is_active','$is_stock','$z_data');
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}

/**
 * Метод удаления товара.
 *
 * @param string $k_product Ключ товара.
 */
function ajaxRemoveProduct(string $k_product)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $query = "
    delete from
      product
    where
      k_product='$k_product';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);

  echo('Товар удален.');
}

/**
 * Метод редактирования категории.
 *
 * @param string $k_product Ключ продукта.
 */
function editProduct(string $k_product)
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $a_data = $_POST;
  $a_data['id_product'] = trim($_REQUEST['id_product']);

  $s_name = trim($a_data['name_product']);
  $k_product_category = trim($a_data['id_category']);

  $img_product = '';
  if($s_name)
    $img_product = uploadImage('img_product','product');

  $i_price = trim($a_data['i_cost']);
  $i_discount = trim($a_data['i_discount']);
  $is_active = isset($a_data['is_active']) ? 1 : 0;
  $is_stock = isset($a_data['is_stock']) ? 1 : 0;

  $a_feature = [];
  for($i_count = 0; $i_count < $a_data['count_item']; $i_count++)
  {
    $a_feature[] = [
      'z_item_offset' => trim($a_data['z_item_offset_'.$i_count]),
      'z_item_val' => trim($a_data['z_item_val_'.$i_count])
    ];
  }

  $a_config = [
    'a_config' => [
      'i_bathtub' => trim($a_data['i_bathtub'] ?? 0),
      'i_laundry' => trim($a_data['i_laundry'] ?? 0),
      'i_sink' => trim($a_data['i_sink'] ?? 0),
      'i_shower' => trim($a_data['i_shower'] ?? 0),
      'i_toilet' => trim($a_data['i_toilet'] ?? 0)
    ],
    'a_feature' => $a_feature,
    'id_product' => $a_data['id_product']
  ];
  $z_data = serialize($a_config);

  $query = "
    update
     product
    set
     k_product_category='$k_product_category',
     s_name='$s_name',
     i_price='$i_price',
     i_discount='$i_discount',
     img='$img_product',
     is_active='$is_active',
     is_stock='$is_stock',
     z_data='$z_data'
    where
      k_product='$k_product';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>
