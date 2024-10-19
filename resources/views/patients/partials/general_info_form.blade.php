<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="first_name">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $patient->first_name) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="last_name">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $patient->last_name) }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('Y-m-d') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="gender">Gender <span class="text-danger">*</span></label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="" disabled>Choose Gender</option>
                <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $patient->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Email <span class="text-info">(Optional)</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $patient->email) }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="phone">Phone <span class="text-info">(Optional)</span></label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}">
        </div>
    </div>
</div>
<br/>
<fieldset>
    Address (Optional)
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="address" value="{{ old('address', $patient->address) }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $patient->city) }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $patient->state) }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $patient->country) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code', $patient->zip_code) }}">
            </div>
        </div>
    </div>
</fieldset>
