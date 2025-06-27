@extends('admin1.main')
@section('main-section')

<h1 class="mt-4">Completed Appointments</h1>

<div class="container-fluid mt-4 mb-2">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <form action="" method="GET" class="d-flex flex-grow-1">
            <input type="search" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search name and email">
            <button class="btn btn-primary me-2" type="submit">Search</button>
            <a href="" class="btn btn-secondary">Reset</a>
        </form>
    </div>
</div>

<div class="card" style="max-width: 100%;">
    <div class="card-body">
        <div class="table-responsive"> 
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Service</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($appointments) && $appointments->count() > 0)
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phonenumber }}</td>
                                <td>{{ $appointment->gender }}</td>
                                <td>{{ $appointment->subservice }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->message }}</td>
                                <td><span class="badge bg-success">Done</span></td>
                                <td>{{ date_format($appointment->created_at,'d-M-Y') }}</td>
                                <td>{{ date_format($appointment->updated_at,'d-M-Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">No completed appointments found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> 
    </div>
</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        {{ $appointments->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
