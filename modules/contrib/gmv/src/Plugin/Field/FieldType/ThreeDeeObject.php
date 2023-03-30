<?php

namespace Drupal\gmv\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\file\Plugin\Field\FieldType\FileItem;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Archiver\Zip;

/**
 * Plugin implementation of the 'field_three_dee_object' field type.
 *
 * @FieldType(
 *   id = "field_three_dee_object",
 *   label = @Translation("Google Model Viewer"),
 *   module = "field_example",
 *   description = @Translation("File for google model viewer"),
 *   default_widget = "field_three_dee_object",
 *   default_formatter = "field_three_dee_object",
 *   list_class = "\Drupal\file\Plugin\Field\FieldType\FileFieldItemList",
 *   constraints = {"ReferenceAccess" = {}, "FileValidation" = {}}
 * )
 */
class ThreeDeeObject extends FileItem {

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    $settings = [
    'camera' => 1,
    'touch_action' => 'pan-left',
    'shadow' => 1,
    'file_extensions' => 'zip',
    'file_directory' => 'gmv',
    'filesize' => '50M'
    ] + parent::defaultFieldSettings();
    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);
    $schema['columns']['fid'] = [
      'type' => 'int',
      'size' => 'normal',
      'not null' => FALSE,
    ];
    $schema['columns']['camera'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'default' => 1,
    ];
    $schema['columns']['touch_action'] = [
      'type' => 'varchar',
      'default' => 'pan-left',
      'length' => 50,
      'description' => "touch-action CSS property",
    ];
    $schema['columns']['shadow'] = [
      'type' => 'int',
      'unsigned' => TRUE,
      'default' => 1,
      'description' => "shadow intensity for 3D object",
    ];
    $schema['columns']['skybox_image_id'] = [
      'type' => 'int',
      'size' => 'normal',
      'not null' => FALSE,
    ];
    $schema['columns']['three_dee_fid'] = [
      'type' => 'int',
      'size' => 'normal',
      'not null' => FALSE,
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::fieldSettingsForm($form, $form_state);
    $element['file_extensions']['#disabled'] = TRUE;
    $element['file_extensions']['#access'] = FALSE;
    $element['file_directory']['#disabled'] = FALSE;
    $element['file_directory']['#access'] = FALSE;
    $settings = $this->getSettings();
    $element['camera'] = [
      '#type' => 'int',
      '#title' => $this->t('camera controls'),
      '#default_value' => $settings['camera'] ?? 1,
      '#description' => $this->t('Camera Controls'),
    ];
    $element['touch_action'] = [
      '#type' => 'varchar',
      '#title' => $this->t('touch action'),
      '#default_value' => $settings['touch_action'] ?? '',
      '#description' => $this->t('Touch Actions'),
    ];
    $element['shadow'] = [
      '#type' => 'int',
      '#title' => $this->t('shadow intensity'),
      '#default_value' => $settings['shadow'] ?? 1,
      '#description' => $this->t('Shadow Intensity'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    return [
      'camera' => DataDefinition::create('integer')
        ->setLabel(t('camera control'))
        ->setDescription(t("camera control for 3D object")),
      'shadow' => DataDefinition::create('integer')
        ->setLabel(t('shadow intensity'))
        ->setDescription(t("shadow intensity for 3D object")),
      'touch_action' => DataDefinition::create('string')
        ->setLabel(t('touch action'))
        ->setDescription(t("touch action")),
      'height' => DataDefinition::create('integer')
        ->setLabel(t('Height'))
        ->setDescription(t("Height in pixel.")),
      'width' => DataDefinition::create('integer')
        ->setLabel(t('Width'))
        ->setDescription(t("Width in pixel.")),  
    ] + parent::propertyDefinitions($field_definition);
  }

  /**
   * {@inheritdoc}
   */
  public function preSave() {    
    $fileEntity = $this->get('entity')->getValue();
    $fname = $fileEntity->filename->value;  
    $dir_path = pathinfo($fname, PATHINFO_FILENAME); 
    $path  = 'public://gmv'.'/'.$dir_path;  
    $data = $this->getValue();
    $skybox_image_id = (isset($data['file'][0])) ? $data['file'][0] : NULL;
    $this->skybox_image_id = $skybox_image_id; 
    if (TRUE !== is_dir($path)) {
      $fid = $this->processFile();
      $this->three_dee_fid = $fid; 
    }  
    parent::preSave();
   
  }

  /**
   * {@inheritdoc}
   */
  protected function processFile() {
    if ($file = $this->get('entity')->getValue()) {
      return $this->processFileEntity($file);
    }
  }

  /**
   * Function for extracting .zip fil and create gltf file entity.
   */
  protected function processFileEntity($file) {
    if ($file_info = $this->threedeeZipfile($file)) {
      $zipFile = $file_info['zip_file'];
      $folderUri = $file_info['folder_uri'];
      $zipFile->extract($folderUri);
      $file_system = \Drupal::service('file_system');
      if ($files = $file_system->scanDirectory($folderUri, '/\b(\.gltf)\b/')) {
        foreach ($files as $file) {
          $file_data = File::create(
            [
              'filename' => $file->filename,
              'uri' => $file->uri,
              'status' => 1,
              'uid' => \Drupal::currentUser()->id(),
            ]
          );
          $file_data->save();
          $extension = pathinfo($file->filename, PATHINFO_EXTENSION);
          if ($extension == "gltf") {
            $fid = $file_data->id();
          }
        }
        return $fid ?? NULL;
      }
    }
  }

  /**
   * Function return zip file object, folder uri and filename.
   */
  protected function threedeeZipfile(File $file) {
    $uri = $file->getFileUri();  
    if (file_exists($uri)) {
      $file_system = \Drupal::service('file_system');
      $realPath = $file_system->realpath($uri);
      $zipFile = new Zip($realPath);
      $pathinfo = pathinfo($uri);
      $folderUri = $pathinfo['dirname'];     
      $cleanFilename = $pathinfo['filename'];     
      $folderUri = $folderUri . '/' . $cleanFilename;
      $file_system->prepareDirectory($folderUri);

      return [
        'zip_file' => $zipFile,
        'folder_uri' => $folderUri,
        'clean_filename' => $cleanFilename,
      ];
    }
    return NULL;
  }

}