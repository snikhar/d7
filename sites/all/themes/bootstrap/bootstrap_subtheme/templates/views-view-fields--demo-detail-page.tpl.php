<?php


//echo "dnfsk";

//dsm($fields);

?>



<div id="product-diplay">
    <div id="product-img">
      <?php print $fields['field_product_image']->content; ?>
    </div>


<div id="product-title" style="margin-left:18px">
        <?php// print $title; ?>
     <div style="height:21px;">
       <?php print $fields['sku']->label; ?> : <?php print $fields['sku']->content; ?>
      </div>
      <div style="height:60px !important; padding-top:5px !important;">
        <?php /*print render($fields['body']);*/ ?>
      </div>

     <div  style="height:21px !imporant; padding-top:5px !important;">
       <?php print $fields['field_size']->label; ?> : <?php print $fields['field_size']->content; ?>
    </div>
  <div style="height:21px !important; padding-top:5px !important;">
        <?php print $fields['field_color']->label; ?> : <?php print $fields['field_color']->content; ?>
     </div>
  <div style="height:21px !important; padding-top:5px !important;">
        <?php print $fields['field_material']->label; ?> : <?php print $fields['field_material']->content; ?>
</div>
  <div style="height:21px !important; padding-top:5px !important;">
        <?php print $fields['commerce_price']->label; ?> : <?php print $fields['commerce_price']->content; ?>
</div>
<br/>
<br/>
     <div id="add-cart-btn"><?php print $fields['add_to_cart_form']->content; ?></div>
</div>

    <h1> <?php// print render($fields['product:title']); ?> </h1>





  </div>
