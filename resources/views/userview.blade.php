@extends('admin1.main')
@section('main-section')

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
            <a href="{{url('userview/trash')}}" class="btn btn-danger">Go To Trash</a>
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
                                <a href="{{route('userdel',['id'=>$signup->signup_id])}}" class="btn btn-danger">Trash</a>
                                <a href="{{route('useredit',['id'=>$signup->signup_id])}}" class="btn btn-warning">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        {{$signups->links('pagination::bootstrap-4')}}
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection