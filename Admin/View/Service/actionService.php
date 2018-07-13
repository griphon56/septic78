<?php

if($_POST)
{
  switch ($_POST['action_form_service'])
  {
    case 'add_service':
      addService();
      break;

    case 'del_service':
      ajaxRemoveService($_POST['k_service']);
      break;

    case 'edit_service':
      editService($_POST['k_service']);
      break;
  }
}

/**
 * Метод добавленя услуги.
 */
function addService()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['is_active'] ?? 0;
  $s_name = trim($_POST['name_service']);
  $s_desc = trim($_POST['desc_service']);
  $k_service_category = trim($_POST['id_category']);

  $s_img='';
  if($s_name)
    $s_img = uploadImage('img_service','service');

  $z_data = serialize(' ');

  $query = "
    insert into
     service(k_service_category,is_active,s_name,s_description,img,z_data)
    values
      ('$k_service_category','$is_active','$s_name','$s_desc','$s_img','$z_data');
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}

/**
 * Метод удаления услуги.
 *
 * @param string $k_service Ключ категории продуктов.
 */
function ajaxRemoveService(string $k_service)
{
  $link = mysqli_connect('localhost', 'root', '', 'septic');
  mysqli_set_charset($link, 'utf8');

  $query = "
    delete from
      service
    where
      k_service='$k_service';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);

  echo('Услуга удалена.');
}

/**
 * Метод редактирования услуги.
 *
 * @param string $k_service Ключ услуги.
 */
function editService(string $k_service)
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $is_active = $_POST['is_active'] ?? 0;
  $s_name = trim($_POST['name_service']);
  $s_desc = trim($_POST['desc_service']);
  $k_service_category = trim($_POST['id_category']);

  $s_img='';
  if($s_name)
    $s_img = uploadImage('img_service','service');

  $z_data = serialize(' ');

  $query = "
    update
      service
    set
      k_service_category='$k_service_category',
      is_active='$is_active',
      s_name='$s_name',
      s_description='$s_desc',
      img='$s_img',
      z_data='$z_data'
    where
      k_service=".$k_service.";
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>
