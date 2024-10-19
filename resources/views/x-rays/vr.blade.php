<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VR Consultation</title>
    <style>
        body { margin: 0; }
        canvas { display: block; }
    </style>
</head>
<body>
    <div id="vr-container" data-image-url="{{ url('storage/xrays/' . $xray->filename) }}" style="width: 100vw; height: 100vh;"></div>

    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Ensure compatibility with your Bootstrap version -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Importmap setup for Three.js VR -->
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.135.0/build/three.module.js",
                "three/examples/jsm/controls/OrbitControls.js": "https://unpkg.com/three@0.135.0/examples/jsm/controls/OrbitControls.js",
                "three/examples/jsm/webxr/VRButton.js": "https://unpkg.com/three@0.135.0/examples/jsm/webxr/VRButton.js"
            }
        }
    </script>

    <!-- Main Three.js VR script -->
    <script type="module" src="{{ asset('js/main.js') }}"></script>

    <!-- Check if jQuery is loaded -->
    <script>
        if (typeof jQuery === 'undefined') {
            console.error('jQuery is not loaded');
        } else {
            console.log('jQuery is loaded');
        }
    </script>
</body>
</html>
