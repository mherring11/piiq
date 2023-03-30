import * as THREE from 'three';

const loader = new THREE.GLTFLoader();
const scene = new THREE.Scene()
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 )
const renderer = new THREE.WebGLRenderer({ antialias: true})

loader.load( '/ThreeJS/models/scene.gltf', function ( gltf ) {
    console.log('adding scene');
	scene.add( gltf.scene );

}, undefined, function ( error ) {

	console.error( error );

} );

renderer.setSize( window.innerWidth, window.innerHeight )
// sets renderer background color
renderer.setClearColor("#ffffff")
document.body.appendChild( renderer.domElement )
camera.position.z = 120

// resize canvas on resize window
window.addEventListener( 'resize', () => {
	let width = window.innerWidth
	let height = window.innerHeight
	renderer.setSize( width, height )
	camera.aspect = width / height
	camera.updateProjectionMatrix()
})

// ambient light
var ambientLight = new THREE.AmbientLight ( 0xffffff, 0.9)
scene.add( ambientLight )

// point light
var pointLight = new THREE.PointLight( 0xffffff, 2 );
pointLight.position.set( 25, 50, 25 );
scene.add( pointLight );

// Set up mouse position tracking
var mouseX = 0;
var windowHalfX = window.innerWidth / 2;

document.addEventListener( 'mousemove', onDocumentMouseMove, false );

function onDocumentMouseMove( event ) {
    mouseX = ( event.clientX - windowHalfX ) / windowHalfX;
}

function animate() {
	requestAnimationFrame( animate )
	// cube.rotation.x += 0.04;
	// cube.rotation.y += 0.04;
  //wireframeCube.rotation.x -= 0.01;
	// wireframeCube.rotation.y -= 0.01;
    scene.rotation.y += mouseX * 0.04;
	renderer.render( scene, camera )
}
animate()