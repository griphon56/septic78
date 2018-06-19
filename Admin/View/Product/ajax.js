$(document).ready(function()
{
  $('.add-product-category-submit').click(function()
  {
    var name_category = $('input[name="name_category"]').val();
    var desc_category = $('#desc-category').val();
    var img_category = $('input[name="img_category"]').val();

    if(name_category)
    {
      $.ajax({
        type: 'POST',
        url:'/Admin/View/Product/addProductView.php',
        data:{
          desc_category: desc_category,
          img_category: img_category,
          name_category: name_category
        },
        success:function(){
          alert('Товар добавлен.');
        }
      });
    }
    else
      alert('Категория без названия.');
  });

});