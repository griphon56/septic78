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

/**
 * Метод открытия меню (моб. версия)
 */
function menu_open(o_sender)
{
  $this = $(o_sender);
  var jq_main_menu_container = $('.js-main-menu');
  var jq_wrapper = $('body');

  $this.toggleClass('m-menu-open');
  jq_main_menu_container.toggleClass('m-main-menu');
  jq_wrapper.toggleClass('fixed-wrapper');

  if($('.m-menu-back').length)
  {
    $this.removeClass('m-menu-back');
    $this.addClass('m-menu-open');
    jq_wrapper.addClass('fixed-wrapper');
    jq_main_menu_container.addClass('m-main-menu');
  }

  $('.header-submenu').css('display', 'none');
}

$(document).ready(function()
{
  var jq_mobile_icon = $('.js-m-menu-icon');

  /**
   * Проверяю изменение размера экрана.
   */
  $(window).bind("resize", function ()
  {
    jq_mobile_icon.removeClass('m-menu-open');
    jq_mobile_icon.removeClass('m-menu-back');
    $('.js-main-menu').removeClass('m-main-menu');
    $('.search-input').removeClass('m-search-open-input');
  });

  /**
   * Метод, отображения под меню.
   */
  if($(window).width()<=768)
  {
    $('.m-menu-icon-arrow').closest('a').click(function ()
    {
      $(this).siblings('.header-submenu').css('display', 'block');
      jq_mobile_icon.addClass('m-menu-back');
    });
  }
});