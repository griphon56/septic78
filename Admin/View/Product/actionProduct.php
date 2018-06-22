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
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $s_name = trim($_POST['name_product']);
  $k_product_category = trim($_POST['id_category']);

  $img_product = '';
  if($s_name)
    $img_product = uploadImage('img_product','product');

  $i_price = trim($_POST['i_cost']);
  $i_discount = trim($_POST['i_discount']);
  $is_active = isset($_POST['is_active']) ? 1 : 0;
  $is_stock = isset($_POST['is_stock']) ? 1 : 0;

  $a_config = [
    'a_config' => [
      'i_bathtub' => trim($_POST['i_bathtub']),
      'i_laundry' => trim($_POST['i_laundry']),
      'i_sink' => trim($_POST['i_sink']),
      'i_shower' => trim($_POST['i_shower']),
      'i_toilet' => trim($_POST['i_toilet'])
    ],
    'a_feature' => [
      'z_box_up' => trim($_POST['z_box_up']),
      'z_energy' => trim($_POST['z_energy']),
      'z_height' => trim($_POST['z_height']),
      'z_length' => trim($_POST['z_length']),
      'z_process_volume' => trim($_POST['z_process_volume']),
      'z_salvage' => trim($_POST['z_salvage']),
      'z_users' => trim($_POST['z_users']),
      'z_weight' => trim($_POST['z_weight']),
      'z_width' => trim($_POST['z_width'])
    ]
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
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $s_name = trim($_POST['name_product']);
  $k_product_category = trim($_POST['id_category']);

  $img_product = '';
  if($s_name)
    $img_product = uploadImage('img_product','product');

  $i_price = trim($_POST['i_cost']);
  $i_discount = trim($_POST['i_discount']);
  $is_active = isset($_POST['is_active']) ? 1 : 0;
  $is_stock = isset($_POST['is_stock']) ? 1 : 0;

  $a_config = [
    'a_config' => [
      'i_bathtub' => trim($_POST['i_bathtub']),
      'i_laundry' => trim($_POST['i_laundry']),
      'i_sink' => trim($_POST['i_sink']),
      'i_shower' => trim($_POST['i_shower']),
      'i_toilet' => trim($_POST['i_toilet'])
    ],
    'a_feature' => [
      'z_box_up' => trim($_POST['z_box_up']),
      'z_energy' => trim($_POST['z_energy']),
      'z_height' => trim($_POST['z_height']),
      'z_length' => trim($_POST['z_length']),
      'z_process_volume' => trim($_POST['z_process_volume']),
      'z_salvage' => trim($_POST['z_salvage']),
      'z_users' => trim($_POST['z_users']),
      'z_weight' => trim($_POST['z_weight']),
      'z_width' => trim($_POST['z_width'])
    ]
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
