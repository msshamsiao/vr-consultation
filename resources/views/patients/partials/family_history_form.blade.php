<div class="mb-3">
    <label for="family_history_heart_disease_father">Heart Disease (Father)</label>
    <input type="checkbox" id="family_history_heart_disease_father" name="family_history_heart_disease_father" {{ $familyHistory->is_heart_disease_father ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_heart_disease_mother">Heart Disease (Mother)</label>
    <input type="checkbox" id="family_history_heart_disease_mother" name="family_history_heart_disease_mother" {{ $familyHistory->is_heart_disease_mother ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_diabetes_father">Diabetes (Father)</label>
    <input type="checkbox" id="family_history_diabetes_father" name="family_history_diabetes_father" {{ $familyHistory->is_diabetes_father ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_diabetes_mother">Diabetes (Mother)</label>
    <input type="checkbox" id="family_history_diabetes_mother" name="family_history_diabetes_mother" {{ $familyHistory->is_diabetes_mother ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_cancer_father">Cancer (Father)</label>
    <input type="checkbox" id="family_history_cancer_father" name="family_history_cancer_father" {{ $familyHistory->is_cancer_father ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_cancer_mother">Cancer (Mother)</label>
    <input type="checkbox" id="family_history_cancer_mother" name="family_history_cancer_mother" {{ $familyHistory->is_cancer_mother ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_hypertension_father">Hypertension (Father)</label>
    <input type="checkbox" id="family_history_hypertension_father" name="family_history_hypertension_father" {{ $familyHistory->is_hypertension_father ? 'checked' : '' }}>
</div>
<div class="mb-3">
    <label for="family_history_hypertension_mother">Hypertension (Mother)</label>
    <input type="checkbox" id="family_history_hypertension_mother" name="family_history_hypertension_mother" {{ $familyHistory->is_hypertension_mother ? 'checked' : '' }}>
</div>
