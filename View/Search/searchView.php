<?php
  include(USER_TEMPLATE.'Search/actionSearch.php');

  $s_search = $_REQUEST['s_search'] ?? '';
?>

<div class="search-input">
  <div class="box-search">
    <input type="search" id="s_search" placeholder="Поиск по товарам..." value="<?=$s_search?>" />
    <img src="<?=VIEW?>img/headerView/magnifying-glass.png" id="search-icon" alt="" />
    <img src="<?=VIEW?>img/headerView/magnifying-glass.png" id="m-search-open-icon" alt="" />
  </div>
</div>