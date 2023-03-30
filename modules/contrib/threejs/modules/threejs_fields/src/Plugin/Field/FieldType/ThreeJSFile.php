<?php

namespace Drupal\threejs_fields\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StreamWrapper\StreamWrapperInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\file\Plugin\Field\FieldType\FileItem;

/**
 * Plugin implementation of the 'threejs_file' field type.
 *
 * @FieldType(
 *   id = "threejs_file",
 *   label = @Translation("ThreeJS File"),
 *   description = @Translation("ThreeJS Files created by 3D Software"),
 *   category = @Translation("Reference"),
 *   default_widget = "threejs_file_widget",
 *   default_formatter = "threejs_file_formatter",
 *   column_groups = {
 *     "file" = {
 *       "label" = @Translation("File"),
 *       "columns" = {
 *         "target_id", "options"
 *       },
 *       "require_all_groups_for_translation" = TRUE
 *     },
 *     "title" = {
 *       "label" = @Translation("Title"),
 *       "translatable" = TRUE
 *     },
 *   },
 *   list_class = "\Drupal\file\Plugin\Field\FieldType\FileFieldItemList",
 *   constraints = {"ReferenceAccess" = {}, "FileValidation" = {}}
 * )
 */
class ThreeJSFile extends FileItem {

  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return [
      'default_canvas' => [
        'uuid' => NULL,
        'title' => '',
        'options' => [
          'rotation' => [
            'x' => '0.01',
            'y' => '0.1',
          ],
          'camera' => [
            'position' => [
              'x' => '-20',
              'y' => '30',
              'z' => '40',
            ],
            'controls' => [
              'orbit', 'fly',
            ],
          ],
        ],
      ],
    ] + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    $settings = [
      'file_extensions' => 'obj dae glb gltf stl pdb 3dm 3mf amf bvh dds drc exr fbx ifc hdr gcode kmz ktx ktx2 lwo md2 mdd mmd mtl mpd nrrd pcd pdb ply prwm pvr rgbe rgbm svg tds tga tif tiff ttf tilt vox vrm vtk xyz usdz',
      'title_field' => 0,
      'title_field_required' => 0,
      'default_canvas' => [
        'uuid' => NULL,
        'title' => '',
        'options' => [
          'rotation' => [
            'x' => '0.01',
            'y' => '0.1',
          ],
          'camera' => [
            'position' => [
              'x' => '-20',
              'y' => '30',
              'z' => '40',
            ],
            'controls' => [
              'orbit', 'fly',
            ],
          ],
        ],
      ],
    ] + parent::defaultFieldSettings();

