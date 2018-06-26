<?php

/**
 * Метод получения массива "Метода оплаты".
 *
 * @return array Массив методов оплаты.
 */
function getDelivery()
{
  $link = mysqli_connect(HOST, USER, PASS,DB) or die('No connect to Server');
  mysqli_set_charset($link,'utf8');

  $query = "
    select
      k_delivery,
      s_name
    from 
      delivery;
  ";

  $r_query = mysqli_query($link,$query);
  mysqli_close($link);

  $a_delivery =  [];
  while ($row = mysqli_fetch_assoc($r_query))
    $a_delivery[] = $row;

  return $a_delivery;
}
?>