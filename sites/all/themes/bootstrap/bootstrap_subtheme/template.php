<?php

/**
 * @file
 * template.php
 */

function demo_preprocess_html(&$variables) {
  if (!empty($variables['page']['cart'])) {
    $variables['classes_array'][] = 'cart';
  }
}


function bootstrap_preprocess_field(&$variables) {
   if ($variables['element']['#field_name'] == 'field_banner_image') {
     $variables['element']['classes_array'] = 'img-responsive';
     $variables['classes_array'][] = array_merge($variables['classes_array'], $variables['element']['classes_array']);      
   }
}



?>