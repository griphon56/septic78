$(document).ready(function()
{
  $('#s_search').keyup(function(event)
  {
    if(event.keyCode===13)
    {
      var s_search = $(this).val();
      window.location.href='index.php?id_page=search&s_search='+s_search;
    }
  });

  $('#search-icon').click(function()
  {
      var s_search = $('#s_search').val();
      window.location.href='index.php?id_page=search&s_search='+s_search;
  });

  $('#m-search-open-icon').click(function()
  {
    $('.search-input').toggleClass('m-search-open-input');
    $('.header-logo').toggle();
  });
});
