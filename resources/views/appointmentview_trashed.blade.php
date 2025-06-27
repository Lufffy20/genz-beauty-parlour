@extends('admin1.main')
@section('main-section')


   
<h1 class="mt-4">User Management</h1>

<div class="container-fluid mt-4 mb-2">
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
   
    <form action="" method="GET" class="d-flex flex-grow-1">
        <input type="search" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search name and email">
        <button class="btn btn-primary me-2" type="submit">Search</button>
        <a href="" class="btn btn-secondary">Reset</a>
    </form>

        <div>
            <a href="" class="btn btn-success me-2">Add Contact</a>
            <a href="{{url('appointmentview')}}" class="btn btn-danger">Go To view</a>
        </div>
    </div>
</div>

        <!-- Table -->
        <div class="card" style="max-width: 100%;">
        <div class="card-body">
        <div class="table-responsive"> 
        <table class="table table-bordered table-hover">
        <thead>
                        <tr>
                            <th>appointment ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phonenumber</th>
                            <th>gender</th>
                            <th>select</th>
                            <th>subservice</th>
                            <th>time</th>
                            <th>date</th>
                            <th>message</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->appointment_id}}</td>
                            <td>{{$appointment->name}}</td>
                            <td>{{$appointment->email}}</td>
                            <td>{{$appointment->phonenumber}}</td>
                            <td>{{$appointment->gender}}</td>
                            <td>{{$appointment->select}}</td>
                            <td>{{$appointment->subservice}}</td>
                            <td>{{$appointment->time}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->message}}</td>
                            <td>{{$appointment->status}}</td>
                            <td>{{date_format($appointment->created_at,'d-M-Y')}}</td>
                            <td>{{date_format($appointment->updated_at,'d-M-Y')}}</td>
                            
                            <td class="action-buttons">
                                <a href="{{route('userforcedel',['id'=>$appointment->appointment_id])}}" class="btn btn-danger">Delete</a>
                                <a href="{{route('userrestore',['id'=>$appointment->appointment_id])}}" class="btn btn-warning">Restore</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @if ($appointments instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $appointments->links('pagination::bootstrap-4') }} <!-- ✅ Ensure pagination works -->
        </div>
    </div>
@endif


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection