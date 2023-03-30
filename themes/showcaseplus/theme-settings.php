<?php

function showcaseplus_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['mtt_settings']['looknfeel_tab']['looknfeel']['color_scheme'] = array(
    '#type' => 'select',
    '#title' => t('Color Schemes'),
    '#description'   => t('From the drop-down menu, select the color scheme you prefer.'),
    '#default_value' => theme_get_setting('color_scheme'),
    '#options' => array(
    'blue' => t('Blue'),
    'gold' => t('Gold'),
    'gray' => t('Gray'),
    'green' => t('Green'),
    'khaki' => t('Khaki'),
    'lime' => t('Lime'),
    'night-blue' => t('Night Blue'),
    'orange' => t('Orange'),
    'pink' => t('Pink'),
    'purple' => t('Purple'),
    'red' => t('Red'),
    'local' => t('Local'),
    ),
  );
}
