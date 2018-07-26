<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item">Услуги</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="index.php?id_page=add_service" class="btn btn-info">Добавить услугу</a>
    </div>
  </div>

  <table class="table table-bordered table-category-product">
    <?php
    $a_data = getAllService();

    $a_sort_data = [];
    foreach ($a_data as $a_item)
    {
      $a_sort_data[$a_item['name_category']][] = [
        'is_active' => $a_item['is_active'],
        'k_service' => $a_item['k_service'],
        'k_service_category' => $a_item['k_service_category'],
        'name_category' => $a_item['name_category'],
        's_name' => $a_item['s_name']
      ];
    }

    foreach ($a_sort_data as $key => $a_item)
    {
      echo('
        <table class="table table-bordered table-category-product">
        <h2 class="section-item" id="category-' . $a_item[0]['k_service_category'] . '">' . $key . '</h2>
      ');
      foreach ($a_item as $k_item)
      {
        $s_active = $k_item['is_active'] ? 'Активный' : 'Неактивный';

        echo('<tr><td>' . $k_item['s_name'] . '</td>');
        echo('<td>' . $k_item['name_category'] . '</td>');
        echo('<td>' . $s_active . '</td>');
        echo('<td><a href="index.php?id_page=edit_service&k_service=' . $k_item['k_service'] . '" class="btn btn-info">Изменить</a></td>');
        echo('<td><button type="submit" onclick="del_service(this);" class="btn btn-danger" name="' . $k_item['k_service'] . '">Удалить</button></td></tr>');
      }
    }

    // Правое меню.
    echo('<div id="admin-right-menu" class="admin-product-right-menu-container"><ul>');
    foreach ($a_sort_data as $key => $a_item)
    {
      echo('
        <li>
          <a class="btn btn-light" href="#category-'.$a_item[0]['k_service_category'].'">'.$a_item[0]['name_category'].'</a>
        </li>
      ');
    }
    echo('</ul></div>');
    ?>
  </table>
</div>

<script src="/Admin/View/Service/ajaxAction.js"></script>