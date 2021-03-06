<?php
/**
 * @file
 * booking_timeslots.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function booking_timeslots_taxonomy_default_vocabularies() {
  return array(
    'booking_type' => array(
      'name' => 'Booking Type',
      'machine_name' => 'booking_type',
      'description' => '',
      'hierarchy' => '2',
      'module' => 'taxonomy',
      'weight' => '0',
    ),
  );
}
