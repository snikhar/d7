<?php

//echo "hello world!!!";
//dsm($fields);


?>





<div id="product-catalog">

<?php print $fields['field_product_image']->content; ?><br/>
<h4><?php print $fields['title']->content; ?></h4>
<?php print $fields['sku']->label; ?> : <?php print $fields['sku']->content; ?><br/>
<?php print $fields['field_color']->label; ?> : <?php print $fields['field_color']->content; ?> | 
<?php print $fields['field_size']->label; ?> : <?php print $fields['field_size']->content; ?><br/>
<?php print $fields['field_material']->label; ?> : <?php print $fields['field_material']->content; ?> | 
<?php print $fields['commerce_price']->label; ?> : <?php print $fields['commerce_price']->content; ?><br/>
<?php print $fields['add_to_cart_form']->content; ?>






</div>
