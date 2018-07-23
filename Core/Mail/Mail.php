<?php
// Почтовый адрес Владельца.
define('MAIL_BO', 'griphon56@gmail.com');

define('TEMPLATE_BO', 1);

// Шаблон купленных товаров.
define('TEMPLATE_CART_BO', 2);

// Шаблон уведомления о покупке(для клиента).
define('TEMPLATE_CART_CUSTOMER', 3);

// Шаблон уведомления о намерении купить или задать вопрос.
define('TEMPLATE_CONTACT', 4);

// Шаблон информации диллерам для сотрудничества.
define('TEMPLATE_DEALER', 5);

// Шаблон информации диллерам для сотрудничества.
define('TEMPLATE_MAIL_REQUEST', 6);

/**
 * @param string $s_mail_to Адрес отправки сообщения.
 * @param string $s_template ID шаблона.
 * @param array $a_data Массив данных.
 * @return int|string Ответ о доставке.
 */
function sendMail(string $s_mail_to, string $s_template, array $a_data=[])
{
  $s_encoding = 'utf-8';

  switch ($s_template)
  {
    case TEMPLATE_BO:
      $a_mail = templateMailBusinessOwner();
      break;

    case TEMPLATE_CART_BO:
      $a_mail = templateMailCartBO($a_data);
      break;

    case TEMPLATE_CART_CUSTOMER:
      $a_mail = templateMailCartCustomer($a_data);
      break;

    case TEMPLATE_CONTACT:
      $a_mail = templateMailContact($a_data);
      break;

    case TEMPLATE_DEALER:
      $a_mail = templateMailDealer();
      break;

    case TEMPLATE_MAIL_REQUEST:
      $a_mail = templateMailRequest($a_data);
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

/**
 * Шаблон писем, находится в корзине, собирается по данным из корзины и отправляется Заказчику.
 *
 * @param array $a_data
 * @return array Массив со структурой. <ul>
 * <li><tt>s_subject</tt> Тема письма.</li>
 * <li><tt>s_message</tt> Содержание письма.</li>
 * </ul>
 */
function templateMailCartCustomer(array $a_data)
{
  $s_subject = 'Септик5.рф';
  $s_message = '
    <div style="margin: 10px;">
      <h1 style="font-size: 25px;text-transform: uppercase;">Заказ <span>#'.$a_data['k_order'].'</span></h1>
      
      <h2 style="color: #444444;font-size: 21px;font-weight: 300;margin-top: 20px;text-transform: uppercase;">Ваш заказ</h2>
      <table class="cart" style="border-spacing: 0;font-size: 18px;text-align: center;width: 100%;">
        <tr>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">ID</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Название</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Количество</th>
          <th style="padding: 10px;border-right: none;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Цена</th>
        </tr>
  ';

  $i_total = 0;
  $a_cart_order = $a_data['a_cart'];
  foreach ($a_cart_order as $a_item)
  {
    $s_message .= '
      <tr>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['k_product'].'</td>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['s_name'].'</td>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['i_qty'].'</td>
        <td style="padding: 10px;border-right: none;">' . number_format($a_item['i_price'], 0, '.', ' ') . ' руб.</td>
      </tr>
    ';
    $i_total+=$a_item['i_price'];
  }

  $s_message .= '
      </table>
      <h3 style="text-align: end;font-size: 20px;text-transform: uppercase;">Всего: <span style="padding: 5px; background-color: #baffba">' . number_format($i_total, 0, '.', ' ') . ' руб.</span></h3>
    </div>
  ';
  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

/**
 * Шаблон писем, находится в футере, информация дилерам по сотрудничеству.
 *
 * @return array Массив со структурой. <ul>
 * <li><tt>s_subject</tt> Тема письма.</li>
 * <li><tt>s_message</tt> Содержание письма.</li>
 * </ul>
 */
function templateMailDealer()
{
  $s_subject = 'Сотрудничетво с Септик5.рф';
  $s_message = 'Здравствуйте.';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

/**
 * Шаблон писем, находится в корзине, собирается по данным из корзины и отправляется Владельцу.
 *
 * @param array $a_data
 * @return array Массив со структурой. <ul>
 * <li><tt>s_subject</tt> Тема письма.</li>
 * <li><tt>s_message</tt> Содержание письма.</li>
 * </ul>
 */
function templateMailCartBO(array $a_data)
{
  $a_delivery = getDelivery($a_data['k_delivery']);

  $s_subject = 'Заказ от  - '.$a_data['s_name'];
  $s_message = '
    <div style="margin: 10px;">
      <h1 style="font-size: 25px;text-transform: uppercase;">Заказ <span>#'.$a_data['k_order'].'</span></h1>
      <h2 style="color: #444444;font-size: 21px;font-weight: 300;margin-top: 20px;text-transform: uppercase;">Клиент</h2>
      <table class="client-info" style="border-spacing: 0;font-size: 18px;text-align: center;width: 100%;">
        <tr>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Имя</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Телефон</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Адрес доставки</th>
          <th style="padding: 10px;border-right: none;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">E-mail</th>
          <th style="padding: 10px;border-right: none;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Способ оплаты</th>
        </tr>
        <tr>
          <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_data['s_name'].'</td>
          <td style="padding: 10px;border-right: 1px solid #f4f4f4;"><a href="tel: '.$a_data['s_phone'].'" style="text-decoration: none;">'.$a_data['s_phone'].'</a></td>
          <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_data['s_address'].'</td>
          <td style="padding: 10px;border-right: none;"><a href="mailto: '.$a_data['s_email'].'" style="text-decoration: none;">'.$a_data['s_email'].'</a></td>
          <td style="padding: 10px;border-right: none;">'.$a_delivery['s_name'].'</td>
        </tr>
      </table>
    
      <h2 style="color: #444444;font-size: 21px;font-weight: 300;margin-top: 20px;text-transform: uppercase;">Товары</h2>
      <table class="cart" style="border-spacing: 0;font-size: 18px;text-align: center;width: 100%;">
        <tr>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">ID</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Название</th>
          <th style="padding: 10px;border-right: 1px solid #f4f4f4;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Количество</th>
          <th style="padding: 10px;border-right: none;text-transform: uppercase;background-color: #fbfbfb;border-bottom: 1px solid #f4f4f4;">Цена</th>
        </tr>
  ';

  $i_total = 0;
  $a_cart_order = $a_data['a_cart'];
  foreach ($a_cart_order as $a_item)
  {
    $s_message .= '
      <tr>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['k_product'].'</td>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['s_name'].'</td>
        <td style="padding: 10px;border-right: 1px solid #f4f4f4;">'.$a_item['i_qty'].'</td>
        <td style="padding: 10px;border-right: none;">' . number_format($a_item['i_price'], 0, '.', ' ') . ' руб.</td>
      </tr>
    ';
    $i_total+=$a_item['i_price'];
  }

  $s_message .= '
      </table>
      <h3 style="text-align: end;font-size: 20px;text-transform: uppercase;">Всего: <span style="padding: 5px; background-color: #baffba">' . number_format($i_total, 0, '.', ' ') . ' руб.</span></h3>
    
    </div>
  ';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}

/**
 * Шаблон писем, находится в шапке страницы и на странице Контакты.
 *
 * @param array $a_data Данные для письма.
 * @return array Массив со структурой. <ul>
 * <li><tt>s_subject</tt> Тема письма.</li>
 * <li><tt>s_message</tt> Содержание письма.</li>
 * </ul>
 */
function templateMailContact(array $a_data)
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

/**
 * Шаблон писем.
 *
 * @param array $a_data Данные для письма.
 * @return array Массив со структурой. <ul>
 * <li><tt>s_subject</tt> Тема письма.</li>
 * <li><tt>s_message</tt> Содержание письма.</li>
 * </ul>
 * @link View/RequestForm/requestFormView.php
 */
function templateMailRequest(array $a_data)
{
  $s_phone = preg_replace('![^0-9]+!', '', $a_data['s_phone']);

  $s_subject = 'Заявка от - '.$a_data['s_name'];
  $s_message = '
    <div class="container-msg" style="position: relative;display: block;padding: 5px 15px;">'."\r\n".'
      <h3 class="text-msg" style="font-size: 20px;font-weight: 300;">У вас новый клиент: <span class="text-label" style="background-color: #f4f4f4;padding: 5px;border-radius: 10px;border: 1px solid #ececec;">'.$a_data['s_name'].'</span></h3>'."\r\n".'
      <h3 class="text-msg" style="font-size: 20px;font-weight: 300;">Сяжитесь с ним по телефону: <span class="text-label" style="background-color: #f4f4f4;padding: 5px;border-radius: 10px;border: 1px solid #ececec;"><a class="link-msg" href="tel: '.$s_phone.'" style="text-decoration: none;">'.$s_phone.'</a></span></h3>'."\r\n".'
      <p>'.$a_data['s_message'].'</p>
    </div>
  ';

  return [
    's_subject' => $s_subject,
    's_message' => $s_message
  ];
}
?>