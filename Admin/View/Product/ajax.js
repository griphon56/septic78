$(document).ready(function()
{
  /**
   * Метод добавления категории.
   */
  $('.add-product-category-submit').click(function(event)
  {
    var name_category = $('input[name="name_category"]').val();

    if(!name_category.length)
    {
      event.preventDefault();
      alert('Категория без названия.');
    }
  });

  /**
   * Метод изменения категории.
   */
  $('.edit-product-category-submit').click(function(event)
  {
    var name_category = $('input[name="name_category"]').val();

    if(!name_category.length)
    {
      event.preventDefault();
      alert('Категория без названия.');
    }
  });

  /**
   * Обработчик добавления новой ячейки в таблицу.
   */
  $('#js-product-new-item').click(function(event)
  {
    var js_container = document.getElementById("js-add-product-item");
    var html_code =
      '<li>'+
        '<div class="row">'+
          '<div class="col-md-5">'+
            '<input type="text" name="z_item_offset" placeholder="Название поля">'+
          '</div>'+
          '<div class="col-md-6">'+
            '<input type="text" name="z_item_val" placeholder="Значение">'+
          '</div>'+
          '<div class="col-md-1">'+
            '<span class="btn-product-new-item-del" onclick="del_table_item(this);">X</span>'+
          '</div>'+
        '</div>'+
      '</li>'
    ;
    js_container.insertAdjacentHTML('beforeEnd', html_code);

    event.preventDefault();
  });

  /**
   * Переобразовывает названия(name) полей таблицы перед отправкой.
   */
  $('.js-product-submit-table').click(function()
  {
    var jq_container = $('#js-add-product-item');
    var jq_input_count = $('input[name="count_item"]');
    var jq_item = jq_container.find('li');

    var i_count = jq_item.length;
    jq_input_count.val(i_count);

    $.each(jq_item,function(k,o_item)
    {
      var jq_offset = $(o_item).find('input[name="z_item_offset"]');
      var jq_value = $(o_item).find('input[name="z_item_val"]');

      jq_offset.attr('name','z_item_offset_'+k);
      jq_value.attr('name','z_item_val_'+k);
    });
  });
});

/**
 * Метод удаления категории.
 * @param o_sender
 */
function del_category(o_sender)
{
  $this = $(o_sender);
  var k_product_category = $this.attr('name');

  if (k_product_category) {
    $.ajax({
      type: 'POST',
      url: '/Admin/View/Product/actionProductCategory.php',
      data: {
        action_form: 'del_category',
        k_product_category: k_product_category
      },
      success: function (msg) {
        $this.closest('tr').css({'display' : 'none'});
        alert(msg);
      }
    });
  }
  else
    alert('Нечего удалять');
}

/**
 * Метод удаления товара.
 * @param o_sender
 */
function del_product(o_sender)
{
  $this = $(o_sender);
  var k_product = $this.attr('name');

  if (k_product) {
    $.ajax({
      type: 'POST',
      url: '/Admin/View/Product/actionProduct.php',
      data: {
        action_form: 'del_product',
        k_product: k_product
      },
      success: function (msg) {
        $this.closest('tr').css({'display' : 'none'});
        alert(msg);
      }
    });
  }
  else
    alert('Нечего удалять');
}

/**
 *  Удаляет ячейку из таблицы.
 */
function del_table_item(o_sender)
{
  $this = $(o_sender);

  $this.closest('li').remove();
}