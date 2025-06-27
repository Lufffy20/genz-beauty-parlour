@extends('admin1.main')
@section('main-section')
<div class="container mt-5">
    <h2>Edit Location</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some issues with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update1', $location->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="branch_name" class="form-label">Branch Name</label>
            <input type="text" class="form-control" name="branch_name" value="{{ old('branch_name', $location->branch_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="parlour_name" class="form-label">Parlour Name</label>
            <input type="text" class="form-control" name="parlour_name" value="{{ old('parlour_name', $location->parlour_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="2" required>{{ old('address', $location->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $location->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" name="latitude" value="{{ old('latitude', $location->latitude) }}" required>
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" name="longitude" value="{{ old('longitude', $location->longitude) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Location Image (Leave blank to keep current image)</label>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        @if ($location->image)
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                <br>
                <img src="{{ asset('images/' . $location->image) }}" width="150" height="100">
            </div>
        @endif

        <button type="submit" class="btn btn-success">Update Location</button>
        <a href="{{ route('showlocation') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
