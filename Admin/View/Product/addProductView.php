<div class="container">
  <div class="row add-product-container">
    <div class="col">
      <h3 class="section-item">Добавление товара</h3>
      <form action="" method="post" id="add-product">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="add-product-item">
                <li>
                  <label for="name-product">Название товара</label>
                  <input type="text" id="name-product"/>
                </li>
                <li>
                  <label for="desc-product">Описание товара</label>
                  <textarea id="name-product"></textarea>
                </li>
                <li>
                  <label for="id-category">Категория товара</label>
                  <select name="id-category" id="id-category" class="add-product-category">
                    <option value="1">Септик Астра</option>
                    <option value="2">Септик Астра 2</option>
                  </select>
                </li>
                <li>
                  <label for="cost-product">Стоимость товара</label>
                  <input type="text" id="cost-product"/>
                </li>
                <li>
                  <label for="discount-product">Скидка на товар</label>
                  <input type="text" id="discount-product"/>
                </li>
                <li>
                  <label for="is-active-product" class="active-product-checkbox-label">Активный</label>
                  <input type="checkbox" id="is-active-product"/>
                </li>
                <li>
                  <label for="is-stock-product" class="active-product-checkbox-label">Акционный</label>
                  <input type="checkbox" id="is-stock-product"/>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <input type="submit" value="Добавить" class="add-product-submit btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>