@extends('admin1.main')
@section('main-section')
<div class="container mt-5">
    <h2>All Locations</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('addnewlocation') }}" class="btn btn-primary mb-3">+ Add New Location</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Branch Name</th>
                <th>Parlour Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td><img src="{{ asset('images/' . $location->image) }}" width="80" height="60"></td>
                <td>{{ $location->branch_name }}</td>
                <td>{{ $location->parlour_name }}</td>
                <td>{{ $location->address }}</td>
                <td>{{ $location->phone }}</td>
                <td>{{ $location->latitude }}</td>
                <td>{{ $location->longitude }}</td>
                <td>
                    <a href="{{ route('locationedit', $location->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('locationdestroy1', $location->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this location?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($locations->isEmpty())
                <tr><td colspan="8" class="text-center">No locations added yet.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
