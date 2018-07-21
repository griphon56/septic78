<?php
// Почтовый адрес Владельца.
define('MAIL_BO', 'griphon56@gmail.com');

define('TEMPLATE_BO', 1);

// Шаблон купленных товаров.
define('TEMPLATE_CART_BO', 2);

// Шаблон уведомления о покупке(для клиента).
define('TEMPLATE_CART_CUSTOMER', 3);

// Шаблон уведомления о покупке(для клиента).
define('TEMPLATE_HEADER', 4);

function sendMail(string $s_mail_to, string $s_template, array $a_data=[])
{
  $s_encoding = 'utf-8';

  switch ($s_template)
  {
    case TEMPLATE_BO:
      $a_mail = templateMailBusinessOwner();
      break;

    case TEMPLATE_CART_BO:
      $a_mail = templateMailCartBO();
      break;

    case TEMPLATE_CART_CUSTOMER:
      $a_mail = templateMailCartCustomer();
      break;

    case TEMPLATE_HEADER:
      $a_mail = templateMailHeader($a_data);
      break;

    default:
      $a_mail = [];
  }

  if(!$a_mail && !$s_mail_to)
    return 0;

  // Mail header
  $s_headers = "Content-type: text/html; charset=".$s_encoding." \r\n";
  $s_headers .= "From: septic5@littlelanding.zzz.com.ua"."\r\n";
  $s_headers .= "MIME-Version: 1.0 \r\n";
  $s_headers .= "Content-Transfer-Encoding: 8bit \r\n";
  $s_headers .= "Date: ".date("r (T)")." \r\n";

  mail($s_mail_to,$a_mail['s_subject'],$a_mail['s_message'],$s_headers);

  return 'success_send';
}


function templateMailBusinessOwner()
{
  $s_subject = '';
  $s_message = '';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

function templateMailCartCustomer()
{
  $s_subject = '';
  $s_message = '';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

function templateMailCartBO()
{
  $s_subject = '';
  $s_message = '';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

function templateMailHeader(array $a_data)
{
  $s_phone = preg_replace('![^0-9]+!', '', $a_data['s_phone']);

  $s_subject = 'Заказ от - '.$a_data['s_name'];
  $s_message = '
     <div class="container-msg" style="position: relative;display: block;padding: 5px 15px;">'."\r\n".'
      <h3 class="text-msg" style="font-size: 20px;font-weight: 300;">У вас новый клиент: <span class="text-label" style="background-color: #f4f4f4;padding: 5px;border-radius: 10px;border: 1px solid #ececec;">'.$a_data['s_name'].'</span></h3>'."\r\n".'
      <h3 class="text-msg" style="font-size: 20px;font-weight: 300;">Сяжитесь с ним по телефону: <span class="text-label" style="background-color: #f4f4f4;padding: 5px;border-radius: 10px;border: 1px solid #ececec;"><a class="link-msg" href="tel: '.$s_phone.'" style="text-decoration: none;">'.$s_phone.'</a></span></h3>'."\r\n".'
    </div>
  ';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}
?>