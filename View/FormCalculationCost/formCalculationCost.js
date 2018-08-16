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

    var $jq_box = $('.js-calc-cost-box');

    $.ajax({
      type: 'POST',
      url: '/View/FormCalculationCost/formCalculationCostModel.php',
      data: {
        k_product_category: $(this).val()
      },
      success: function (data)
      {
        $jq_box.find('table').remove();
        $jq_box.html(data);
      }
    });
  });

  $jq_output_count.val($jq_range.val());
  $jq_output_count_people.html($jq_range.val());

  $jq_range.on('input',function ()
  {
    $jq_output_count.val($jq_range.val());
    $jq_output_count_people.html($jq_range.val());
  });
});