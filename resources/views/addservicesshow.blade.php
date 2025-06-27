@extends('admin1.main')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Service Packages</title>
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
        .search-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .search-bar {
            max-width: 300px;
            border-radius: 20px;
            padding: 8px 15px;
        }
        .search-button {
            background: #007bff;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            color: white;
            transition: 0.3s ease-in-out;
        }
        .search-button:hover {
            background: #0056b3;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
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
            <h2 class="fw-bold">All Service Packages</h2>
        </div>

        <div class="table-container">
            <div class="search-container mb-3">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control search-bar" placeholder="Search Packages...">
                    <button id="searchButton" class="btn search-button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                <a href="addnewservice" class="btn btn-primary shadow-sm px-3 py-2">
                    <i class="bi bi-plus-circle"></i> Add New Package
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="packageTable">
                    <thead>
                        <tr>
                            <th>id</th>
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
                        @php
                            $allPackages = [
                                'Facials & Skincare' => $packages,
                            ];
                        @endphp

                        @foreach ($allPackages as $category => $services)
                            @foreach ($services as $service)
                                <tr>
                                <td class="fw-bold text-primary">{{ $service->id }}</td>
                                    <td class="fw-bold text-primary">{{ $service->package_name }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $service->images) }}"
                                             class="img-thumbnail shadow"
                                             alt="Package Image"
                                             style="height: 80px; width: 80px; object-fit: cover;">
                                    </td>
                                    <td class="text-muted" style="max-width: 250px; white-space: pre-line;">
                                        {{ $service->description }}
                                    </td>
                                    <td class="text-success fw-bold">₹{{ number_format($service->price, 2) }}</td>
                                    <td class="text-primary">{{ $service->service->service_name }}</td>
                                    <td class="text-info fw-bold">{{ $service->category }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('userupdate1',['id'=>$service->id])}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Update</a>
                                                <a href="{{route('userdel1',['id'=>$service->id])}}" class="btn btn-danger">Delete</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
       document.getElementById("searchButton").addEventListener("click", function () {
    let filter = document.getElementById("searchInput").value.toLowerCase().trim();
    let rows = document.querySelectorAll("#packageTable tbody tr");

    rows.forEach(row => {
        let packageName = row.querySelector("td:nth-child(1)").innerText.toLowerCase(); 
        
        row.style.display = packageName.includes(filter) ? "" : "none";
    });
});

    </script>

</body>
</html>
@endsection