@extends('../layout/layout')
@section('body')
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center text-primary">Profile Information</h1>
        <div class="w-75 bg-black px-5 py-4 rounded-4">
            <h3>Update Your Information</h3>
            <form action="{{ route('updateProfile', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Information</button>
            </form>

        </div>
    </div>
    <div class="container p-3 w-75 my-5 bg-black rounded-4">
        <div class="container mt-4">
            <h2 class="text-start text-light">Address Details</h2>

            @forelse ($user->address as $address)
                <div class="card gap-2 shadow-sm mb-4 bg-black text-light">
                    <div class="card-body bg-dark border d-flex flex-wrap rounded-3">
                        <h5 class="card-title text-primary">Address Type: {{ $address->address_type }}</h5>

                        <p class="card-text mb-2 mx-2">
                            <strong>State:</strong> {{ $address->state }}
                        </p>
                        <p class="card-text mb-2 mx-2">
                            <strong>Zone:</strong> {{ $address->zone }}
                        </p>
                        <p class="card-text mb-2 mx-2">
                            <strong>City:</strong> {{ $address->city }}
                        </p>

                        @if ($address->address)
                            <p class="card-text mb-2 mx-2">
                                <strong>Address:</strong> {{ $address->address }}
                            </p>
                        @endif

                        <p class="card-text mb-2 mx-2">
                            <strong>Phone Number:</strong> {{ $address->phone_no }}
                        </p>

                        @if ($address->landmark)
                            <p class="card-text mb-2 mx-2">
                                <strong>Landmark:</strong> {{ $address->landmark }}
                            </p>
                        @endif

                        @if ($address->description)
                            <p class="card-text mb-2 mx-2">
                                <strong>Description:</strong> {{ $address->description }}
                            </p>
                        @endif

                        <div class="ms-auto">
                            <a href="{{ route('updateAddress', $address->id) }}"
                                class="btn btn-sm btn-primary mx-2">Edit</a>
                            <form action="{{ route('deleteAddress', $address->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card-body bg-dark border text-light text-center">
                    <h5 class="card-title">No address found</h5>
                </div>
            @endforelse

            <div class="text-end mt-3">
                <a href="{{ route('addAddress') }}" class="btn btn-sm btn-success">Add New Address</a>
            </div>
        </div>
    </div>

<div class=" w-75 container my-5 bg-black rounded-4 p-4">
    <h3>Delete Your Profile</h3>

    {{-- <form action="" method="POST" --}}
<form action="{{ route('deleteProfile', $user->id) }}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete your profile? This action is irreversible.');">
    @csrf
    @method('DELETE')

    <div class="alert alert-warning">
        <strong>Warning!</strong> Deleting your profile is permanent and cannot be undone.
    </div>

    <button type="submit" class="btn btn-danger">Delete Profile</button>
</form>
</div>
@endsection

