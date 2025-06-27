<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup List</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            font-size: 0.9rem;
            padding: 8px 12px;
        }

        .search-bar input {
            max-width: 300px;
        }

        .action-buttons a {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">User Management</a>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Search Bar -->
        <form action="" method="GET" class="d-flex mb-4 search-bar">
        <input type="search" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search name and email">
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="" class="btn btn-secondary ms-2">Reset</a>
        </form>

        <!-- Buttons -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="" class="btn btn-success me-2">Add Contact</a>
            <a href="{{url('userview')}}" class="btn btn-danger">Go To userview</a>
        </div>

        <!-- Table -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Signup ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($signups as $signup)
                        <tr>
                            <td>{{$signup->signup_id}}</td>
                            <td>{{$signup->name}}</td>
                            <td>{{$signup->email}}</td>
                            <td>{{date_format($signup->created_at,'d-M-Y')}}</td>
                            <td>{{date_format($signup->updated_at,'d-M-Y')}}</td>
                            <td class="action-buttons">
                                <a href="{{ route('userforcedel', ['id' => $signup->signup_id]) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('userrestore', ['id' => $signup->signup_id]) }}" class="btn btn-warning">Restore</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
