function send_contact(o_sender)
{
  $this = $(o_sender);

  var jq_form_container = $this.closest('.js-mail-form-contact');
  var jq_name = jq_form_container.find('input[name="s_name"]');
  var jq_phone = jq_form_container.find('input[name="s_phone"]');

  var s_name = jq_name.val();
  var s_phone = jq_phone.val();

  if (s_name)
  {
    $.ajax({
      type: 'POST',
      url: '/Core/Mail/action.php',
      data: {
        action_mail: 'contact',
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

function send_request(o_sender)
{
  $this = $(o_sender);

  var jq_form_container = $this.closest('.js-mail-form-request');
  var jq_name = jq_form_container.find('input[name="s_name"]');
  var jq_phone = jq_form_container.find('input[name="s_phone"]');
  var jq_message = jq_form_container.find('#s_message');

  var s_name = jq_name.val();
  var s_phone = jq_phone.val();
  var s_message = jq_message.val();

  if (s_name)
  {
    $.ajax({
      type: 'POST',
      url: '/Core/Mail/action.php',
      data: {
        action_mail: 'request',
        s_message: s_message,
        s_name: s_name,
        s_phone: s_phone
      },
      success: function(data)
      {
        jq_name.val('');
        jq_phone.val('');
        jq_message.val('');
      }
    });
  }
  else
  {
    alert('Сообщение не отправлено.');
  }
}