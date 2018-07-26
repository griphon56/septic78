<?php
  include('../Admin/View/Product/actionProduct.php');
?>
<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Добавление товара</h3>
      <form action="" method="post" id="add-product" enctype="multipart/form-data">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li>
                  <label for="name_product">Название товара</label>
                  <input type="text" placeholder="Септик" name="name_product" id="name_product"/>
                </li>
                <li>
                  <label for="id_category">Категория товара</label>
                  <select name="id_category" id="id_category" class="add-product-category">
                    <?php
                      $a_category = getProductCategory();

                      foreach ($a_category as $a_item)
                      {
                        echo('<option value="'.$a_item['k_product_category'].'">'.$a_item['s_title'].'</option>');
                      }
                    ?>
                  </select>
                </li>
                <li>
                  <label for="i_cost">Стоимость товара</label>
                  <input type="text" name="i_cost" value="0" id="i_cost"/>
                </li>
                <li>
                  <label for="i_discount">Стоимость по скидке (если есть)</label>
                  <input type="text" name="i_discount" value="0" id="i_discount"/>
                </li>
                <li>
                  <label for="is_active" class="active-product-checkbox-label">Активный</label>
                  <input type="checkbox" value="1" name="is_active" checked id="is_active"/>
                </li>
                <li>
                  <label for="is_stock" class="active-product-checkbox-label">Акционный</label>
                  <input type="checkbox" value="1" name="is_stock" id="is_stock"/>
                </li>
                <li>
                  <label for="img_product">Картинка</label>
                  <input type="file" name="img_product" id="img_product" value=""/>
                </li>
                <?php
                  if($_REQUEST['id_product']==PAGE_PRODUCT_SEPTIC)
                  {
                    echo('
                    <li>
                      <div class="container include-with-product">
                        <div class="row">
                          <label for="">Можно подключить:</label>
                        </div>
                        <div class="row">
                          <div class="col">
                            <img src="'.VIEW.'img/productView/shower.png" alt="">
                            <input type="text" value="0" name="i_shower" id="i_shower"/>
                          </div>
                          <div class="col">
                            <img src="'.VIEW.'img/productView/sink.png" alt="">
                            <input type="text" value="0" name="i_sink" id="i_sink"/>
                          </div>
                          <div class="col">
                            <img src="'.VIEW.'img/productView/toilet.png" alt="">
                            <input type="text" value="0" name="i_toilet" id="i_toilet"/>
                          </div>
                          <div class="col">
                            <img src="'.VIEW.'img/productView/bathtub.png" alt="">
                            <input type="text" value="0" name="i_bathtub" id="i_bathtub"/>
                          </div>
                          <div class="col">
                            <img src="'.VIEW.'img/productView/laundry.png" alt="">
                            <input type="text" value="0" name="i_laundry" id="i_laundry"/>
                          </div>
                        </div>
                      </div>
                    </li>');
                  }
                ?>
              </ul>

              <h3 class="section-item">Таблица</h3>
              <ul id="js-add-product-item" class="add-product-item">
                <li class="js-add-product-item-box">
                  <div class="row">
                    <div class="col-md-5">
                      <input type="text" name="z_item_offset" placeholder="Название поля">
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="z_item_val" placeholder="Значение">
                    </div>
                    <div class="col-md-1">
                      <span class="btn-product-new-item-del" onclick="del_table_item(this);">X</span>
                    </div>
                  </div>
                </li>
              </ul>
              <input type="text" name="count_item" value="0" hidden>
              <a
                href="#"
                id="js-product-new-item"
                class="btn btn-light js-product-new-item btn-product-new-item"
              >
                ДОБАВИТЬ ЯЧЕЙКУ
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <a href="index.php?id_page=product" class="btn btn-info">Отмена</a>
            </div>
            <div class="col-md-3">
              <input
                type="submit"
                value="add_product"
                name="action_form"
                class="add-product-submit js-product-submit-table float-right btn btn-success"
              >
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>