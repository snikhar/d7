<?php 

//dsm($fields);
//dsm($row);
dsm($content);


//echo "hello world!!!";

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div id="product-diplay">
<!----------------- PRODUCT IMG ---------------------------------->
    <div id="product-img">
      <?php print render($content['product:field_product_image']); ?>
    </div>
<!---------------- PRODUCT TITLE -------------------->
<div id="product-title">

        <?php// print $title; ?>
<!---------------- PRODUCT SKU -------------------->
     <div style="height:21px;">      
        <?php print render($content['product:sku']); ?>
      </div>
      <div style="height:60px !important; padding-top:5px !important;">
        <?php print render($content['body']); ?>
      </div>
     
 <!---------------- PRODUCT SIZE AND COLOR  -------------------->
     
     <div  style="height:21px !imporant; padding-top:5px !important;">
       <?php print render($content['product:field_size']); ?>
    </div>

<!---------------- PRODUCT MATERIAL AND PRICE  -------------------->
  <div style="height:21px !important; padding-top:5px !important;">

        <?php print render($content['product:field_color']); ?>
     </div>
     
<!---------------- PRODUCT MATERIAL AND PRICE  -------------------->
  <div style="height:21px !important; padding-top:5px !important;">

        <?php print render($content['product:field_material']); ?>
     
</div>

<!---------------- PRODUCT MATERIAL AND PRICE  -------------------->
  <div style="height:21px !important; padding-top:5px !important;">

     
        <?php print render($content['product:commerce_price']); ?>
</div>
<br/>
<br/> 
     <div id="add-cart-btn"><?php print render($content['field_product']); ?></div> 


</div>




    <h1> <?php// print render($content['product:title']); ?> </h1>





  </div>

</div>
