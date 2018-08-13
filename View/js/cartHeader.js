function add_to_cart(o_sender)
{
  $this = $(o_sender);
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
        // $('body').addClass('fixed-wrapper');
        $('.js-cart-order-clearance').css('display','flex');
      }
    });
  }
}

function add_to_cart_single(o_sender)
{
  $this = $(o_sender);
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
        // $('body').addClass('fixed-wrapper');
        $('.js-cart-order-clearance').css('display','flex');
      }
    });
  }
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
    $('.header-logo').css('display', 'block');
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