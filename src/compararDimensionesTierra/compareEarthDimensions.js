const selectForm = planetForm.elements['planetData'];
let camera;
let scene;
let renderer;
let geometry;
let material;
let earthMesh;
let earthRadius;
let otherPlanetId;
let otherPlanetMesh;
let otherPlanetRadius;
let previousOtherPlanetId;

function init() {
  camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 0.01, 1000000);
  otherPlanetId = 0;
  previousOtherPlanetId = otherPlanetId;
  scene = new THREE.Scene();

  //earth configuration
  texture = new THREE.TextureLoader().load(`planetTextures/texture3.jpg`);
  geometry = new THREE.SphereGeometry(earthRadius, 30, 30);
  material = new THREE.MeshBasicMaterial({ map: texture });
  earthMesh = new THREE.Mesh(geometry, material);
  earthMesh.position.x = 0;
  scene.add(earthMesh);

  //other planet configuration
  otherPlanetRadius = parseFloat(selectForm.value.split(",")[1]);
  otherPlanetId = parseFloat(selectForm.value.split(",")[0]);
  texture = new THREE.TextureLoader().load(`planetTextures/texture${otherPlanetId}.jpg`);
  geometry = new THREE.SphereGeometry(otherPlanetRadius, 30, 30);
  material = new THREE.MeshBasicMaterial({ map: texture });
  otherPlanetMesh = new THREE.Mesh(geometry, material);
  otherPlanetMesh.position.x = 2*(otherPlanetRadius>1?otherPlanetRadius:2);
  scene.add(otherPlanetMesh);

  camera.position.x = otherPlanetMesh.position.x/2;
  biggerRadius = (otherPlanetRadius>earthRadius?otherPlanetRadius:earthRadius)
  camera.position.z = 10*(biggerRadius>1?biggerRadius:1);
  
  
  document.body.appendChild( canvas );
  renderer = new THREE.WebGLRenderer();
  renderer.setSize(window.innerWidth*0.8, window.innerHeight*0.8);
  renderer.setPixelRatio( window.devicePixelRatio );
  // renderer.domElement.id = "simulador";
  renderer.domElement.setAttribute("aria-label","This panel is interactive: you can zoom in, zoom out, change the perspective and the position of the camera");
  renderer.domElement.style.width = "100%";  
  renderer.domElement.style.height = "auto";  
  canvas.appendChild( renderer.domElement );
  controls = new THREE.OrbitControls(camera, canvas);


  texture = new THREE.TextureLoader().load(`planetTextures/texture${otherPlanetId}.jpg`);
  material = new THREE.MeshBasicMaterial({ map: texture });
  otherPlanetMesh.material.map.needsUpdate = true;
  otherPlanetMesh.material = material;
}

function animate() {
  requestAnimationFrame(animate);
  previousOtherPlanetId = otherPlanetId;
  otherPlanetRadius = parseFloat(selectForm.value.split(",")[1]);
  otherPlanetId = parseFloat(selectForm.value.split(",")[0]);
  console.log(otherPlanetRadius)
  earthMesh.rotation.y += 0.005;
  otherPlanetMesh.rotation.y += 0.005;
  if(previousOtherPlanetId!=otherPlanetId){
    texture = new THREE.TextureLoader().load(`planetTextures/texture${otherPlanetId}.jpg`);
    material = new THREE.MeshBasicMaterial({ map: texture });
    otherPlanetMesh.material = material;
    geometry = new THREE.SphereGeometry(otherPlanetRadius, 30, 30);
    otherPlanetMesh.geometry = geometry;
    biggerRadius = (otherPlanetRadius>earthRadius?otherPlanetRadius:earthRadius)
    camera.position.z = 10*(biggerRadius>1?biggerRadius:1);
    otherPlanetMesh.position.x = 2*(otherPlanetRadius>1?otherPlanetRadius:2);
    camera.position.x = otherPlanetMesh.position.x/2;
  }
  renderer.render(scene, camera);
}

function randomFloat(min, max) {
  return Math.random() * (max - min) + min;
}

function addStarField() {
  var geometry = new THREE.SphereGeometry(4000, 100, 100);
  var veryBigSphereForStars = new THREE.Mesh(geometry, undefined);
  veryBigSphereForStars.geometry.vertices
    .filter((x) => Math.random() > 0.5)
    .forEach((starCoords) => {
      const geometry = new THREE.SphereGeometry(5, 3, 3);
      const material = new THREE.MeshBasicMaterial({
        color: `rgb(255, 255, 255)`,
        transparent: true,
        opacity: Math.random()
      });
      const star = new THREE.Mesh(geometry, material);
      star.position.x = starCoords.x + randomFloat(-100, 100);
      star.position.y = starCoords.y + randomFloat(-100, 100);
      star.position.z = starCoords.z + randomFloat(-100, 100);
      scene.add(star);
    });
  scene.add(veryBigSphereForStars);
}

(async function () {
  earthRadius = 1;
  otherPlanetRadius = 5;

  init();
  addStarField();
  animate();
})();
