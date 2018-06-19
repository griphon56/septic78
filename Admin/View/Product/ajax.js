$(document).ready(function()
{
  /**
   * Метод добавления категории.
   */
  $('.add-product-category-submit').click(function(event)
  {
    event.preventDefault();
    var desc_category = $('#desc_category').val();
    var img_category = $('input[name="img_category"]').val();
    var name_category = $('input[name="name_category"]').val();

    if(name_category.length)
    {
      $.ajax({
        type: 'POST',
        url: '/Admin/View/Product/actionProductCategory.php',
        data:{
          action_form: 'add_category',
          desc_category: desc_category,
          img_category: img_category,
          name_category: name_category
        },
        success:function(){
          alert('Категория добавлена.');
        }
      });
    }
    else
      alert('Категория без названия.');
  });

  /**
   * Метод изменения категории.
   */
  $('.edit-product-category-submit').click(function(event)
  {
    event.preventDefault();
    var desc_category = $('#desc_category').val();
    var img_category = $('input[name="img_category"]').val();
    var k_product_category = $('input[name="k_product_category"]').val();
    var name_category = $('input[name="name_category"]').val();

    if(name_category.length)
    {
      $.ajax({
        type: 'POST',
        url: '/Admin/View/Product/actionProductCategory.php',
        data:{
          action_form: 'edit_category',
          desc_category: desc_category,
          k_product_category: k_product_category,
          img_category: img_category,
          name_category: name_category
        },
        success:function(msg){
          alert('Категория изменена.'+msg);
        }
      });
    }
    else
      alert('Категория без названия.');
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
        alert('Категория удалена.' + msg);
      }
    });
  }
  else
    alert('Нечего удалять');
}