$(document).ready(function()
{
  var $jq_range = $('#range-calc-cost'),
      $jq_select_item = $('#calc-cost-generator');

  /**
   * Работа селекта.
   */
  $jq_select_item.click(function ()
  {
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

  /**
   * Работа ползунка.
   */
  $jq_range.on('input',function ()
  {
    var $jq_table = $('.calc-cost-box-table'),
        $jq_phone = $('.js-calc-cost-phone'),
        $jq_output_count_people = $('.js-calc-cost-count-people');

    $('.js-calc-cost-count').val($jq_range.val());
    $jq_output_count_people.html($jq_range.val());

    $jq_table.removeClass('active-calc-cost');

    if($jq_range.val()<=3)
      $('.js-table-item-0').addClass('active-calc-cost');
    else if($jq_range.val()<=5&&$jq_range.val()>3)
      $('.js-table-item-1').addClass('active-calc-cost');
    else if($jq_range.val()<=8&&$jq_range.val()>5)
    {
      $jq_phone.css('display','none');
      $('.js-table-item-2').addClass('active-calc-cost');
    }
    else if($jq_range.val()>8)
    {
      $jq_table.css('display','none');
      $jq_phone.css('display','block');
    }
  });
});