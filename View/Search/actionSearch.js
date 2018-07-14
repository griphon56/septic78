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

  $('#search').click(function()
  {
      var s_search = $('#s_search').val();
      window.location.href='index.php?id_page=search&s_search='+s_search;
  });
});
