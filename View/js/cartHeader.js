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

  var k_product = $this.attr('name');

  if (k_product)
  {
    $.ajax({
      type: 'POST',
      url: '/View/Cart/actionCartProduct.php',
      data: {
        action_cart: 'add',
        k_product: k_product,
        i_price: $i_price_product
      },
      success: function (data)
      {
        $("#cart-header").load("index.php #cart-header > *");

        //  [1] => 'i_total'
        //  [2] => 'i_qty'
        $a_data = data.split('/');
        $i_cart_total_cost = $a_data[0];
        $i_cart_count_item = $a_data[1];
      }
    });
  }
  else
  {
    alert('Товар не добавлен.');
  }

  if ($i_cart_count_item)
    $jq_cart_count_container.show();
  else
    $jq_cart_count_container.hide();

  // Уведомление о добавлении товара.
  $('.notif').fadeIn().fadeOut(1000);
}

function add_to_cart_single(o_sender)
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

  // Стоимость одного товара
  var $jq_price_product = $('.js-price-active');
  $i_price_product = parseInt($jq_price_product.text().replace(/\s/g, ''));
  // Количество товара
  $i_count_product = parseInt($('input[name="qty_product"]').val());

  var k_product = $this.attr('name');

  if (k_product)
  {
    $.ajax({
      type: 'POST',
      url: '/View/Cart/actionCartProduct.php',
      data: {
        action_cart: 'add',
        i_price: $i_price_product,
        i_qty: $i_count_product,
        k_product: k_product
      },
      success: function (data)
      {
        $("#cart-header").load("index.php #cart-header > *");

        //  [1] => 'i_total'
        //  [2] => 'i_qty'
        $a_data = data.split('/');
        $i_cart_total_cost = $a_data[0];
        $i_cart_count_item = $a_data[1];
      }
    });
  }
  else
  {
    alert('Товар не добавлен.');
  }

  if ($i_cart_count_item)
    $jq_cart_count_container.show();
  else
    $jq_cart_count_container.hide();

  // Уведомление о добавлении товара.
  $('.notif').fadeIn().fadeOut(1000);
}