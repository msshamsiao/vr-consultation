<!-- resources/views/xray/view.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View X-ray Image in VR</h1>
    <div id="vr-container" style="width: 100%; height: 600px;"></div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('vr-container');
        const imageUrl = '{{ $xray_image_url }}';

        // Initialize scene, camera, and renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        // Load the X-ray image as a texture
        const textureLoader = new THREE.TextureLoader();
        textureLoader.load(imageUrl, (texture) => {
            const geometry = new THREE.PlaneGeometry(5, 5); // Adjust size as needed
            const material = new THREE.MeshBasicMaterial({ map: texture });
            const plane = new THREE.Mesh(geometry, material);
            scene.add(plane);

            // Position the camera
            camera.position.z = 5;

            // Render loop
            const animate = () => {
                requestAnimationFrame(animate);
                renderer.render(scene, camera);
            };
            animate();
        });
    });
</script>
@endsection
