<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item">Категории товаров</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="add_product_category" class="btn btn-info">Добавить категорию</a>
    </div>
  </div>

  <table class="table table-bordered table-category-product">
  <?php
    $a_data = getProductCategory();

    foreach ($a_data as $a_item)
    {
      $s_active = $a_item['is_active'] ? 'Активный' : 'Неактивный';

      echo('<tr><td>'.$a_item['s_title'].'</td>');
      echo('<td>'.$s_active.'</td>');
      echo('<td><a href="edit_product_category&k_product_category='.$a_item['k_product_category'].'" class="btn btn-info">Изменить</a></td>');
      echo('<td><button type="submit" onclick="del_category(this);" class="btn btn-danger" name="'.$a_item['k_product_category'].'">Удалить</button></td></tr>');
    }
  ?>
  </table>
</div>

<script src="/Admin/View/Product/ajax.js"></script>