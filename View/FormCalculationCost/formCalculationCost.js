$(document).ready(function()
{
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
        $jq_img_title.attr('src','../View/img/formCalculationCostView/2.png');
        $jq_title_septic.html('Септик Юнилос Астра 3');
        $jq_price_septic.html('62 050 руб.');
        break;

      case 'sepRostok':
        $jq_img_title.attr('src','../View/img/formCalculationCostView/1.png');
        $jq_title_septic.html('Септик Росток Мини');
        $jq_price_septic.html('25 900 руб.');
        break;

      default:
        $jq_img_title.attr('src','../View/img/formCalculationCostView/2.png');
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