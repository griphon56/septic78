<?php
  include('../Admin/View/Service/actionService.php');
  $a_data = getSingleService($_REQUEST['k_service']);
?>
<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Редактирование услуги</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li style="display: none;">
                  <label for="k_service">ID</label>
                  <input type="text" name="k_service" readonly id="k_service" value="<?=$a_data['k_service']?>"/>
                </li>
                <li>
                  <label for="name_service">Название услуги</label>
                  <input type="text" placeholder="Название" name="name_service" id="name_service" value="<?=htmlspecialchars($a_data['s_name']);?>"/>
                </li>
                <li>
                  <label for="desc_service">Описание услуги</label>
                  <textarea name="desc_service" id="desc_service"><?=$a_data['s_description'];?></textarea>
                </li>
                <li>
                  <label for="id_category">Категория услуги</label>
                  <select name="id_category" id="id_category" class="add-product-category">
                    <?php
                    $a_category = getServiceCategory();

                    foreach ($a_category as $a_item)
                    {
                      if($a_item['k_service_category']==$a_data['k_service_category'])
                        echo('<option selected value="'.$a_item['k_service_category'].'">'.$a_item['s_name'].'</option>');
                      else
                        echo('<option value="'.$a_item['k_service_category'].'">'.$a_item['s_name'].'</option>');
                    }
                    ?>
                  </select>
                </li>
                <li>
                  <label for="is_active" class="active-product-checkbox-label">Активный</label>
                  <input type="checkbox" checked name="is_active" value="<?=$a_data['is_active'];?>" id="is_active"/>
                </li>
                <li>
                  <label for="img_category">Картинка</label>
                  <input type="file" name="img_service" id="img_service" value=""/>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="service" class="btn btn-info">Отмена</a>
            </div>
            <div class="col-md-3">
              <input type="submit" value="edit_service" name="action_form_service" class="edit-service-submit float-right btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="/Admin/View/Service/ajaxAction.js"></script>