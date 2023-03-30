<?php

namespace Drupal\threejs_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Field\EntityReferenceFieldItemListInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\field\FieldConfigInterface;
use Drupal\file\Plugin\Field\FieldFormatter\FileFormatterBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Cache\Cache;

/**
 * Plugin implementation of the 'threejs_file_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "threejs_file_formatter",
 *   label = @Translation("WebGL Render"),
 *   field_types = {
 *     "threejs_file"
 *   }
 * )
 */
class ThreeJSFileFormatter extends FileFormatterBase implements ContainerFactoryPluginInterface {

  /**
   * The image style entity storage.
   *
   * @var \Drupal\image\ImageStyleStorageInterface
   */
  protected $canvasStorage;

  /**
   * The file URL generator.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGenerator;

  /**
   * The entity repository service.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * Constructs an ImageFormatter object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings settings.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $file_url_generator
   *   The file URL generator.
   * @param \Drupal\Core\Entity\EntityRepositoryInterface $entity_repository
   *   The entity repository service.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, FileUrlGeneratorInterface $file_url_generator, EntityRepositoryInterface $entity_repository) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings, $file_url_generator);
    $this->entityRepository = $entity_repository;
    $this->fileUrlGenerator = $file_url_generator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('file_url_generator'),
      $container->get('entity.repository')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'InitRotationX' => 0.05,
      'InitRotationY' => 0.03,
      'InitRotationZ' => 0,
      'cameraX' => -30,
      'cameraY' => 35,
      'cameraZ' => 5,
      'SphereMapUrl' => '',
      'backgroundColor' => '#ffffff',
      'ModelColor' => '#caa618',
      'width' => '100%',
      'height' => '480',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element['width'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Container width'),
      '#description' => $this->t('Width of the container, in pixels.'),
      '#default_value' => $this->getSetting('width'),
    ];
    $element['height'] = [
      '#type' => 'number',
      '#min' => 50,
      '#max' => 1024,
      '#step' => 1,
      '#title' => $this->t('Container height'),
      '#description' => $this->t('Height of the container, in pixels.'),
      '#default_value' => $this->getSetting('height'),
    ];
    $element['ModelColor'] = [
      '#type' => 'color',
      '#title' => $this->t('Model color'),
      '#description' => $this->t('Fallback color for all meshes, in hexadecimal.'),
      '#default_value' => $this->getSetting('ModelColor'),
    ];
    $element['backgroundColor'] = [
      '#type' => 'color',
      '#title' => $this->t('Background color'),
      '#description' => $this->t("Background color of the viewer's container, in hexadecimal"),
      '#default_value' => $this->getSetting('backgroundColor'),
    ];
    $element['InitRotationX'] = [
      '#type' => 'number',
      '#min' => 0,
      '#max' => 1,
      '#step' => 0.001,
      '#title' => $this->t('Automatically rotate the object around the X axis'),
      '#description' => $this->t("use value beweteen 0 -> 1 like 0.005"),
      '#default_value' => $this->getSetting('InitRotationX'),
    ];
    $element['InitRotationY'] = [
      '#type' => 'number',
      '#min' => 0,
      '#max' => 1,
      '#step' => 0.001,
      '#title' => $this->t('Automatically rotate the object around the Y axis'),
      '#description' => $this->t("use value beweteen 0 -> 1 like 0.005"),
      '#default_value' => $this->getSetting('InitRotationY'),
    ];
    $element['InitRotationZ'] = [
      '#type' => 'number',
      '#min' => 0,
      '#max' => 1,
      '#step' => 0.001,
      '#title' => $this->t('Automatically rotate the object around the Z axis'),
      '#description' => $this->t("use value beweteen 0 -> 1 like 0.005"),
      '#default_value' => $this->getSetting('InitRotationZ'),
    ];
    $element['cameraX'] = [
      '#type' => 'number',
      '#step' => 1,
      '#title' => $this->t('Camera Position Axe X'),
      '#default_value' => $this->getSetting('cameraX'),
    ];
    $element['cameraY'] = [
      '#type' => 'number',
      '#step' => 1,
      '#title' => $this->t('Camera Position Axe Y'),
      '#default_value' => $this->getSetting('cameraY'),
    ];
    $element['cameraZ'] = [
      '#type' => 'number',
      '#step' => 1,
      '#title' => $this->t('Camera Position Axe Z'),
      '#default_value' => $this->getSetting('cameraZ'),
    ];
    $element['SphereMapUrl'] = [
      '#type' => 'number',
      '#title' => $this->t('Sphere mapping url'),
      '#description' => $this->t('Url string that describes where to load the image used for sphere mapping. <br/> ex: sites/all/libraries/three.js/examples/textures/metal.jpg'),
      '#default_value' => $this->getSetting('SphereMapUrl'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.
    $canvas_background = $this->getSetting('backgroundColor');
    if (!empty($canvas_background)) {
      $summary[] = $this->t('Background color scene: @color', ['@color' => $canvas_background]);
    }
    else {
      $summary[] = $this->t('Background color scene is transparent');
    }

    $summary[] = $this->t('Model color: @value', ['@value' => $this->getSetting('ModelColor')]);

    $sphere = $this->getSetting('SphereMapUrl');
    if (!empty($sphere)) {
      $summary[] = $this->t('Sphere mapping: @map', ['@map' => $sphere]);
    }

    $canvas_width = $this->getSetting('width');
    $canvas_height = $this->getSetting('height');
    if (!empty($canvas_width) || !empty($canvas_width)) {
      $summary[] = $this->t('Canvas scene size: @width x @height', [
        '@width' => !empty($canvas_width) ? $canvas_width : '100%',
        '@height' => !empty($canvas_height) ? $canvas_height : '100%',
      ]);
    }

    $summary[] = $this->t('Camera position (@x,@y,@z)', [
      '@x' => $this->getSetting('cameraX'),
      '@y' => $this->getSetting('cameraY'),
      '@z' => $this->getSetting('cameraZ'),
    ]);

    $summary[] = $this->t('Rotation (@x,@y,@z)', [
      '@x' => $this->getSetting('InitRotationX'),
      '@y' => $this->getSetting('InitRotationY'),
      '@z' => $this->getSetting('InitRotationZ'),
    ]);

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $files = $this->getEntitiesToView($items, $langcode);

    // Early opt-out if the field is empty.
    if (empty($files)) {
      return $elements;
    }

    // Collect cache tags to be added for each item in the field.
    $base_cache_tags = [];
    foreach ($files as $delta => $file) {
      $cache_contexts = [];

      $model_uri = $file->getFileUri();
      // @todo Wrap in file_url_transform_relative(). This is currently
      // impossible. As a work-around, we currently add the 'url.site' cache
      // context to ensure different file URLs are generated for different
      // sites in a multisite setup, including HTTP and HTTPS versions of the
      // same site. Fix in https://www.drupal.org/node/2646744.
      $url = $this->fileUrlGenerator->generateAbsoluteString($model_uri);
      $cache_contexts[] = 'url.site';

      $cache_tags = Cache::mergeTags($base_cache_tags, $file->getCacheTags());

      // Extract field item attributes for the theme function, and unset them
      // from the $item so that the field template does not re-render them.
      $item = $file->_referringItem;
      $item_attributes = $item->_attributes;
      unset($item->_attributes);
      $ext = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
      $loader = strtoupper($ext) . 'Loader';
      if (strtoupper($ext) == 'DAE') {
        $loader = 'ColladaLoader';
      }
      if (strtoupper($ext) == 'GLB') {
        $loader = 'GLTFLoader';
      }
      if (strtoupper($ext) == 'HDR') {
        $loader = 'RGBELoader';
      }
      $item_attributes['loader'] = $loader;
      $elements[$delta] = [
        '#theme' => 'threejs_formatter',
        '#item' => $item,
        '#item_attributes' => $item_attributes,
        '#url' => $url,
        '#cache' => [
          'tags' => $cache_tags,
          'contexts' => $cache_contexts,
        ],
        '#attached' => [
          'drupalSettings' => [
            'threejs' => $this->settings,
          ],
          'library' => [
            'threejs/' . $loader,
            'threejs/orbit.controls',
            // 'threejs/WebGL',
            // 'threejs/stats',
            'threejs/init',
          ],
        ],
      ];
    }

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    $dependencies = parent::calculateDependencies();
    return $dependencies;
  }

  /**
   * {@inheritdoc}
   */
  public function onDependencyRemoval(array $dependencies) {
    $changed = parent::onDependencyRemoval($dependencies);
    return $changed;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntitiesToView(EntityReferenceFieldItemListInterface $items, $langcode) {
    // Add the default image if needed.
    if ($items->isEmpty()) {
      $default_canvas = $this->getFieldSetting('default_canvas');
      // If we are dealing with a configurable field, look in both
      // instance-level and field-level settings.
      if (empty($default_canvas['uuid']) && $this->fieldDefinition instanceof FieldConfigInterface) {
        $default_canvas = $this->fieldDefinition->getFieldStorageDefinition()->getSetting('default_image');
      }
      if (!empty($default_canvas['uuid']) && $file = $this->entityRepository->loadEntityByUuid('file', $default_canvas['uuid'])) {
        // Clone the FieldItemList into a runtime-only object for the formatter,
        // so that the fallback image can be rendered without affecting the
        // field values in the entity being rendered.
        $items = clone $items;
        $items->setValue([
          'target_id' => $file->id(),
          'title' => $default_canvas['title'],
          'width' => $default_canvas['width'],
          'height' => $default_canvas['height'],
          'entity' => $file,
          '_loaded' => TRUE,
          '_is_default' => TRUE,
        ]);
        $file->_referringItem = $items[0];
      }
    }

    return parent::getEntitiesToView($items, $langcode);
  }

}
