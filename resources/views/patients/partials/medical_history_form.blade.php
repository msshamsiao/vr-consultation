<div class="mb-3">
    <label for="condition">Condition <span class="text-danger">*</span></label>
    <textarea class="form-control" id="condition" name="condition">{{ old('condition', $medicalHistory->condition) }}</textarea>
</div>
<div class="mb-3">
    <label for="treatment">Treatment <span class="text-danger">*</span></label>
    <textarea class="form-control" id="treatment" name="treatment">{{ old('treatment', $medicalHistory->treatment) }}</textarea>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="diagnosis_date">Diagnosis Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="diagnosis_date" name="diagnosis_date" value="{{ \Carbon\Carbon::parse($medicalHistory->diagnosis_date)->format('Y-m-d') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="illness" class="form-label">Illness: Have you ever had (Please check all that apply) <span class="text-danger">*</span></label>
            <select class="form-control" id="illness" name="illness[]" multiple="multiple">
                @foreach ([
                    'Anemia', 'Asthma', 'Arthritis', 'Cancer', 'Gout', 'Diabetes', 'Emotional Disorder',
                    'Epilepsy Seizures', 'Fainting Spells', 'Gallstones', 'Heart Disease', 'Heart Attack',
                    'Rheumatic Fever', 'High Blood Pressure', 'Digestive Problems', 'Ulcerative Colitis',
                    'Ulcer Disease', 'Hepatitis', 'Kidney Disease', 'Liver Disease', 'Sleep Apnea',
                    'Use a C-PAP machine', 'Thyroid Problems', 'Tuberculosis', 'Venereal Disease',
                    'Neurological Disorders', 'Bleeding Disorders', 'Lung Disease', 'Emphysema'
                ] as $condition)
                    @php
                        $illnessArray = json_decode($medicalHistory->illness ?? '[]');
                        $selected = is_array($illnessArray) && in_array($condition, $illnessArray);
                    @endphp
                    <option value="{{ $condition }}" {{ $selected ? 'selected' : '' }}>
                        {{ $condition }}
                    </option>
                @endforeach
            </select>                        
        </div>        
    </div>
</div>
<div class="mb-3">
    <label for="treatment">Surgeries <span class="text-danger">*</span></label>
    <textarea class="form-control" id="surgeries" name="surgeries">{{ old('surgeries', $medicalHistory->surgeries) }}</textarea>
</div>
<div class="mb-3">
    <label for="treatment">List all the Allergies <span class="text-danger">*</span></label>
    <textarea class="form-control" id="allergies" name="allergies">{{ old('allergies', $medicalHistory->allergies) }}</textarea>
</div>
