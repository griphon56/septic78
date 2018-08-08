<div class="container catalog-marker-container">
  <div class="row">
    <div class="col">
      <?php
        $k_product_category = $_REQUEST['k_product_category'];

        $a_category = getProductCategory();
        foreach ($a_category as $a_item)
        {
          if($k_product_category==$a_item['k_product_category'])
            $s_active = 'active-marker';
          else
            $s_active = '';

          echo('
            <a 
              class="catalog-marker-item '.$s_active.'"
              href="catalog&k_product_category='.$a_item['k_product_category'].'"
            >'.$a_item['s_title'].'</a>'
          );
        }
      ?>
    </div>
  </div>
</div>