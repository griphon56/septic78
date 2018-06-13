// Карусель в услуг
$('.carousel').carousel();

// Карусель продуктов
$('#product-hit-sales').carousel();

// Карусель продуктов
$('#product-list').carousel();

// Плагин для картинок
;( function( $ ) {
  $( '.swipebox' ).swipebox( {
    useCSS : true, // false will force the use of jQuery for animations
    useSVG : true, // false to force the use of png for buttons
    initialIndexOnArray : 0, // which image index to init when a array is passed
    hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
    removeBarsOnMobile : true, // false will show top bar on mobile devices
    hideBarsDelay : 3000, // delay before hiding bars on desktop
    videoMaxWidth : 1140, // videos max width
    beforeOpen: function() {}, // called before opening
    afterOpen: null, // called after opening
    afterClose: function() {}, // called after closing
    loopAtEnd: false // true will return to the first image after the last image is reached
  } );

} )( jQuery );

// Карусль slick
$(document).ready(function() {
  $('.autoplay-slick-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000
  });

  // Ползунок FormCalculationCost
  var $jq_range = $('#range-calc-cost');
  var $jq_output_count = $('.js-calc-cost-count');
  var $jq_output_count_people = $('.js-calc-cost-count-people');
  var $jq_select_item = $('#calc-cost-generator');

  $jq_select_item.click(function ()
  {
    var $jq_img_title = $('.js-calc-cost-box-img-title');
    var $jq_title_septic = $('.js-calc-cost-title-septic');
    var $jq_price_septic = $('.js-calc-cost-price-septic');

    switch($jq_select_item.val())
    {
      case 'sepAstra':
        $jq_img_title.attr('src','../img/formCalculationCostView/2.png');
        $jq_title_septic.html('Септик Юнилос Астра 3');
        $jq_price_septic.html('62 050 руб.');
      break;

      case 'sepRostok':
        $jq_img_title.attr('src','../img/formCalculationCostView/1.png');
        $jq_title_septic.html('Септик Росток Мини');
        $jq_price_septic.html('25 900 руб.');
      break;

      default:
        $jq_img_title.attr('src','../img/formCalculationCostView/2.png');
        $jq_title_septic.html('Септик Юнилос Астра 3');
    }
  });

  $jq_output_count.val($jq_range.val());
  $jq_output_count_people.html($jq_range.val());

  $jq_range.on('input',function ()
  {
    $jq_output_count.val($jq_range.val());
    $jq_output_count_people.html($jq_range.val());
  });
});