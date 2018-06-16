<?php
/**
 * Дебаг лог.
 *
 * @param array $a_data Массив.
 */
function debug_log(array $a_data)
{
  echo('<pre>');
  print_r($a_data);
  echo('</pre>');
}

/**
 * Метод получения ID страницы.
 *
 * @return string id Страницы.
 */
function getPageId()
{
  $id_page = isset($_GET['id_page']) ? strtolower(strip_tags(trim($_GET['id_page']))) : '';

  return $id_page;
}

/**
 * @param array $a_menu Массив меню.
 */
function drawMenu(array $a_menu)
{
  $id_page = getPageId();

  if(empty($id_page))
    $id_page = 'home';

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