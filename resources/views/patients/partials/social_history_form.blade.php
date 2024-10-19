<div class="mb-3">
    <label for="smoking_status" class="form-label">Smoking Status <span class="text-danger">*</span></label>
    <select class="form-control" id="smoking_status" name="smoking_status">
        <option value="" disabled selected>Choose Smoking Status</option>
        <option value="never"  {{ old('smoking_status', $socialHistory->smoking_status) == 'never' ? 'selected' : '' }}>Never</option>
        <option value="former"  {{ old('smoking_status', $socialHistory->smoking_status) == 'former' ? 'selected' : '' }}>Former</option>
        <option value="current"  {{ old('smoking_status', $socialHistory->smoking_status) == 'current' ? 'selected' : '' }}>Current</option>
    </select>
</div>
<div class="mb-3">
    <label for="dosage" class="form-label">Alchohol Consumption <span class="text-danger">*</span></label>
    <select class="form-control" id="alcohol_consumption" name="alcohol_consumption">
        <option value="" disabled selected>Choose Alchohol Consumption</option>
        <option value="never" {{ old('alcohol_consumption', $socialHistory->alcohol_consumption) == 'never' ? 'selected' : '' }}>None</option>
        <option value="social" {{ old('alcohol_consumption', $socialHistory->alcohol_consumption) == 'social' ? 'selected' : '' }}>Social</option>
        <option value="moderate" {{ old('alcohol_consumption', $socialHistory->alcohol_consumption) == 'moderate' ? 'selected' : '' }}>Moderate</option>
        <option value="heavy" {{ old('alcohol_consumption', $socialHistory->alcohol_consumption) == 'heavy' ? 'selected' : '' }}>Heavy</option>
    </select>
</div>
<div class="mb-3">
    <label for="exercise_routine" class="form-label">Exercise Routine <span class="text-danger">*</span></label>
    <textarea class="form-control" id="exercise_routine" name="exercise_routine">{{ old('exercise_routine', $socialHistory->exercise_routine) }}</textarea>
</div>
<div class="mb-3">
    <label for="diet_preferences" class="form-label">Diet Preferences <span class="text-danger">*</span></label>
    <textarea class="form-control" id="diet_preferences" name="diet_preferences">{{ old('diet_preferences', $socialHistory->diet_preferences) }}</textarea>
</div>