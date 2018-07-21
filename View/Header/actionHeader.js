function add_order(o_sender)
{
  $this = $(o_sender);

  var jq_form_container = $this.closest('.js-header-form');
  var jq_name = jq_form_container.find('input[name="s_name"]');
  var jq_phone = jq_form_container.find('input[name="s_phone"]');

  var s_name = jq_name.val();
  var s_phone = jq_phone.val();

  if (s_name)
  {
    $.ajax({
      type: 'POST',
      url: '/View/Header/actionHeader.php',
      data: {
        s_name: s_name,
        s_phone: s_phone
      },
      success: function(data)
      {
        jq_name.val('');
        jq_phone.val('');
      }
    });
  }
  else
  {
    alert('Сообщение не отправлено.');
  }
}