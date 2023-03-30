<?php

namespace Drupal\gmv\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Plugin implementation of the 'field_three_dee_object' formatter.
 *
 * @FieldFormatter(
 *   id = "field_three_dee_object",
 *   label = @Translation("three dee object formatter"),
 *   field_types = {
 *     "field_three_dee_object"
 *   }
 * )
 */
class ThreeDeeObjectFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
    // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
    // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = []; 
    foreach ($items as $delta => $item) { 
    
      $background_img_path = NULL;
      $path = NULL;
      
      if($item->skybox_image_id != NULL) {
      
        $background_img_file = File::load($item->skybox_image_id); 
        if( $background_img_file->status->value != 1 ) {
          $background_img_file->setPermanent();
          $background_img_file->save();
        }      
        $background_img_path = \Drupal::service('file_url_generator')->generateAbsoluteString($background_img_file->getFileUri());
        
      }
      
      if ($item->three_dee_fid) {      
        $file = File::load($item->three_dee_fid);
        $path = \Drupal::service('file_url_generator')->generateAbsoluteString($file->getFileUri());
      }
     
      $elements[$delta] = [
        '#theme' => 'gmv_image_formatter',
        '#uri' => $path,
        '#camera' => $item->camera,
        '#touch_action' => $item->touch_action,
        '#shadow' => $item->shadow,
        '#skybox_image' => $background_img_path,        
      ];
    }

    return $elements;
  }

}