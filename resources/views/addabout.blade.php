@extends('admin.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add About Section</title>
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
        <h2 class="mb-4 text-primary text-center fw-bold">Add About Section</h2>
        <div class="card">
            <form action="{{ route('store8') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <!-- Title -->
                    <div class="col-md-12">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                    </div>
                    
                    <!-- Description -->
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter Description" required></textarea>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="col-md-6">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    
                    <!-- Image Preview -->
                    @if(isset($about->image))
                        <div class="col-md-6 text-center">
                            <label class="form-label">Current Image</label>
                            <img src="{{ asset('images/' . $about->image) }}" alt="About Image" class="img-preview">
                        </div>
                    @endif
                    
                    <!-- Submit Button -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success px-4">Add About</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection