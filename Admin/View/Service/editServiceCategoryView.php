<?php
include('../Admin/View/Service/actionServiceCategory.php');
$a_data = getServiceCategory($_REQUEST['k_service_category']);
?>
<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Изменение категории</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li style="display: none;">
                  <label for="k_service_category">ID</label>
                  <input type="text" name="k_service_category" readonly id="k_service_category" value="<?=$a_data['k_service_category']?>"/>
                </li>
                <li>
                  <label for="name_category">Название категории</label>
                  <input type="text" name="name_category" id="name_category" value="<?=$a_data['s_name']?>"/>
                </li>
                <li>
                  <label for="desc_category">Описание категории</label>
                  <textarea name="desc_category" id="desc_category"><?=$a_data['s_description']?></textarea>
                </li>
                <li>
                  <label for="is_active" class="active-product-checkbox-label">Активный</label>
                  <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    <?php
                    if(!empty($a_data['is_active']))
                      echo('checked');
                    ?>
                    id="is_active" />
                </li>
                <li>
                  <label for="img_category">Картинка</label>
                  <input
                    type="file"
                    name="img_category"
                    id="img_category"
                    value="
                      <?php
                        $a_config = unserialize($a_data['z_data']);
                        if($a_config)
                          echo($a_config['img']);
                      ?>
                    "/>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="index.php?id_page=service_category" class="btn btn-info">Отмена</a>
            </div>
            <div class="col-md-3">
              <input type="submit" value="edit_category" name="action_form_service" class="edit-service-category-submit float-right btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="/Admin/View/Service/ajaxAction.js"></script>