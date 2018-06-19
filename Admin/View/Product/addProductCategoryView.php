<?php
  if (!empty($_POST['name_category']))
  {
    $_SESSION['name_category'] = $_POST['name_category'];
    header('Location: '.$_SERVER['REQUEST_URI']);
  }
?>
<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Добавление категории</h3>
      <form action="" method="post" id="add-product-category">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li>
                  <label for="name_category">Название категории</label>
                  <input type="text" name="name_category" id="name_category" value=""/>
                </li>
                <li>
                  <label for="desc_category">Описание категории</label>
                  <textarea name="desc_category" id="desc_category">Септик Астра</textarea>
                </li>
                <li>
                  <label for="img-category">Картинка</label>
                  <input type="text" name="img_category" id="img_category" value=""/>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="index.php?id_page=product_category" class="btn btn-info">Отмена</a>
            </div>
            <div class="col-md-3">
              <input type="submit" value="Добавить" class="add-product-category-submit btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('actionProductCategory.php');?>
<script src="/Admin/View/Product/ajax.js"></script>