@extends('admin1.main')
@section('main-section')

<h1 class="mt-4 mb-3">All Service Packages</h1>

<div class="container-fluid mb-3">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">

        <!-- Search Form -->
        <form action="" method="GET" class="d-flex flex-grow-1">
            <input type="search" id="searchInput" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search Packages...">
            <button class="btn btn-primary me-2" type="submit">Search</button>
            <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
        </form>

        <div>
            <a href="{{ url('addnewservice') }}" class="btn btn-success me-2">Add New Package</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive"> 
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Package Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Service</th>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($packages) && $packages->count() > 0)
                        @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>
                                <td>{{ $package->package_name }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $package->images) }}" alt="Package Image" class="img-thumbnail" style="height:80px; width:80px; object-fit:cover;">
                                </td>
                                <td style="max-width:250px; white-space: pre-line;">{{ $package->description }}</td>
                                <td class="text-success fw-bold">₹{{ number_format($package->price, 2) }}</td>
                                <td>{{ $package->service->service_name }}</td>
                                <td>{{ $package->category }}</td>
                                <td class="text-center d-flex justify-content-center gap-2">
                                    <a href="{{ route('edit.package', ['id' => $package->id]) }}" class="btn btn-warning btn-sm">
    <i class="bi bi-pencil"></i> Update
</a>

                                    <a href="{{ route('userdel2', ['id'=>$package->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No packages found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> 
    </div>
</div>

@endsection
