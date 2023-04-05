//import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
//const gltfLoader = new THREE.GLTFLoader();
//get by id div 3d
const container3D = document.getElementById("three3d");
container3D.innerHTML = "";
var CANVAS_WIDTH = 800;
var CANVAS_HEIGHT = 800;

const loader = new THREE.GLTFLoader();
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
  75,
  CANVAS_WIDTH / CANVAS_HEIGHT,
  0.1,
  1000
);
const renderer = new THREE.WebGLRenderer({ antialias: true });

loader.load(
  "themes/showcaseplus/threejs/models/scene.gltf",
  function (gltf) {
    console.log("adding scene");
    scene.add(gltf.scene);
  },
  undefined,
  function (error) {
    console.error(error);
  }
);

//renderer.setSize( window.innerWidth, window.innerHeight )
// sets renderer background color
renderer.setClearColor("#ffffff"); // this is the background color
container3D.appendChild(renderer.domElement);
camera.position.z = 135;

// resize canvas on resize window
window.addEventListener("resize", () => {
  let width = window.innerWidth;
  let height = window.innerHeight;
  renderer.setSize(width, height);
  camera.aspect = width / height;
  camera.updateProjectionMatrix();
});

// ambient light
var ambientLight = new THREE.AmbientLight(0xffffff, 2);
scene.add(ambientLight);

// point light
var pointLight = new THREE.PointLight(0xffffff, 1);
pointLight.position.set(25, 50, 25);
scene.add(pointLight);

// Set up mouse position tracking
var mouseX = 1;
var windowHalfX = window.innerWidth / 2;

document.addEventListener("mousemove", onDocumentMouseMove, false);

function onDocumentMouseMove(event) {
  mouseX = (event.clientX - windowHalfX) / windowHalfX;
}

function animate() {
  requestAnimationFrame(animate);
  //   cube.rotation.x += 0.04;
  //   cube.rotation.y += 0.04;
  // wireframeCube.rotation.x -= 0.01;
  // wireframeCube.rotation.y -= 0.01;
  scene.rotation.y += mouseX * 0.02;
  renderer.render(scene, camera);
}
animate();
