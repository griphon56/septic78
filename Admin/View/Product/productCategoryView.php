<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="section-item">Категории товаров</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="index.php?id_page=add_product_category" class="btn btn-info">Добавить категорию</a>
    </div>
  </div>

  <table class="table table-bordered table-category-product">
  <?php
    $a_data = getProductCategory();

    foreach ($a_data as $a_item)
    {
      echo('<tr><td>'.$a_item['s_title'].'</td>');
      echo('<td><a href="#" class="btn btn-info" name="'.$a_item['k_product_caregory'].'">Изменить</a></td>');
      echo('<td><a href="#" class="btn btn-danger" name="'.$a_item['k_product_caregory'].'">Удалить</a></td></tr>');
    }
  ?>
  </table>
</div>