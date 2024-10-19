<div class="mb-3">
    <label for="medication_name">Medication Name <span class="text-danger">*</span></label>
    <textarea class="form-control" id="medication_name" name="medication_name">{{ old('medication_name', $medicationHistory->medication_name) }}</textarea>
</div>
<div class="mb-3">
    <label for="dosage">Dosage <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="dosage" name="dosage" value="{{ old('dosage', $medicationHistory->dosage) }}">
</div>
<div class="mb-3">
    <label for="frequency">Frequency <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="frequency" name="frequency" value="{{ old('frequency', $medicationHistory->frequency) }}">
</div>
<div class="mb-3">
    <label for="start_on">Start On <span class="text-danger">*</span></label>
    <input type="date" class="form-control" id="start_on" name="start_on" value="{{ \Carbon\Carbon::parse($medicationHistory->start_on)->format('Y-m-d') }}">
</div>
<div class="mb-3">
    <label for="stopped_on">Stopped On <span class="text-danger">*</span></label>
    <input type="date" class="form-control" id="stopped_on" name="stopped_on" value="{{  \Carbon\Carbon::parse($medicationHistory->stopped_on)->format('Y-m-d') }}">
</div>
<div class="mb-3">
    <label for="notes">Notes <span class="text-danger">*</span></label>
    <textarea class="form-control" id="notes" name="notes">{{ old('notes', $medicationHistory->notes) }}</textarea>
</div>