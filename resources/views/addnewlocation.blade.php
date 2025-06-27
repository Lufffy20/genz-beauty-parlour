@extends('admin1.main')
@section('main-section')
<div class="container mt-5">
    <h2>Add New Location</h2>
    
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

    <form action="{{ route('store10') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="branch_name" class="form-label">Branch Name</label>
            <input type="text" class="form-control" name="branch_name" required>
        </div>

        <div class="mb-3">
            <label for="parlour_name" class="form-label">Parlour Name</label>
            <input type="text" class="form-control" name="parlour_name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" name="latitude" required>
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" name="longitude" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Location Image</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success">Add Location</button>
        <a href="{{ route('addnewlocation') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
