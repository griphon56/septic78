function add_to_cart(o_sender)
{
  $this = $(o_sender);
  // Контейнер корзины в шапке
  var $jq_container_cart = $('.container-cart');

  // Контейнер количества товара в корзине (красненький кружок)
  var $jq_cart_count_container = $jq_container_cart.find('.js-container-cart-count-product');

  // Сюда число записывается
  var $jq_cart_count_product = $jq_cart_count_container.find('.js-cart-count-product');

  // Контейнер прадварительной суммы в корзине
  var $jq_cart_cost = $('#header-cost');

  var $i_cart_count_item = parseInt($jq_cart_count_product.text().replace(/\s/g, ''));
  var $i_cart_total_cost = parseInt($jq_cart_cost.text().replace(/\s/g, ''));

  // Контейнер одного товара
  var $jq_product_item = $this.closest('.product-item-box');
  // Стоимость одного товара
  var $jq_price_product = $jq_product_item.find('.js-price-active');
  $i_price_product = parseInt($jq_price_product.text().replace(/\s/g, ''));

  $i_cart_total_cost += $i_price_product;
  $i_cart_count_item += 1;

  // Вывожу на экран показатели корзины
  $jq_cart_cost.html($i_cart_total_cost.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1 "));
  $jq_cart_count_product.html($i_cart_count_item);

  if ($i_cart_count_item)
    $jq_cart_count_container.show();
  else
    $jq_cart_count_container.hide();
}