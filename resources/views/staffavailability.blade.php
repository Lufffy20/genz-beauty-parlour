@extends('admin1.main')
@section('main-section')

<h1 class="mt-4">All Specialists</h1>

<div class="container-fluid mt-4 mb-2">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
       
        <form action="" method="GET" class="d-flex flex-grow-1">
            <input type="search" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search name and email">
            <button class="btn btn-primary me-2" type="submit">Search</button>
            <a href="" class="btn btn-secondary">Reset</a>
        </form>

        <div>
            <a href="" class="btn btn-success me-2">Add Contact</a>
            <a href="" class="btn btn-danger">Go To Trash</a>
        </div>
    </div>
</div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialization</th>
                            <th>Experience (Years)</th>
                            <th>Image</th>
                            <th>Social Links</th>
                            <th>Status</th> 
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialists as $specialist)
                        <tr>
                            <td class="fw-bold text-primary">{{ $specialist->id }}</td>
                            <td class="fw-bold text-primary">{{ $specialist->name }}</td>
                            <td class="text-muted">{{ $specialist->specialization }}</td>
                            <td class="text-success fw-bold">{{ $specialist->experience }}</td>
                            <td>
                                @if($specialist->image)
                                    <img src="{{ asset('images/' . $specialist->image) }}" alt="{{ $specialist->name }}" class="img-thumbnail shadow" style="height: 80px; width: 80px; object-fit: cover;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($specialist->instagram)
                                    <a href="{{ $specialist->instagram }}" target="_blank">Instagram</a>
                                @endif
                                @if($specialist->whatsapp)
                                    | <a href="https://wa.me/{{ $specialist->whatsapp }}" target="_blank">WhatsApp</a>
                                @endif
                                @if($specialist->twitter)
                                    | <a href="{{ $specialist->twitter }}" target="_blank">Twitter</a>
                                @endif

                                <td class="text-success fw-bold">{{ $specialist->status }}</td>
                            </td>
                            <td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('specialist.edit', $specialist->id) }}" class="btn btn-warning btn-sm">
            <i class="bi bi-pencil"></i> Edit
        </a>
        
        <form action="{{ route('specialist.delete', $specialist->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>

        <!-- Toggle Status Form -->
        <form action="{{ route('specialist.toggleStatus', $specialist->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-sm {{ $specialist->status ? 'btn-success' : 'btn-secondary' }}">
                {{ $specialist->status ? 'Available' : 'Unavailable' }}
            </button>
        </form>
    </div>
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
@endsection