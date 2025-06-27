@extends('admin1.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Specialists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }
        .header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .table-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background: #007bff;
            color: white;
            padding: 12px;
        }
        .table tbody tr:hover {
            background: #f1f3f8;
            transition: 0.3s ease-in-out;
        }
        .img-thumbnail {
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .img-thumbnail:hover {
            transform: scale(1.1);
        }
        .btn-sm {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <div class="header">
            <h2 class="fw-bold">All Specialists</h2>
        </div>

        <div class="table-container">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('specialist.add') }}" class="btn btn-primary shadow-sm px-3 py-2">
                    <i class="bi bi-plus-circle"></i> Add Specialist
                </a>
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