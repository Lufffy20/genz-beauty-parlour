@extends('admin1.main')
@section('main-section')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($package) ? 'Edit Service Package' : 'Add Service Package' }}</title>
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
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .img-preview {
            max-width: 150px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4 text-primary text-center fw-bold">
        {{ isset($package) ? 'Edit Service Package' : 'Add Service Package' }}
    </h2>
    <div class="card">
        <form action="{{ isset($package) ? route('update.package', ['id' => $package->id]) : route('store4.page') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($package))
                @method('PUT')
            @endif
            <div class="row g-4">

                <!-- Package Name -->
                <div class="col-md-6">
                    <label class="form-label">Package Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-box"></i></span>
                        <input type="text" name="package_name" class="form-control" 
                               placeholder="Enter Package Name"
                               value="{{ old('package_name', $package->package_name ?? '') }}" required>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" 
                              placeholder="Enter Description" required>{{ old('description', $package->description ?? '') }}</textarea>
                </div>

                <!-- Price -->
                <div class="col-md-6">
                    <label class="form-label">Price (₹)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                        <input type="number" name="price" class="form-control" step="0.01" 
                               placeholder="Enter Price" value="{{ old('price', $package->price ?? '') }}" required>
                    </div>
                </div>

                <!-- Service Dropdown -->
                <div class="col-md-6">
                    <label class="form-label">Select Service</label>
                    <select name="service_id" class="form-select" required>
                        <option value="" disabled {{ !isset($package) ? 'selected' : '' }}>-- Select Service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" 
                                {{ old('service_id', $package->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                {{ $service->service_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Category Dropdown -->
                <div class="col-md-6">
                    <label class="form-label">Select Category</label>
                    <select name="category" class="form-select" required>
                        <option value="" disabled {{ !isset($package) ? 'selected' : '' }}>-- Select Category --</option>
                        <option value="male" {{ old('category', $package->category ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('category', $package->category ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="kid" {{ old('category', $package->category ?? '') == 'kid' ? 'selected' : '' }}>Kid</option>
                    </select>
                </div>

                <!-- Image Upload -->
                <div class="col-md-6">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="images" class="form-control">
                </div>

                <!-- Current Image Preview -->
                @if(isset($package->images))
                    <div class="col-md-6 text-center mt-2">
                        <label class="form-label">Current Image</label>
                        <img src="{{ asset('images/' . $package->images) }}" alt="Package Image" class="img-preview">
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-success px-4">
                        {{ isset($package) ? 'Update Package' : 'Add Package' }}
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
</body>
</html>

@endsection
