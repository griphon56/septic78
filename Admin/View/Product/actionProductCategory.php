<?php

if($_POST)
{
  if($_POST['name_category'])
    ajaxAddProductCategory();
}

/**
 * Метод добавленя категории через ajax запрос.
 */
function ajaxAddProductCategory()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
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
?>
