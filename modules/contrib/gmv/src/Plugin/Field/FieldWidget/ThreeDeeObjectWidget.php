<?php

namespace Drupal\gmv\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Plugin\Field\FieldWidget\FileWidget;

/**
 * Plugin implementation of the 'field_three_dee_object' widget.
 *
 * @FieldWidget(
 *   id = "field_three_dee_object",
 *   label = @Translation("Three dee object"),
 *   field_types = {
 *     "field_three_dee_object"
 *   }
 * )
 */
class ThreeDeeObjectWidget extends FileWidget {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'camera' => 1,
      'height' => 0,
      'width' => 0,
      'camera' => 1,
      'touch_action' => 'pan-left',
      'shadow' => 1,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    // Get the field settings.
    $elements = parent::settingsForm($form, $form_state);
    return $elements;
  }
  
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);
    $item = $items[$delta];   
    $element += [
      'camera' => [
        '#type' => 'checkbox',
        '#title' => $this->t('Camera Control'),
        '#description' => $this->t('Camera control enable/disable for 3D object'),
        '#default_value' => empty($item->camera) ? 1 : $item->camera,
      ],
      'touch_action' => [
        '#type' => 'select',
        '#title' => $this->t('Touch Action'),
        '#options' => [
          'pan_y' => 'pan-y',
          'pan_x' => 'pan-x',
          'auto' => 'auto',
          'none' => 'none',
          'pan-left' => 'pan-left',
          'pan-right' => 'pan-right',
          'pan-up' => 'pan-up',
          'pan-down' => 'pan-down',
          'pinch-zoom' => 'pinch-zoom',
          'manipulation' => 'manipulation',
          'inherit' => 'inherit',
          'initial' => 'initial',
          'revert' => 'revert',
          'revert-layer' => 'revert-layer',
          'unset' => 'unset'
      ],
        '#description' => $this->t('touch-action CSS property'),
        '#default_value' => $item->touch_action,
      ],
      'shadow' => [
        '#type' => 'number',
        '#min' => 1,
        '#title' => $this->t('Shadow Intensity'),
        '#description' => $this->t('Shadow intensity for 3D object'),
        '#default_value' => empty($item->shadow) ? 1 : $item->shadow,
      ],
      'file' => [
        '#type' => 'managed_file',
        '#title' => $this->t('Background Image'),
        '#upload_location' => 'public://skyboximage',
        '#default_value' => isset($item->skybox_image_id) ? array($item->skybox_image_id) : NULL,      
      ],
      'three_dee_fid' => [
        '#type' => 'hidden',
        '#value' => isset($item->three_dee_fid) ? $item->three_dee_fid : NULL, 
      ]
    ];

    return $element;
  }

}