<?php
  $id_page = isset($_GET['id_page']) ? strtolower(strip_tags(trim($_GET['id_page']))) : 0;
  switch($id_page)
  {
    case 'contact':
      include ('contact/contactView.php');
      break;
    case 'about_company':
      include ('aboutCompany/aboutCompanyView.php');
      break;
    case 'shipping_pay':
      include ('shippingPayment/shippingPaymentView.php');
      break;
    default:
      include ('notFound.php');
  }
?>