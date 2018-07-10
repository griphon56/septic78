$(document).ready(function()
{
  /**
   * Метод добавления категории.
   */
  $('.add-service-category-submit').click(function(event)
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
  $('.edit-service-category-submit').click(function(event)
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
  var k_service_category = $this.attr('name');

  if (k_service_category) {
    $.ajax({
      type: 'POST',
      url: '/Admin/View/Service/actionServiceCategory.php',
      data: {
        action_form_service: 'del_category',
        k_service_category: k_service_category
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
 * Метод удаления услуги.
 * @param o_sender
 */
function del_service(o_sender)
{
  $this = $(o_sender);
  var k_service = $this.attr('name');

  if (k_service) {
    $.ajax({
      type: 'POST',
      url: '/Admin/View/Service/actionService.php',
      data: {
        action_form_service: 'del_service',
        k_service: k_service
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