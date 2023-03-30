<?php

namespace Drupal\threejs_fields\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\file\Plugin\Field\FieldWidget\FileWidget;

/**
 * Plugin implementation of the 'threejs_file_widget' widget.
 *
 * @FieldWidget(
 *   id = "threejs_file_widget",
 *   label = @Translation("3D Model File"),
 *   field_types = {
 *     "threejs_file"
 *   }
 * )
 */
class ThreeJSFileWidget extends FileWidget {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'progress_indicator' => 'throbber',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);

    $elements['canvas_preview_width'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Width preview container'),
      '#default_value' => $this->getSetting('canvas_preview_width'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 24,
      '#description' => $this->t("The width of preview canvas object's container before publishing. You can use 'px' or '%'."),
    ];
    $elements['canvas_preview_height'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Height preview container'),
      '#default_value' => $this->getSetting('canvas_preview_height'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 24,
      '#description' => $this->t("The height of preview canvas object's container before publishing. You can use 'px' or '%'."),
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = parent::settingsSummary();

    $summary[] = $this->t('Canvas size (width x height): @canvas_preview_width x @canvas_preview_height', [
      '@canvas_preview_width' => $this->getSetting('canvas_preview_width'),
      '@canvas_preview_height' => $this->getSetting('canvas_preview_height'),
    ]);
    if (!empty($this->getSetting('placeholder'))) {
      $summary[] = $this->t('Placeholder: @placeholder', ['@placeholder' => $this->getSetting('placeholder')]);
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);

    $field_settings = $this->getFieldSettings();

    // Add extention validation.
    // $element['#upload_validators']['file_validate_is_canvas'] = [];.
    $extensions = $field_settings['file_extensions'];
    $supported_extensions = 'obj dae glb gltf stl pdb 3dm 3mf amf bvh dds drc exr fbx ifc hdr gcode kmz ktx ktx2 lwo md2 mdd mmd mtl mpd nrrd pcd pdb ply prwm pvr rgbe rgbm svg tds tga tif tiff ttf tilt vox vrm vtk xyz usdz';

    // If using custom extension validation, ensure that the extensions are
    // supported by the current image toolkit. Otherwise, validate against all
    // toolkit supported extensions.
    $extensions = !empty($extensions) ? array_intersect(explode(' ', $extensions), explode(' ', $supported_extensions)) : $supported_extensions;
    $element['#upload_validators']['file_validate_extensions'][0] = implode(' ', $extensions);
    //
    //    // Add mobile device image capture acceptance.
    //    $element['#accept'] = 'canvas/*';
    // Add properties needed by process() method.
    $element['#title_field'] = $field_settings['title_field'];
    $element['#title_field_required'] = $field_settings['title_field_required'];

    // Default canvas.
    $default_canvas = $field_settings['default_canvas'];
    if (empty($default_canvas['uuid'])) {
      $default_canvas = $this->fieldDefinition->getFieldStorageDefinition()
        ->getSetting('default_canvas');
    }
    // Convert the stored UUID into a file ID.
    if (!empty($default_canvas['uuid']) && $entity = \Drupal::service('entity.repository')
      ->loadEntityByUuid('file', $default_canvas['uuid'])) {
      $default_canvas['fid'] = $entity->id();
    }
    $element['#default_canvas'] = !empty($default_canvas['fid']) ? $default_canvas : [];

    return $element;
  }

  /**
   * Form API callback: Processes a image_image field element.
   *
   * Expands the image_image type to include the alt and title fields.
   *
   * This method is assigned as a #process callback in formElement() method.
   */
  public static function process($element, FormStateInterface $form_state, $form) {
    $item = $element['#value'];
    $item['fids'] = $element['fids']['#value'];

    $element['#theme'] = 'threejs_file_widget';
    $ext = 'DAE';
    // Add the image preview.
    if (!empty($element['#files'])) {
      $file = reset($element['#files']);

      $model_uri = $file->getFileUri();
      $url = \Drupal::service('file_url_generator')->generate($model_uri);
      $ext = pathinfo($model_uri, PATHINFO_EXTENSION);
      $variables = [
        'uri' => $model_uri,
      ];
      /*
      $element['#attached']['drupalSettings'] = [
      'threejsField' => [
      'model' => $url->getUri(),
      ],
      ];
       */
      // Determine image dimensions.
      if (isset($element['#value']['width']) && isset($element['#value']['height'])) {
        $variables['width'] = $element['#value']['width'];
        $variables['height'] = $element['#value']['height'];
      }
      if (empty($variables['width'])) {
        $variables['width'] = '100%';
      }
      if (empty($variables['height'])) {
        $variables['height'] = '450px';
      }
      $element['preview'] = [
        '#weight' => -10,
        '#theme' => 'canvas',
        '#width' => $variables['width'],
        '#height' => $variables['height'],
        '#uri' => $variables['uri'],
        '#attributes' => [
          'class' => ['threejs'],
          'data-model' => Url::fromUri($url->getUri())->toString(),
        ],
      ];

      // Store the dimensions in the form so the file doesn't have to be
      // accessed again. This is important for remote files.
      $element['width'] = [
        '#type' => 'hidden',
        '#value' => $variables['width'],
      ];
      $element['height'] = [
        '#type' => 'hidden',
        '#value' => $variables['height'],
      ];
    }
    elseif (!empty($element['#default_canvas'])) {
      $default_canvas = $element['#default_canvas'];
      $file = File::load($default_canvas['fid']);
      $model_uri = $file->getFileUri();
      $url = \Drupal::service('file_url_generator')->generate($model_uri);
      $ext = pathinfo($model_uri, PATHINFO_EXTENSION);
      if (!empty($file)) {
        $element['preview'] = [
          '#weight' => -10,
          '#theme' => 'canvas',
          '#width' => $default_canvas['width'],
          '#height' => $default_canvas['height'],
          '#uri' => $file->getFileUri(),
          '#attributes' => [
            'data-model' => $url->getUri(),
          ],
        ];
      }
    }
    $loader = strtoupper($ext) . 'Loader';
    if (strtoupper($ext) == 'DAE') {
      $loader = 'ColladaLoader';
    }
    // Add the additional title fields.
    $element['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => $item['title'] ?? '',
      '#description' => t('The title is used as a tool tip when the user hovers the mouse over the canvas.'),
      '#maxlength' => 1024,
      '#weight' => -11,
      '#access' => (bool) $item['fids'] && $element['#title_field'],
      '#required' => $element['#title_field_required'],
      '#element_validate' => $element['#title_field_required'] == 1 ? [
        [
          get_called_class(),
          'validateRequiredFields',
        ],
      ] : [],
    ];
    if (empty($loader)) {
      $loader = 'ColladaLoader';
    }
    $element['preview']['#attributes']['data-loader'] = $loader;
    $element['#attached']['library'] = [
      'threejs/' . $loader,
      'threejs/orbit.controls',
      'threejs/admin',
    ];
    return parent::process($element, $form_state, $form);
  }

  /**
   * Validate callback for alt and title field, if the user wants them required.
   *
   * This is separated in a validate function instead of a #required flag to
   * avoid being validated on the process callback.
   */
  public static function validateRequiredFields($element, FormStateInterface $form_state) {
    // Only do validation if the function is triggered from other places than
    // the image process form.
    $triggering_element = $form_state->getTriggeringElement();
    if (empty($triggering_element['#submit']) || !in_array('file_managed_file_submit', $triggering_element['#submit'])) {
      // If the image is not there, we do not check for empty values.
      $parents = $element['#parents'];
      $field = array_pop($parents);
      $threejs_field = NestedArray::getValue($form_state->getUserInput(), $parents);
      // We check for the array key, so that it can be NULL (like if the user
      // submits the form without using the "upload" button).
      if (!array_key_exists($field, $threejs_field)) {
        return;
      }
    }
    else {
      $form_state->setLimitValidationErrors([]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    $dependencies = parent::calculateDependencies();
    // Some logic.
    return $dependencies;
  }

  /**
   * {@inheritdoc}
   */
  public function onDependencyRemoval(array $dependencies) {
    $changed = parent::onDependencyRemoval($dependencies);
    // Some logic.
    return $changed;
  }

}
