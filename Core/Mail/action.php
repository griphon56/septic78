<?php

include('Mail.php');

if($_POST)
{
  $a_data = [];
  if(isset($_POST['action_mail']))
  {
    $s_result = '';
    switch ($_POST['action_mail'])
    {
      case 'contact':
        $s_result = sendMail(MAIL_BO,TEMPLATE_CONTACT,$a_data);
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