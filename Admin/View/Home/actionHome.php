<?php

if($_POST)
{
  switch ($_POST['action_form'])
  {
    case 'update_product':
      updateProduct();
      break;
  }
}

function updateProduct()
{
  $link = mysqli_connect(HOST, USER, PASS, DB);
  mysqli_set_charset($link, 'utf8');

  $a_config = [
    'a_config' => [
      'i_bathtub' => 0,
      'i_laundry' => 0,
      'i_sink' => 0,
      'i_shower' => 0,
      'i_toilet' => 0
    ],
    'a_feature' => []
  ];
  $z_data = serialize($a_config);
  echo($z_data);

  $query = "
    update
      product
    set
      z_data='$z_data';
  ";

  mysqli_query($link, $query);
  mysqli_close($link);
}
?>