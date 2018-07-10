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

    foreach ($a_data as $a_item)
    {
      $s_active = $a_item['is_active'] ? 'Активный' : 'Неактивный';

      echo('<tr><td>'.$a_item['s_name'].'</td>');
      echo('<td>'.$a_item['name_category'].'</td>');
      echo('<td>'.$s_active.'</td>');
      echo('<td><a href="index.php?id_page=edit_service&k_service='.$a_item['k_service'].'" class="btn btn-info">Изменить</a></td>');
      echo('<td><button type="submit" onclick="del_service(this);" class="btn btn-danger" name="'.$a_item['k_service'].'">Удалить</button></td></tr>');
    }
    ?>
  </table>
</div>

<script src="/Admin/View/Service/ajaxAction.js"></script>