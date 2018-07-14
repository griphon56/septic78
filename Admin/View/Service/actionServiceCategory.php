<?php

if($_POST)
{
  switch ($_POST['action_form_service'])
  {
    case 'add_category':
      addServiceCategory();
      break;

    case 'del_category':
      ajaxRemoveServiceCategory($_POST['k_service_category']);
      break;

    case 'edit_category':
      editServiceCategory($_POST['k_service_category']);
      break;
  }
}

/**
 * Метод добавленя категории.
 */
function addServiceCategory()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['is_active'] ?? 0;
  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);

  $s_img='';
  if($s_name_category)
    $s_img = uploadImage('img_category','category_service');

  $z_data = serialize(['img' => $s_img]);

  $query = "
    insert into
     service_category(is_active,s_name, s_description, z_data)
    values
      ('$is_active','$s_name_category','$s_desc_category','$z_data');
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}

/**
 * Метод удаления категории.
 *
 * @param string $k_service_category Ключ категории продуктов.
 */
function ajaxRemoveServiceCategory(string $k_service_category)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $query = "
    delete from
      service_category
    where
      k_service_category='$k_service_category';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);

  echo('Категория удалена.');
}

/**
 * Метод редактирования категории.
 *
 * @param string $k_service_category Ключ категории продуктов.
 */
function editServiceCategory(string $k_service_category)
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['is_active'] ?? 0;
  $s_name_category = trim($_POST['name_category']);
  $s_desc_category = trim($_POST['desc_category']);

  $s_img='';
  if($s_name_category)
    $s_img = uploadImage('img_category','category_service');

  $z_data = serialize(['img' => $s_img]);

  $query = "
    update
      service_category
    set
      is_active='$is_active',s_name='$s_name_category',s_description='$s_desc_category',z_data='$z_data'
    where
      k_service_category=".$k_service_category.";
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>
