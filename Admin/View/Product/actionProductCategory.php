<?php

if($_POST)
{
  switch ($_POST['action_form'])
  {
    case 'add_category':
      addProductCategory();
    break;

    case 'del_category':
      ajaxRemoveProductCategory($_POST['k_product_category']);
    break;

    case 'edit_category':
      editProductCategory($_POST['k_product_category']);
    break;
  }
}

/**
 * Метод добавленя категории.
 */
function addProductCategory()
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['$is_active'] ?? 0;
  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);

  $s_img='';
  if($s_name_category&&isset($_POST['img_category']))
    $s_img = uploadImage('img_category','category_product');

  $query = "
    insert into
     product_category(is_active,s_title, s_description, s_img)
    values
      ('$is_active','$s_name_category','$s_desc_category','$s_img');
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}

/**
 * Метод удаления категории.
 *
 * @param string $k_product_category Ключ категории продуктов.
 */
function ajaxRemoveProductCategory(string $k_product_category)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $query = "
    delete from
      product_category
    where
      k_product_category='$k_product_category';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);

  echo('Категория удалена.');
}

/**
 * Метод редактирования категории.
 *
 * @param string $k_product_category Ключ категории продуктов.
 */
function editProductCategory(string $k_product_category)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['$is_active'] ?? 0;
  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);

  $s_img='';
  if($s_name_category&&isset($_POST['img_category']))
    $s_img = uploadImage('img_category','category_product');

  $query = "
    update
      product_category
    set
      is_active='$is_active',s_title='$s_name_category',s_description='$s_desc_category',s_img='$s_img'
    where
      k_product_category=".$k_product_category.";
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>
