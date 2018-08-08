<?php
include('../Admin/View/Service/actionServiceCategory.php');
?>
<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Добавление категории</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li>
                  <label for="name_category">Название категории</label>
                  <input type="text" placeholder="Название" name="name_category" id="name_category" value=""/>
                </li>
                <li>
                  <label for="desc_category">Описание категории</label>
                  <textarea name="desc_category" id="desc_category">Обвязка скважины ...</textarea>
                </li>
                <li>
                  <label for="is_active" class="active-product-checkbox-label">Активный</label>
                  <input type="checkbox" name="is_active" value="1" id="is_active"/>
                </li>
                <li>
                  <label for="img_category">Картинка</label>
                  <input type="file" name="img_category" id="img_categoryd" value=""/>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="product_category" class="btn btn-info">Отмена</a>
            </div>
            <div class="col-md-3">
              <input type="submit" value="add_category" name="action_form_service" class="add-service-category-submit float-right btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="/Admin/View/Service/ajaxAction.js"></script>