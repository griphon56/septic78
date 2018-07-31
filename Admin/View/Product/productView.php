<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item">Все товары</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <a href="index.php?id_page=add_product&id_product=1" class="btn btn-info">Добавить новый Септик</a>
    </div>
    <div class="col-md-3">
      <a href="index.php?id_page=add_product&id_product=2" class="btn btn-info">Добавить новый Погреб</a>
    </div>
  </div>

    <?php
    $a_data = getAllProduct();

    $a_sort_data = [];
    foreach ($a_data as $a_item)
    {
      $z_data = unserialize($a_item['z_data']);

      $a_sort_data[$a_item['name_category']][] = [
        'i_discount' => $a_item['i_discount'],
        'i_price' => $a_item['i_price'],
        'is_active' => $a_item['is_active'],
        'k_product' => $a_item['k_product'],
        'k_product_category' => $a_item['k_product_category'],
        'name_category' => $a_item['name_category'],
        's_name' => $a_item['s_name'],
        'id_product' => $z_data['id_product'] ?? 0
      ];
    }

    // Продукты.
    foreach ($a_sort_data as $key => $a_item)
    {
      echo('
        <table class="table table-bordered table-category-product">
        <h2 class="section-item" id="category-'.$a_item[0]['k_product_category'].'">' . $key . '</h2>
      ');
      foreach ($a_item as $k_item)
      {
        $s_active = $k_item['is_active'] ? 'Активный' : 'Неактивный';

        echo('<tr><td>' . $k_item['s_name'] . '</td>');
        echo('<td>' . $k_item['name_category'] . '</td>');
        echo('<td>' . number_format($k_item['i_price'], 0, '.', ' ') . ' руб' . '</td>');
        echo('<td>' . number_format($k_item['i_discount'], 0, '.', ' ') . ' руб' . '</td>');
        echo('<td>' . $s_active . '</td>');
        echo('<td><a href="index.php?id_page=edit_product&id_product=' . $k_item['id_product'] . '&k_product=' . $k_item['k_product'] . '" class="btn btn-info">Изменить</a></td>');
        echo('<td><button type="submit" onclick="del_product(this);" class="btn btn-danger" name="' . $k_item['k_product'] . '">Удалить</button></td></tr>');
      }
      echo('</table>');
    }

    // Правое меню.
    echo('<div id="admin-right-menu" class="admin-product-right-menu-container"><ul>');
    foreach ($a_sort_data as $key => $a_item)
    {
      echo('
        <li>
          <a class="btn btn-light" href="#category-'.$a_item[0]['k_product_category'].'">'.$a_item[0]['name_category'].'</a>
        </li>
      ');
    }
    echo('</ul></div>');
    ?>
</div>