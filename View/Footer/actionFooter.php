<?php

include('../../Core/Mail/Mail.php');

if($_POST)
{
  if(isset($_POST['s_email']))
  {
    $s_email = $_POST['s_email'];
    $s = sendMail($s_email, TEMPLATE_DEALER);
  }
}
?>