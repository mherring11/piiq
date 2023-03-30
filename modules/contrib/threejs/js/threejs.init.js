(function ($,Drupal, settings, once) {
  Drupal.behaviors.ThreeJSinit = {
    attach: function (context) {
      $(once("initiate-threejs", ".canvas-container .threejs", context)).each(function () {
        const file = $(this).data('model');
        const extension = file.split('.').pop().toUpperCase();
        const loaderName = extension + 'Loader';
        let loader = new THREE[loaderName]();
        let canvas = $(this).get(0);
        let renderer = new THREE.WebGLRenderer({canvas: canvas, antialias: true});
        renderer.setPixelRatio(window.devicePixelRatio);

        renderer.setSize(canvas.clientWidth, canvas.clientHeight);
        renderer.gammaFactor = 2.2;
        renderer.outputEncoding = THREE.sRGBEncoding;
        renderer.physicallyCorrectLights = true;

        const width = $(this).width();
        const height = $(this).height();
        let scene = new THREE.Scene();
        scene.background = new THREE.Color(settings.threejs.backgroundColor);
        let camera = new THREE.PerspectiveCamera(1, width / height, 0.1, 50);
        camera.position.set(settings.threejs.cameraX, settings.threejs.cameraY, settings.threejs.cameraZ);

        let ambient = new THREE.AmbientLight(0xffffff, 0.3);
        scene.add(ambient);
        let keyLight = new THREE.DirectionalLight(new THREE.Color('hsl(30, 100%, 75%)'), 1.0);
        keyLight.position.set(-100, 0, 100);

        let fillLight = new THREE.DirectionalLight(new THREE.Color('hsl(240, 100%, 75%)'), 0.75);
        fillLight.position.set(100, 0, 100);

        let backLight = new THREE.DirectionalLight(0xffffff, 1.0);
        backLight.position.set(100, 0, -100).normalize();

        scene.add(keyLight);
        scene.add(fillLight);
        scene.add(backLight);

        let mesh;
        loader.load(file, function (object) {

          var objBbox = new THREE.Box3().setFromObject(object);

          // Geometry vertices centering to world axis
          var bboxCenter = objBbox.getCenter(new THREE.Vector3()).clone();
          bboxCenter.multiplyScalar(-1);

          object.traverse(function (child) {
            if (child instanceof THREE.Mesh) {
              child.geometry.translate(bboxCenter.x, bboxCenter.y, bboxCenter.z);
            }
            if (settings.threejs.SphereMapUrl != '') {
              const texture = new THREE.TextureLoader().load(settings.threejs.SphereMapUrl);
              const material = new THREE.MeshBasicMaterial({map: texture});
              child.material = material;
            }
          });

          objBbox.setFromObject(object); // Update the bounding box

          scene.add(object);
        });

        // Add OrbitControls so that we can pan around with the mouse.
        let controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.25;
        controls.enableZoom = true;
        controls.autoRotate = true;
        controls.autoRotateSpeed = 1;
        render();

        function render() {
          // render using requestAnimationFrame
          requestAnimationFrame(render);
          if (mesh && settings.threejs.InitRotationX != '') {
            mesh.rotation.x -= 0.01;
          }
          if (mesh && settings.threejs.InitRotationY != '') {
            mesh.rotation.y -= 0.01;
          }
          if (mesh && settings.threejs.InitRotationZ != '') {
            mesh.rotation.z -= 0.01;
          }
          renderer.render(scene, camera);
        }
      });
    }
  };
}(jQuery, Drupal, drupalSettings, once));
