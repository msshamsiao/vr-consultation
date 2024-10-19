<form action="{{ route('xrays.upload', ['patientId' => $patient->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="xray_file">Upload X-ray File:</label>
        <input type="file" class="form-control-file" id="xray_file" name="xray_file" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
