/**
 * Метод проверяет правильность ввода.
 *
 * @param o_name Объект проверки имени.
 * @param o_phone Объект проверки телефона.
 * @returns {boolean}
 */
function verify_input(o_name, o_phone)
{
  var s_name = o_name.val();
  var s_phone = o_phone.val();

  if (s_name.length)
  {
    o_name.css('border-color', '#5bb7c2');
  }
  else
  {
    o_name.css('border-color','palevioletred');
    return false;
  }

  if (s_phone.length)
  {
    o_phone.css('border-color','#5bb7c2');
  }
  else
  {
    o_phone.css('border-color','palevioletred');
    return false;
  }

  return true;
}

function send_contact(o_sender)
{
  $this = $(o_sender);

  var jq_form_container = $this.closest('.js-mail-form-contact');
  var jq_name = jq_form_container.find('input[name="s_name"]');
  var jq_phone = jq_form_container.find('input[name="s_phone"]');

  var s_name = jq_name.val();
  var s_phone = jq_phone.val();

  if(verify_input(jq_name,jq_phone))
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
        // Уведомление об отправки сообщения.
        $('.notif').fadeIn().fadeOut(1000);
      }
    });
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

  if(verify_input(jq_name,jq_phone))
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
        // Уведомление об отправки сообщения.
        $('.notif').fadeIn().fadeOut(1000);
      }
    });
  }
}

function send_calc_form(o_sender)
{
  $this = $(o_sender);

  var jq_form_container = $this.closest('.js-mail-calc-cost');
  var jq_name = jq_form_container.find('input[name="s_name"]');
  var jq_phone = jq_form_container.find('input[name="s_phone"]');

  var s_name = jq_name.val();
  var s_phone = jq_phone.val();

  if(verify_input(jq_name,jq_phone))
  {
    $.ajax({
      type: 'POST',
      url: '/Core/Mail/action.php',
      data: {
        action_mail: 'calc_cost_form',
        s_name: s_name,
        s_phone: s_phone
      },
      success: function(data)
      {
        alert(data);
        jq_name.val('');
        jq_phone.val('');
        // Уведомление об отправки сообщения.
        $('.notif').fadeIn().fadeOut(1000);
      }
    });
  }
}