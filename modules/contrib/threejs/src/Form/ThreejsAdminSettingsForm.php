<?php

namespace Drupal\threejs\Form;

use Drupal\Core\Asset\LibraryDiscoveryInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Configure Three.js settings for this site.
 */
class ThreejsAdminSettingsForm extends ConfigFormBase {

  /**
   * The library discovery service.
   *
   * @var \Drupal\Core\Asset\LibraryDiscoveryInterface
   */
  protected $libraryDiscovery;

  /**
   * Constructs a \Drupal\system\ConfigFormBase object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Asset\LibraryDiscoveryInterface $library_discovery
   *   The library discovery service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, LibraryDiscoveryInterface $library_discovery) {
    parent::__construct($config_factory);
    $this->libraryDiscovery = $library_discovery;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('library.discovery')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'threejs_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['threejs.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $container_width = $this->config('threejs.settings')->get('container_width');
    $container_height = $this->config('threejs.settings')->get('container_height');

    $form['threejs_test'] = [
      '#type' => 'item',
      '#title' => $this->t('Test Three.js library'),
      '#markup' => '<div id="testThreejs" width="' . $container_width . '" height="' . $container_height . '"></div>',
      '#attached' => [
        'library' => [
          'threejs/orbit.controls',
          'threejs/test',
        ],
        'drupalSettings' => [
          'threejs' => [
            'container' => [
              'background_color' => $this->config('threejs.settings')->get('background_color'),
              'width' => $container_width,
              'height' => $container_height,
            ],
          ],
        ],
      ],
    ];

    // Color.
    $form['background_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Default background color'),
      '#default_value' => $this->config('threejs.settings')->get('background_color'),
      '#description' => $this->t('Default background color rendering in container'),
    ];
    $form['container_width'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Container width'),
      '#default_value' => $this->config('threejs.settings')->get('container_width'),
      '#description' => $this->t('Default container rendering width. You can use percents (%), pixels(px). Example: 100%'),
    ];
    $form['container_height'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Container height'),
      '#default_value' => $this->config('threejs.settings')->get('container_height'),
      '#description' => $this->t('Default container rendering height. You can use percents (%), pixels(px). Example: 480px'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('threejs.settings')
      ->set('background_color', $form_state->getValue('background_color'))
      ->set('container_width', $form_state->getValue('container_width'))
      ->set('container_height', $form_state->getValue('container_height'))
      ->save();

    // Invalidate the library discovery cache to update new assets.
    $this->libraryDiscovery->clearCachedDefinitions();

    parent::submitForm($form, $form_state);
  }

}
