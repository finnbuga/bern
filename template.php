<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

/**
 * Returns HTML for a date element formatted as a range.
 *
 * Replace "to" with "-" when displaying date intervals
 * e.g. "01/01/2015 to 02/01/2015" becomes "01/01/2015 - 02/01/2015"
 */
function bern_date_display_range($variables) {
  $date1 = $variables['date1'];
  $date2 = $variables['date2'];
  $timezone = $variables['timezone'];
  $attributes_start = $variables['attributes_start'];
  $attributes_end = $variables['attributes_end'];
  $show_remaining_days = $variables['show_remaining_days'];

  $start_date = '<span class="date-display-start"' . drupal_attributes($attributes_start) . '>' . $date1 . '</span>';
  $end_date = '<span class="date-display-end"' . drupal_attributes($attributes_end) . '>' . $date2 . $timezone . '</span>';

  // If microdata attributes for the start date property have been passed in,
  // add the microdata in meta tags.
  if (!empty($variables['add_microdata'])) {
    $start_date .= '<meta' . drupal_attributes($variables['microdata']['value']['#attributes']) . '/>';
    $end_date .= '<meta' . drupal_attributes($variables['microdata']['value2']['#attributes']) . '/>';
  }

  // Wrap the result with the attributes.
  $output = '<div class="date-display-range">' . t('!start-date – !end-date', array(
      '!start-date' => $start_date,
      '!end-date' => $end_date,
    )) . '</div>';

  // Add remaining message and return.
  return $output . $show_remaining_days;
}