    unset($settings['description_field']);
    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'target_id' => [
          'description' => 'The ID of the file entity.',
          'type' => 'int',
          'unsigned' => TRUE,
        ],
        'title' => [
          'description' => "Canvas title text, for the canvas's 'title' attribute.",
          'type' => 'varchar',
          'length' => 1024,
        ],
        'options' => [
          'description' => 'A serialized configuration canvas model object data.',
          'type' => 'blob',
          'not null' => FALSE,
          'size' => 'big',
        ],
      ],
      'indexes' => [
        'target_id' => ['target_id'],
      ],
      'foreign keys' => [
        'target_id' => [
          'table' => 'file_managed',
          'columns' => ['target_id' => 'fid'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);

    unset($properties['display']);
    unset($properties['description']);

    $properties['options'] = DataDefinition::create('any')
      ->setLabel(t('options'))
      ->setDescription(t('Options of the canvas object.'));

    $properties['title'] = DataDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t("Canvas title text, for the Canvas's 'title' attribute."));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data) {
    $element = [];

    // We need the field-level 'default_canvas' setting,
    // and $this->getSettings() will only provide the instance-level one,
    // so we need to explicitly fetch the field.
    $settings = $this->getFieldDefinition()->getFieldStorageDefinition()->getSettings();

    $scheme_options = \Drupal::service('stream_wrapper_manager')->getNames(StreamWrapperInterface::WRITE_VISIBLE);
    $element['uri_scheme'] = [
      '#type' => 'radios',
      '#title' => $this->t('Upload destination'),
      '#options' => $scheme_options,
      '#default_value' => $settings['uri_scheme'],
      '#description' => $this->t('Select where the final files should be stored. Private file storage has significantly more overhead than public files, but allows restricted access to files within this field.'),
    ];

    // Add default_canvas element.
    static::defaultThreeJsFileForm($element, $settings);
    $element['default_canvas']['#description'] = $this->t('This default Canvas object rendering options.');

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    // Get base form from FileItem.
    $element = parent::fieldSettingsForm($form, $form_state);

    $settings = $this->getSettings();

    // Remove the description option.
    unset($element['description_field']);

    // Add title configuration options.
    $element['title_field'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable <em>Title</em> field'),
      '#default_value' => $settings['title_field'],
      '#description' => $this->t('The title attribute is used as a tooltip when the mouse hovers over the image. Enabling this field is not recommended as it can cause problems with screen readers.'),
      '#weight' => 11,
    ];
    $element['title_field_required'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('<em>Title</em> field required'),
      '#default_value' => $settings['title_field_required'],
      '#weight' => 12,
      '#states' => [
        'visible' => [
          ':input[name="settings[title_field]"]' => ['checked' => TRUE],
        ],
      ],
    ];

    // Add default_canvas element.
    static::defaultThreeJsFileForm($element, $settings);
    $element['default_canvas']['#description'] = $this->t("This default configurations for uploaded or created 3D Canvas objects.");

    return $element;
  }

  /**
   * Builds the default_canvas details element.
   *
   * @param array $element
   *   The form associative array passed by reference.
   * @param array $settings
   *   The field settings array.
   */
  protected function defaultThreeJsFileForm(array &$element, array $settings) {
    $element['default_canvas'] = [
      '#type' => 'details',
      '#title' => $this->t('Default Canvas options'),
      '#open' => TRUE,
    ];
    // Convert the stored UUID to a FID.
    $fids = [];
    $uuid = $settings['default_canvas']['uuid'];
    if ($uuid && ($file = \Drupal::service('entity.repository')->loadEntityByUuid('file', $uuid))) {
      $fids[0] = $file->id();
    }
    $element['default_canvas']['uuid'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Canvas object'),
      '#description' => $this->t('Canvas object to be shown if no Canvas object is uploaded.'),
      '#default_value' => $fids,
      '#upload_location' => $settings['uri_scheme'] . '://default_canvas/',
      '#element_validate' => [
        '\Drupal\file\Element\ManagedFile::validateManagedFile',
      [get_class($this), 'validateDefaultThreeJsFileForm'],
      ],
      '#upload_validators' => $this->getUploadValidators(),
    ];

    $element['default_canvas']['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('The title attribute is used as a tooltip when the mouse hovers over the image.'),
      '#default_value' => $settings['default_canvas']['title'],
      '#maxlength' => 1024,
    ];
    $element['default_canvas']['options'] = [
      '#type' => 'details',
      '#title' => $this->t('3D Canvas options'),
      '#collapsed' => FALSE,
    ];
    // Animation settings.
    $element['default_canvas']['options']['rotation'] = [
      '#type' => 'item',
      '#title' => $this->t('Animation canvas object'),
      '#description' => $this->t('Animate Canvas object by X and Y (e.g. 0.1 and 0.001). Leave blank for no animation or using camera OrbitControls().'),
    ];
    $element['default_canvas']['options']['rotation']['x'] = [
      '#type' => 'number',
      '#title' => $this->t('Rotation X'),
      '#title_display' => 'invisible',
      '#default_value' => $settings['default_canvas']['options']['rotation']['x'],
      '#min' => 0,
      '#size' => 20,
      '#step' => 0.001,
      '#maxlength' => 24,
      '#field_suffix' => ' × ',
    ];
    $element['default_canvas']['options']['rotation']['y'] = [
      '#type' => 'number',
      '#title' => $this->t('Rotation Y'),
      '#title_display' => 'invisible',
      '#default_value' => $settings['default_canvas']['options']['rotation']['y'],
      '#min' => 0,
      '#size' => 20,
      '#step' => 0.001,
      '#maxlength' => 24,
      '#field_suffix' => ' ' . $this->t('milliseconds'),
    ];

    // Camera settings.
    $element['default_canvas']['options']['camera'] = [
      '#type' => 'details',
      '#title' => $this->t('Camera Options'),
      '#open' => TRUE,
    ];
    $element['default_canvas']['options']['camera']['position'] = [
      '#type' => 'item',
      '#title' => $this->t('Camera position settings'),
      '#description' => $this->t('Position and point the camera to the center of the scene.'),
    ];
    $element['default_canvas']['options']['camera']['position']['x'] = [
      '#type' => 'number',
      '#title' => $this->t('Camera position X'),
      '#title_display' => 'invisible',
      '#default_value' => $settings['default_canvas']['options']['camera']['position']['x'],
      '#maxlength' => 24,
      '#field_suffix' => $this->t('pixels'),
    ];
    $element['default_canvas']['options']['camera']['position']['y'] = [
      '#type' => 'number',
      '#title' => $this->t('Camera position Y'),
      '#title_display' => 'invisible',
      '#default_value' => $settings['default_canvas']['options']['camera']['position']['y'],
      '#maxlength' => 24,
      '#field_suffix' => $this->t('pixels'),
    ];
    $element['default_canvas']['options']['camera']['position']['z'] = [
      '#type' => 'number',
      '#title' => $this->t('Camera position Z'),
      '#title_display' => 'invisible',
      '#default_value' => $settings['default_canvas']['options']['camera']['position']['z'],
      '#maxlength' => 24,
      '#field_suffix' => $this->t('pixels'),
    ];

    // Camera Controls Settings.
    $element['default_canvas']['options']['camera']['controls'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Camera Control options'),
      '#options' => [
        'orbit' => $this->t('Orbit'),
        'fly' => $this->t('Fly'),
        'device_orientation' => $this->t('Device Orientation'),
        'drag' => $this->t('Drag'),
        'editor' => $this->t('Editor'),
        'first_person' => $this->t('First Person'),
        'pointer_lock' => $this->t('Pointer Lock'),
        'trackball' => $this->t('Trackball'),
        'transform' => $this->t('Transform'),
      ],
      '#default_value' => ['orbit'],
      '#description' => $this->t('Select camera Control parameters'),
    ];
  }

  /**
   * Validates the managed_file element for the default Image form.
   *
   * This function ensures the fid is a scalar value and not an array. It is
   * assigned as a #element_validate callback in
   * \Drupal\image\Plugin\Field\FieldType\ImageItem::defaultThreeJsFileForm().
   *
   * @param array $element
   *   The form element to process.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public static function validateDefaultThreeJsFileForm(array &$element, FormStateInterface $form_state) {
    // Consolidate the array value of this field to a single FID as #extended
    // for default image is not TRUE and this is a single value.
    if (isset($element['fids']['#value'][0])) {
      $value = $element['fids']['#value'][0];
      // Convert the file ID to an uuid.
      if ($file = \Drupal::service('entity_type.manager')->getStorage('file')->load($value)) {
        $value = $file->uuid();
      }
    }
    else {
      $value = '';
    }
    $form_state->setValueForElement($element, $value);
  }

  /**
   * {@inheritdoc}
   */
  public function isDisplayed() {
    // Canvas items do not have per-item visibility settings.
    return TRUE;
  }

}
