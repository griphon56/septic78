<?php
  $id_page = getPageId();

  switch($id_page)
  {
    case 'contact':
      include ('Contact/contactView.php');
      break;
    case 'about_company':
      include ('AboutCompany/aboutCompanyView.php');
      break;
    case 'shipping_pay':
      include ('ShippingPayment/shippingPaymentView.php');
      break;
    case 'service':
      include ('Service/serviceView.php');
      break;
    default:
      include ('notFound.php');
  }
?>