// Функция проверки на корректность ввода E-mail.
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function send_dealer()
{
  var jq_input = $('.js-footer-mail');
  var s_email = jq_input.val();

  if (validateEmail(s_email))
  {
    $.ajax({
      type: 'POST',
      url: '/View/Header/actionFooter.php',
      data: {
        s_email: s_email
      },
      success: function(data)
      {
        jq_input.val('');
      }
    });
    jq_input.css('border-color','#cccbcb');
  }
  else
  {
    jq_input.css('border-color','palevioletred');
    // alert('Сообщение не отправлено.');
  }
}