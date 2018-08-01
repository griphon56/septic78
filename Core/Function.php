<?php

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
 * Метод отрисовки Основного меню сайта.
 *
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

    if($item['id']==$id_page&&isset($item['a_submenu']))
      echo('
        <a class="active-menu" href='.$item["href"].'>
          <span>'.$item["link"].'</span>
          <img src="'.VIEW.'img/headerView/right-arrow.png" class="m-menu-icon-arrow">
        </a>
      ');
    elseif(isset($item['a_submenu']))
      echo('
        <a href='.$item["href"].'>
          <span>'.$item["link"].'</span>
          <img src="'.VIEW.'img/headerView/right-arrow.png" class="m-menu-icon-arrow">
        </a>
      ');
    else
      echo('<a href='.$item["href"].'><span>'.$item["link"].'</span></a>');

    //sub menu
    if(isset($item['a_submenu']))
    {
      echo('<div class="header-submenu">');
      $i_count=0;
      foreach($item['a_submenu'] as $a_item)
      {
        $i_count++;
        if($i_count==1)
          echo ('<div class="header-submenu-col"><ul class="header-submenu-item-container">');

            echo('<li>');
              echo('<a href=' . $a_item["href"] . '><span>' . $a_item["link"] . '</span></a>');
            echo('</li>');

        if($i_count==6)
        {
          $i_count=0; 
          echo ('</ul></div>');
        }

      }
      echo('</div>');
    }
    echo('</li>');
  }
  echo('</ul>');
}
?>