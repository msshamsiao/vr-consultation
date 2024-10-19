import * as THREE from 'three';
import { VRButton } from 'three/examples/jsm/webxr/VRButton.js';

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('vr-container');
    const imageUrl = container.getAttribute('data-image-url'); // Get image URL from the data attribute

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.xr.enabled = true; // Enable VR mode
    container.appendChild(renderer.domElement);

    // Add VR button
    document.body.appendChild(VRButton.createButton(renderer));

    // Add ambient light
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5); // Soft white light
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(1, 1, 1);
    scene.add(directionalLight);

    // Load the texture (X-ray image)
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load(imageUrl, (texture) => {
        const aspectRatio = texture.image.width / texture.image.height;
        const geometry = new THREE.PlaneGeometry(5 * aspectRatio, 5); // Adjust geometry based on aspect ratio
        const material = new THREE.MeshBasicMaterial({ map: texture });
        const plane = new THREE.Mesh(geometry, material);
        plane.position.set(0, 1.6, -5); // Position in front of the camera
        scene.add(plane);

        // Adjust initial camera position (standing)
        camera.position.set(0, 1.6, 5); // Adjust height for standing position

        // Handle VR session start
        renderer.xr.addEventListener('sessionstart', () => {
            camera.position.set(0, 1.6, 0); // Center the camera for VR
        });

        // Handle VR session end (reset camera)
        renderer.xr.addEventListener('sessionend', () => {
            camera.position.set(0, 1.6, 5); // Reset camera when exiting VR
        });

        // Animation loop for rendering
        const animate = () => {
            renderer.setAnimationLoop(() => {
                renderer.render(scene, camera);
            });
        };
        animate();
    }, undefined, (error) => {
        console.error('Error loading texture:', error);
    });

    // Handle window resize, but avoid resizing during VR
    const handleResize = () => {
        if (!renderer.xr.isPresenting) { // Ensure resizing is only done outside VR sessions
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        }
    };
    window.addEventListener('resize', handleResize);

    // Check for WebXR support
    if (navigator.xr) {
        navigator.xr.isSessionSupported('immersive-vr').then((supported) => {
            if (!supported) {
                console.warn('Immersive VR not supported.');
            }
        }).catch(console.error);
    } else {
        console.warn('WebXR not supported in this browser.');
    }
});