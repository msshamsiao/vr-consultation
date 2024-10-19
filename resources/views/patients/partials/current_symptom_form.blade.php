<div class="mb-3">
    <label for="symptoms">Symptoms <span class="text-danger">*</span></label>
    <textarea class="form-control" id="symptoms" name="symptoms">{{ old('symptoms', $currentSymptom->symptoms) }}</textarea>
</div>
<div class="mb-3">
    <label for="treatment">Duration <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $currentSymptom->duration) }}">
</div>
<div class="mb-3">
    <label for="severity" class="form-label">Severity <span class="text-danger">*</span></label>
    <select class="form-control" id="severity" name="severity">
        <option value="" disabled>Choose Severity</option>
        <option value="mild" {{ old('severity', $currentSymptom->severity) == 'mild' ? 'selected' : '' }}>Mild</option>
        <option value="moderate" {{ old('severity', $currentSymptom->moderate) == 'moderate' ? 'selected' : '' }}>Moderate</option>
        <option value="severe" {{ old('severity', $currentSymptom->severe) == 'severe' ? 'selected' : '' }}>Severe</option>
    </select>
</div>
<div class="mb-3">
    <label for="alleviating_factors" class="form-label">Alleviating Factors <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="alleviating_factors" name="alleviating_factors" value="{{ old('alleviating_factors', $currentSymptom->alleviating_factors) }}">
</div>
<div class="mb-3">
    <label for="worsening_factors" class="form-label">Worsening Factors <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="worsening_factors" name="worsening_factors" value="{{ old('worsening_factors', $currentSymptom->worsening_factors) }}">
</div>
<div class="mb-3">
    <label for="onset_date" class="form-label">Onset Date <span class="text-danger">*</span></label>
    <input type="date" class="form-control" id="onset_date" name="onset_date"  value="{{ \Carbon\Carbon::parse($currentSymptom->onset_date)->format('Y-m-d') }}">
</div>