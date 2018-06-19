<?php

if($_POST)
{
  switch ($_POST['action_form'])
  {
    case 'add_category':
      ajaxAddProductCategory();
    break;

    case 'del_category':
      ajaxRemoveProductCategory($_POST['k_product_category']);
    break;

    case 'edit_category':
      ajaxEditProductCategory($_POST['k_product_category']);
      break;
  }
}

/**
 * Метод добавленя категории через ajax запрос.
 */
function ajaxAddProductCategory()
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);
  $s_img = trim($_POST['img_category']);

  $query = "
    insert into
     product_category(s_title, s_description, s_img)
    values
      ('$s_name_category','$s_desc_category','$s_img');
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
}

/**
 * Метод редактирования категории.
 *
 * @param string $k_product_category Ключ категории продуктов.
 */
function ajaxEditProductCategory(string $k_product_category)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);
  $s_img = trim($_POST['img_category']);

  $query = "
    update
      product_category
    set
      s_title='$s_name_category',s_description='$s_desc_category',s_img='$s_img'
    where
      k_product_category=".$k_product_category.";
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>
