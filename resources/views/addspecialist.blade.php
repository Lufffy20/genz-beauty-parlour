@extends('admin1.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Specialist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .card {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
        }
        .input-group-text {
            background-color: #007bff !important;
            border: none;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-primary text-center fw-bold">Add Specialist</h2>
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('specialist.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <!-- Full Name -->
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text text-white"><i class="fas fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Enter Specialist Name" required>
                        </div>
                    </div>
                    
                    <!-- Specialization -->
                    <div class="col-md-6">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" class="form-control" placeholder="E.g. Hair Stylist, Makeup Artist" required>
                    </div>
                    
                    <!-- Experience -->
                    <div class="col-md-6">
                        <label class="form-label">Experience (Years)</label>
                        <input type="number" name="experience" class="form-control" min="1" required>
                    </div>
                    
                    <!-- Service Selection -->
                    <div class="col-md-6">
                        <label class="form-label">Select Service</label>
                        <select name="service_id" class="form-select" required>
                            <option value="" disabled selected>-- Select Service --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="col-md-6">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="col-md-6">
                        <label class="form-label">Instagram Link</label>
                        <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">WhatsApp Link</label>
                        <input type="url" name="whatsapp" class="form-control" placeholder="https://wa.me/">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Twitter Link</label>
                        <input type="url" name="twitter" class="form-control" placeholder="https://twitter.com/">
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success px-4">Add Specialist</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection
