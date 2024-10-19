import * as THREE from 'three';
import { VRButton } from 'three/examples/jsm/webxr/VRButton.js';

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('vr-container');
    const imageUrl = container.getAttribute('data-image-url'); // Get image URL from the data attribute

    // Set up the scene, camera, and renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.xr.enabled = true; // Enable VR mode
    container.appendChild(renderer.domElement);

    // Add VR button
    document.body.appendChild(VRButton.createButton(renderer));

    // Add ambient light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.4); // Cool white light
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
    directionalLight.position.set(1, 1, 1);
    scene.add(directionalLight);

    // Create the room dimensions
    const roomWidth = 20, roomHeight = 10, roomDepth = 20;

    // Floor: Procedural grid texture (reflective medical feel)
    const floorCanvas = document.createElement('canvas');
    floorCanvas.width = 512;
    floorCanvas.height = 512;
    const floorContext = floorCanvas.getContext('2d');

    // Create a grid pattern for the floor with cool gray and light blue
    floorContext.fillStyle = '#d9e1e7'; // Light blue-gray base
    floorContext.fillRect(0, 0, 512, 512);
    floorContext.strokeStyle = '#a6b7c8'; // Cool gray for the grid lines
    for (let i = 0; i <= 512; i += 64) {
        floorContext.beginPath();
        floorContext.moveTo(i, 0);
        floorContext.lineTo(i, 512);
        floorContext.moveTo(0, i);
        floorContext.lineTo(512, i);
        floorContext.stroke();
    }
    const floorTexture = new THREE.CanvasTexture(floorCanvas);
    const floorMaterial = new THREE.MeshStandardMaterial({ map: floorTexture });

    // Wall: Procedural vertical lines texture (sterile clinical look)
    const wallCanvas = document.createElement('canvas');
    wallCanvas.width = 512;
    wallCanvas.height = 512;
    const wallContext = wallCanvas.getContext('2d');

    // Create vertical striped pattern for the wall
    for (let i = 0; i < 16; i++) {
        wallContext.fillStyle = i % 2 === 0 ? '#ffffff' : '#d9e1e7'; // White and light blue-gray stripes
        wallContext.fillRect(i * 32, 0, 32, 512);
    }
    const wallTexture = new THREE.CanvasTexture(wallCanvas);
    const wallMaterial = new THREE.MeshStandardMaterial({ map: wallTexture });

    // Ceiling: Procedural texture with subtle grid pattern in cool gray
    const ceilingCanvas = document.createElement('canvas');
    ceilingCanvas.width = 512;
    ceilingCanvas.height = 512;
    const ceilingContext = ceilingCanvas.getContext('2d');

    // Create grid pattern for the ceiling (light gray with darker lines)
    ceilingContext.fillStyle = '#e8eaec'; // Light gray base
    ceilingContext.fillRect(0, 0, 512, 512);
    ceilingContext.strokeStyle = '#b0b8c1'; // Medium gray for grid lines
    for (let i = 0; i <= 512; i += 64) {
        ceilingContext.beginPath();
        ceilingContext.moveTo(i, 0);
        ceilingContext.lineTo(i, 512);
        ceilingContext.moveTo(0, i);
        ceilingContext.lineTo(512, i);
        ceilingContext.stroke();
    }
    const ceilingTexture = new THREE.CanvasTexture(ceilingCanvas);
    const ceilingMaterial = new THREE.MeshStandardMaterial({ map: ceilingTexture });

    // Floor
    const floorGeometry = new THREE.PlaneGeometry(roomWidth, roomDepth);
    const floor = new THREE.Mesh(floorGeometry, floorMaterial);
    floor.rotation.x = -Math.PI / 2; // Rotate to make it horizontal
    scene.add(floor);

    // Back Wall
    const wallGeometry = new THREE.PlaneGeometry(roomWidth, roomHeight);
    const backWall = new THREE.Mesh(wallGeometry, wallMaterial);
    backWall.position.set(0, roomHeight / 2, -roomDepth / 2);
    scene.add(backWall);

    // Left Wall
    const leftWall = new THREE.Mesh(wallGeometry, wallMaterial);
    leftWall.position.set(-roomWidth / 2, roomHeight / 2, 0);
    leftWall.rotation.y = Math.PI / 2; // Rotate to make it vertical
    scene.add(leftWall);

    // Right Wall
    const rightWall = new THREE.Mesh(wallGeometry, wallMaterial);
    rightWall.position.set(roomWidth / 2, roomHeight / 2, 0);
    rightWall.rotation.y = -Math.PI / 2; // Rotate to make it vertical
    scene.add(rightWall);

    // Ceiling
    const ceilingGeometry = new THREE.PlaneGeometry(roomWidth, roomDepth);
    const ceiling = new THREE.Mesh(ceilingGeometry, ceilingMaterial);
    ceiling.rotation.x = Math.PI / 2; // Rotate to make it horizontal
    ceiling.position.y = roomHeight; // Position on top
    scene.add(ceiling);

    // Load the texture (X-ray image)
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load(imageUrl, (texture) => {
        // Apply texture filtering for better quality
        texture.minFilter = THREE.LinearFilter; // Smooth filtering
        texture.magFilter = THREE.LinearFilter; // Smooth filtering
        texture.anisotropy = renderer.getMaxAnisotropy(); // Use the highest anisotropy for better quality

        const aspectRatio = texture.image.width / texture.image.height;

        // Calculate screen dimensions based on aspect ratio
        let screenWidth = roomWidth * 0.6;  // Target width
        let screenHeight = screenWidth / aspectRatio;

        // If height exceeds the room's limits, adjust both dimensions accordingly
        if (screenHeight > roomHeight * 0.6) {
            screenHeight = roomHeight * 0.6;
            screenWidth = screenHeight * aspectRatio;
        }

        // Monitor frame (with padding for thickness)
        const framePadding = 0.2;
        const monitorFrameGeometry = new THREE.BoxGeometry(screenWidth + framePadding, screenHeight + framePadding, 0.2);
        const frameMaterial = new THREE.MeshStandardMaterial({
            color: 0x2c2f33, // Darker matte finish for medical-grade bezel
            roughness: 0.4,
            metalness: 0.1
        });
        const monitorFrame = new THREE.Mesh(monitorFrameGeometry, frameMaterial);
        monitorFrame.position.set(0, (screenHeight + framePadding) / 2 + 1, -roomDepth / 2 + 1.5); // Position above the floor
        scene.add(monitorFrame);

        // X-ray screen (adjusting based on actual texture size and ratio)
        const screenGeometry = new THREE.PlaneGeometry(screenWidth, screenHeight);
        const screenMaterial = new THREE.MeshBasicMaterial({ map: texture });
        const screen = new THREE.Mesh(screenGeometry, screenMaterial);
        screen.position.set(0, (screenHeight / 2) + 1, -roomDepth / 2 + 1.6); // Position in front of the frame
        scene.add(screen);

        // Monitor stand base
        const baseHeight = 0.05; // Height of the base
        const baseWidth = 0.4; // Width of the base
        const baseDepth = 0.3; // Depth of the base
        const baseGeometry = new THREE.BoxGeometry(baseWidth, baseHeight, baseDepth);
        const baseMaterial = new THREE.MeshStandardMaterial({ color: 0x333333 }); // Dark gray color
        const monitorBase = new THREE.Mesh(baseGeometry, baseMaterial);
        monitorBase.position.set(0, baseHeight / 2, -roomDepth / 2 + 0.3); // Position on the floor
        scene.add(monitorBase);

        // Monitor stand pole
        const poleHeight = 0.8; // Height of the pole
        const poleWidth = 0.05; // Width of the pole
        const poleGeometry = new THREE.CylinderGeometry(poleWidth, poleWidth, poleHeight);
        const poleMaterial = new THREE.MeshStandardMaterial({ color: 0x555555 }); // Medium gray color
        const monitorPole = new THREE.Mesh(poleGeometry, poleMaterial);
        monitorPole.position.set(0, baseHeight + poleHeight / 2, -roomDepth / 2 + 0.3); // Position above the base
        scene.add(monitorPole);

        // Adding glass screen effect
        const glassGeometry = new THREE.PlaneGeometry(screenWidth, screenHeight);
        const glassMaterial = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            transparent: true,
            opacity: 0.1 // Opacity level for glass effect
        });
        const glassScreen = new THREE.Mesh(glassGeometry, glassMaterial);
        glassScreen.position.set(0, (screenHeight / 2) + 1, -roomDepth / 2 + 1.601); // Position above the X-ray screen
        scene.add(glassScreen);
    });

    // Camera position
    camera.position.set(0, 1.6, 3); // Eye level position in VR

    // Animation loop
    function animate() {
        renderer.setAnimationLoop(render); // Use setAnimationLoop for VR
    }

    function render() {
        renderer.render(scene, camera);
    }

    animate();
});
