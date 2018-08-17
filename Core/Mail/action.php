<?php

include('Mail.php');

if($_POST)
{
  $a_data = [];
  if(isset($_POST['action_mail']))
  {
    $a_data = [
      's_name' => trim($_POST['s_name']),
      's_phone' => trim($_POST['s_phone']),
      's_message' => trim($_POST['s_message'] ?? ''),
    ];

    $s_result = '';
    switch ($_POST['action_mail'])
    {
      case 'calc_cost_form':
        $s_result = sendMail(MAIL_BO,TEMPLATE_CONTACT,$a_data);
        break;

      case 'contact':
        $s_result = sendMail(MAIL_BO,TEMPLATE_CONTACT,$a_data);
        break;

      case 'request':
        $s_result = sendMail(MAIL_BO,TEMPLATE_MAIL_REQUEST,$a_data);
        break;
    }

    echo ($s_result);
  }
  else
  {
    echo ('Шаблон не передан.');
  }
}
?>