<div class="container catalog-marker-container">
  <div class="row">
    <div class="col">
      <?php
        $a_category = getProductCategory();

        foreach ($a_category as $a_item)
        {
          echo('<a 
                class="catalog-marker-item"
                href="index.php?id_page=catalog&k_product_category='.$a_item['k_product_category'].'"
                >'.$a_item['s_title'].'</a>'
          );
        }
      ?>
    </div>
  </div>
</div>