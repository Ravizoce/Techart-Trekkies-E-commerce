@extends('../layout/layout')
@section('body')
    <div class="container mt-4 p-3 bg-black w-75 p-5 rounded-5">
        <h1 class="text-center text-primary">Profile Information</h1>
        <h2 class="text-start">Address Form</h2>
        <form action="{{route("addressstore")}}" method="POST" class="p-4 border rounded shadow-sm ">
            @csrf
            <div class="mb-3">
                <label for="addressType" class="form-label">Address Type</label>
                <select id="addressType" name="address_type" class="form-select" required>
                    <option value="" disabled {{ old('address_type', $address->address_type ?? '') === '' ? 'selected' : '' }}>Select Address Type</option>
                    <option value="home" {{ old('address_type', $address->address_type ?? '') === 'home' ? 'selected' : '' }}>Home</option>
                    <option value="work" {{ old('address_type', $address->address_type ?? '') === 'work' ? 'selected' : '' }}>Work</option>
                    <option value="other" {{ old('address_type', $address->address_type ?? '') === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            

            <div class="mb-3">
                <label for="phoneNo" class="form-label">Phone Number</label>
                <input type="tel" id="phoneNo" name="phone_no" class="form-control"
                    value="{{ old('phone_no', $address->phone_no ?? '') }}" placeholder="Enter Phone Number" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="state" class="form-control"
                    value="{{ old('state', $address->state ?? '') }}" placeholder="Enter State" required>
            </div>

            <div class="mb-3">
                <label for="zone" class="form-label">Zone</label>
                <input type="text" id="zone" name="zone" class="form-control"
                    value="{{ old('zone', $address->zone ?? '') }}" placeholder="Enter Zone" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="city" class="form-control"
                    value="{{ old('city', $address->city ?? '') }}" placeholder="Enter City" required>
            </div>

            <div class="mb-3">
                <label for="landmark" class="form-label">Landmark</label>
                <input type="text" id="landmark" name="landmark" class="form-control"
                    value="{{ old('landmark', $address->landmark ?? '') }}" placeholder="Enter Landmark">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4">Save Address</button>
            </div>
        </form>
    </div>
@endsection
