{
  "accessors": [
    {
      "bufferView": 2,
      "componentType": 5126,
      "count": 40603,
      "max": [
        90.03907012939453,
        46.16404724121094,
        70.58158874511719
      ],
      "min": [
        0.0,
        0.0,
        0.0
      ],
      "type": "VEC3"
    },
    {
      "bufferView": 2,
      "byteOffset": 487236,
      "componentType": 5126,
      "count": 40603,
      "max": [
        0.9999126195907593,
        0.9996275901794434,
        0.9998440146446228
      ],
      "min": [
        -0.9997535943984985,
        -0.9998139142990112,
        -0.9998753666877747
      ],
      "type": "VEC3"
    },
    {
      "bufferView": 1,
      "componentType": 5126,
      "count": 40603,
      "max": [
        0.9958750009536743,
        0.9997879862785339
      ],
      "min": [
        0.0003659999929368496,
        0.0039059999398887157
      ],
      "type": "VEC2"
    },
    {
      "bufferView": 0,
      "componentType": 5125,
      "count": 149997,
      "type": "SCALAR"
    }
  ],
  "asset": {
    "extras": {
      "author": "objets3D (https://sketchfab.com/objets3D)",
      "license": "CC-BY-4.0 (http://creativecommons.org/licenses/by/4.0/)",
      "source": "https://sketchfab.com/3d-models/raspberry-d045eaf534384d9eb926245a5a09ead4",
      "title": "Raspberry"
    },
    "generator": "Sketchfab-12.68.0",
    "version": "2.0"
  },
  "bufferViews": [
    {
      "buffer": 0,
      "byteLength": 599988,
      "name": "floatBufferViews",
      "target": 34963
    },
    {
      "buffer": 0,
      "byteLength": 324824,
      "byteOffset": 599988,
      "byteStride": 8,
      "name": "floatBufferViews",
      "target": 34962
    },
    {
      "buffer": 0,
      "byteLength": 974472,
      "byteOffset": 924812,
      "byteStride": 12,
      "name": "floatBufferViews",
      "target": 34962
    }
  ],
  "buffers": [
    {
      "byteLength": 1899284,
      "uri": "scene.bin"
    }
  ],
  "images": [
    {
      "uri": "textures/rpi_L_baseColor.jpeg"
    }
  ],
  "materials": [
    {
      "doubleSided": true,
      "name": "rpi_L",
      "pbrMetallicRoughness": {
        "baseColorTexture": {
          "index": 0
        },
        "metallicFactor": 0.0,
        "roughnessFactor": 0.6
      }
    }
  ],
  "meshes": [
    {
      "name": "Object_0",
      "primitives": [
        {
          "attributes": {
            "NORMAL": 1,
            "POSITION": 0,
            "TEXCOORD_0": 2
          },
          "indices": 3,
          "material": 0,
          "mode": 4
        }
      ]
    }
  ],
  "nodes": [
    {
      "children": [
        1
      ],
      "matrix": [
        0.7815032005310059,
        0.5668031573295594,
        -0.26074305176734913,
        0.0,
        -0.3548585772514343,
        0.0600791946053507,
        -0.932987630367279,
        0.0,
        -0.5131551027297974,
        0.8216596841812134,
        0.2480870485305788,
        0.0,
        -18.193077087402344,
        12.470826148986816,
        -1.9172670841217014,
        1.0
      ],
      "name": "Sketchfab_model"
    },
    {
      "children": [
        2
      ],
      "matrix": [
        1.0,
        0.0,
        0.0,
        0.0,
        0.0,
        1.0,
        0.0,
        0.0,
        0.0,
        0.0,
        1.0,
        0.0,
        -66.95547485351563,
        -48.67835998535156,
        -43.703460693359375,
        1.0
      ],
      "name": "rpi_L.obj.cleaner.materialmerger.gles"
    },
    {
      "children": [
        3
      ],
      "name": "Object_2"
    },
    {
      "mesh": 0,
      "name": "Object_3"
    }
  ],
  "samplers": [
    {
      "magFilter": 9729,
      "minFilter": 9987,
      "wrapS": 10497,
      "wrapT": 10497
    }
  ],
  "scene": 0,
  "scenes": [
    {
      "name": "Sketchfab_Scene",
      "nodes": [
        0
      ]
    }
  ],
  "textures": [
    {
      "sampler": 0,
      "source": 0
    }
  ]
}
;
//import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
//const gltfLoader = new THREE.GLTFLoader();
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
animate();
