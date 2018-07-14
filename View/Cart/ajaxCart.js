$(document).ready(function()
{
  /**
   * Изменение количества товаров в корзине на странице Cart (add).
   */
  $('.js-quantity-cart .quantity-up').click(function(event)
  {
    var k_product = $(this).closest('.quantity').find('input[type="number"]').attr('name');
    if (k_product)
    {
      $.ajax({
        type: 'POST',
        url: '/View/Cart/actionCartProduct.php',
        data: {
          action_cart: 'add',
          i_qty: 1,
          k_product: k_product
        },
        success: function(data)
        {
          $("#cart-header").load("index.php #cart-header > *");
          $(".js_cart_product_total"+k_product).load("index.php?id_page=cart .js_cart_product_total"+k_product+" > *");
          $("#cart-total").load("index.php?id_page=cart #cart-total > *");
        }
      });
    }
  });

  /**
   * Изменение количества товаров в корзине на странице Cart (del).
   */
  $('.js-quantity-cart .quantity-down').click(function(event)
  {
    var k_product = $(this).closest('.quantity').find('input[type="number"]').attr('name');
    if (k_product)
    {
      $.ajax({
        type: 'POST',
        url: '/View/Cart/actionCartProduct.php',
        data: {
          action_cart: 'del_single',
          k_product: k_product
        },
        success: function(data)
        {
          $("#cart-header").load("index.php #cart-header > *");
          $(".js_cart_product_total"+k_product).load("index.php?id_page=cart .js_cart_product_total"+k_product+" > *");
          $("#cart-total").load("index.php?id_page=cart #cart-total > *");
        }
      });
    }
  });
});

/**
 * Метод удаления товара из корзины.
 *
 * @param o_sender
 */
function del_product_cart(o_sender)
{
  $this = $(o_sender);

  var k_product = $this.attr('name');

  if (k_product)
  {
    $.ajax({
      type: 'POST',
      url: '/View/Cart/actionCartProduct.php',
      data: {
        action_cart: 'del',
        k_product: k_product
      },
      success: function(data)
      {
        $this.closest('.cart-product-item').remove();
        $("#cart-total").load("index.php?id_page=cart #cart-total > *");
        $("#cart-header").load("index.php #cart-header > *");
      }
    });
  }
  else
  {
    alert('Товар не удален.');
  }
}

/**
 * Метод сохранения заказа.
 *
 * @param o_sender
 */
function save_order(o_sender)
{
  $this = $(o_sender);

  var jq_container = $('.cart-order-clearance');

  var s_name = jq_container.find('input[name="s_name"]').val();
  var s_phone = jq_container.find('input[name="s_phone"]').val();
  var s_email = jq_container.find('input[name="s_email"]').val();
  var s_address = jq_container.find('input[name="s_address"]').val();
  var is_agree = 0;
  if(jq_container.find('input[name="is_agree"]').is(':checked'))
    is_agree = 1;
  var k_delivery = jq_container.find('input[name="delivery"]:checked').val();

  if (s_name&&s_phone&&s_email&&s_address)
  {
    $.ajax({
      type: 'POST',
      url: '/View/Cart/actionCartProduct.php',
      data: {
        action_cart: 'save_order',
        is_agree: is_agree,
        k_delivery: k_delivery,
        s_address: s_address,
        s_email: s_email,
        s_name: s_name,
        s_phone: s_phone
      },
      success: function(data)
      {
        $("#cart-order-clearance").load("index.php?id_page=cart #cart-order-clearance > *");
        $("#cart-product-container").load("index.php?id_page=cart #cart-product-container > *");
        $("#cart-header").load("index.php #cart-header > *");
      }
    });
  }
  else
  {
    alert('Не все данные заполнены.');
  }
}