/**
 * @file
 * TestThreeJS behaviors.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Behavior description.
   */
  Drupal.behaviors.ThreeJSAdmin = {
    /**
     * ThreeJS Options, coming from Drupal.settings.
     */
    threejsOptions: {},
    /**
     * Load ThreeJS once page is ready
     */
    attach: function (context, settings) {
      this.ThreeJSOptions = settings.threejs ? settings.threejs.options : {};

      var container = $('.canvas-container', context);
      if (container.length) {
        if (typeof THREE !== "undefined") {
          this.renderThreeJSField();
        }
        else {

        }
      }

    },

    /**
     * Simple threejs example for testing library
     */
    renderThreeJSField: function () {
      var settings = {
        fov: 1,
        aspectRatio: 4 / 5,
        cameraNear: 0.1,
        cameraFar: 50,
        cameraPosition: {x:-30,y:35,z:5},
        backgroundColor: 0x8fbcd4
      }
      const objects = [];
      $(".canvas-container .threejs").each(function () {
        init($(this),$(this).data('loader'),$(this).data('model'));
      });
      function init(canvas,loaderName, model) {
        const container = canvas.get(0);

        const scene = new THREE.Scene();
        scene.background = new THREE.Color(settings.backgroundColor);
        const clientRatio = container.clientWidth / container.clientHeight;
        const camera = new THREE.PerspectiveCamera(settings.fov, clientRatio, settings.cameraNear, settings.cameraFar);
        camera.position.set(settings.cameraPosition.x, settings.cameraPosition.y, settings.cameraPosition.z);
        const controls = new THREE.OrbitControls(camera, container);

        const lights = createLights();
        const materials = createMaterials();
        //todo load with extesion
        let loader = new THREE[loaderName]();
        loader.load( model, function ( obj ) {
          var objBbox = new THREE.Box3().setFromObject(obj);
          var bboxCenter = objBbox.getCenter(new THREE.Vector3()).clone();
          bboxCenter.multiplyScalar(-1);

          obj.traverse(function (child) {
            if (child instanceof THREE.Mesh) {
              child.geometry.translate(bboxCenter.x, bboxCenter.y, bboxCenter.z);
            }
          });
          objBbox.setFromObject(obj);

          objects.push(obj);
          scene.add( obj );
          //todo Camera Zoom To Fit Object
          let size = objBbox.getSize(new THREE.Vector3());

        }, undefined, function ( error ) {

          console.error( error );

        } );
        scene.add(
          lights.ambient,
          lights.main,
        );

        const renderer = createRenderer(container);

        setupOnWindowResize(camera, container, renderer);

        renderer.setAnimationLoop(() => {
          renderer.render(scene, camera);
        });
      }

      function createLights() {
        const ambient = new THREE.HemisphereLight(0xddeeaa, 0x0f0e0d, 2);

        const main = new THREE.DirectionalLight(0xbbbbbb, 3);
        main.position.set(1, 1, 1);

        return {
          ambient,
          main
        };
      }

      function createMaterials() {
        const main = new THREE.MeshStandardMaterial({
          color: 0xcccccc,
          flatShading: true,
          transparent: true,
          opacity: 0.5
        });

        main.color.convertSRGBToLinear();

        const highlight = new THREE.MeshStandardMaterial({
          color: 0xff4444,
          flatShading: true
        });

        highlight.color.convertSRGBToLinear();

        return {
          main,
          highlight
        };
      }

      function createRenderer(container) {

        let renderer = new THREE.WebGLRenderer({canvas: container, antialias: true});
        renderer.setSize(container.clientWidth, container.clientHeight);

        renderer.setPixelRatio(window.devicePixelRatio);

        renderer.gammaFactor = 2.2;
        renderer.outputEncoding = THREE.sRGBEncoding;

        renderer.physicallyCorrectLights = true;

        return renderer;
      }

      function setupOnWindowResize(camera, container, renderer) {
        window.addEventListener("resize", () => {
          camera.aspect = container.clientWidth / container.clientHeight;
          camera.updateProjectionMatrix();
          renderer.setSize(container.clientWidth, container.clientHeight);
        });
      }
    }
  };

}(jQuery, Drupal));
