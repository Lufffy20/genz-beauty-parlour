@include('admin.sidebar')


<div class="container mt-4">
    <div class="container mt-4">
        <h2 class="mb-3">Welcome to Genz Beauty Parlour Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Service Bookings</h5>
                    <p class="text-muted">Manage and view all bookings</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Admin</h5>
                    <p class="text-muted">Manage Admin profiles</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h5>Reports</h5>
                    <p class="text-muted">View analytics and statistics</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')