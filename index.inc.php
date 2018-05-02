<?php
  $id_page = getPageId();

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