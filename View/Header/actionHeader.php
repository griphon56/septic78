<?php

include('../../Core/Mail/Mail.php');

if($_POST)
{
  $a_data = [];
  if(isset($_POST['s_name']))
    $a_data = $_POST;

  $s = sendMail(MAIL_BO,TEMPLATE_HEADER,$a_data);

  echo ($s);
}
?>