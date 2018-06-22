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