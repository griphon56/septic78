<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item">Все товары</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="index.php?id_page=add_product" class="btn btn-info">Добавить новый товар</a>
    </div>
  </div>

  <table class="table table-bordered table-category-product">
    <?php
    $a_data = getProduct();

    foreach ($a_data as $a_item)
    {
      $s_active = $a_item['is_active'] ? 'Активный' : 'Неактивный';

      echo('<tr><td>'.$a_item['s_name'].'</td>');
      echo('<td>'.$a_item['name_category'].'</td>');
      echo('<td>'.number_format($a_item['i_price'], 0, '.', ' ').' руб'.'</td>');
      echo('<td>'.number_format($a_item['i_discount'], 0, '.', ' ').' руб'.'</td>');
      echo('<td>'.$s_active.'</td>');
      echo('<td><a href="index.php?id_page=edit_product&k_product='.$a_item['k_product'].'" class="btn btn-info">Изменить</a></td>');
      echo('<td><button type="submit" onclick="del_product(this);" class="btn btn-danger" name="'.$a_item['k_product'].'">Удалить</button></td></tr>');
    }
    ?>
  </table>
</div>

<script src="/Admin/View/Product/ajax.js"></script>