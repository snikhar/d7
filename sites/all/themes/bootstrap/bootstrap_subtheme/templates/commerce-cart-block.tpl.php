<div id="my-cart">


<?php


//echo "dfuwerfjksdhfknk";
 
//views_get_view('commerce_cart_block', true);
//print $variables;

//$uid = is_object($user) ? $user->uid : null;
//$order_id = commerce_cart_order_id($uid);
$view = views_get_view('commerce_cart_block', true);
//$view->set_arguments(array($order_id));
//$view->set_display('default');
$view->execute();
$summary = $view->footer['line_item_summary'];
print $summary->render();
?>


</div>


