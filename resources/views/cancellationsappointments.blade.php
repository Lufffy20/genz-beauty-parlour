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
            <a href="{{url('appointmentview/trash')}}" class="btn btn-danger">Go To Trash</a>
        </div>
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
                        <th>Select</th>
                        <th>Subservice</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($appointments) && $appointments->count() > 0)
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
                                <td>
                                    @if($appointment->status == 'Approved')
                                        <span class="badge bg-success">{{$appointment->status}}</span>
                                    @elseif($appointment->status == 'Done')
                                        <span class="badge bg-primary">{{$appointment->status}}</span>
                                    @elseif($appointment->status == 'Pending')
                                        <span class="badge bg-warning text-dark">{{$appointment->status}}</span>
                                    @elseif($appointment->status == 'Cancelled')
                                        <span class="badge bg-danger">{{$appointment->status}}</span>
                                    @else
                                        <span class="badge bg-secondary">{{$appointment->status}}</span>
                                    @endif
                                </td>
                                <td>{{date_format($appointment->created_at,'d-M-Y')}}</td>
                                <td>{{date_format($appointment->updated_at,'d-M-Y')}}</td>
                               
                                <td class="action-buttons">
                                    <a href="{{route('userapprove',['id'=>$appointment->appointment_id])}}" class="btn btn-success">Approve</a>
                                    <a href="{{route('userdone',['id'=>$appointment->appointment_id])}}" class="btn btn-info">Done</a>
                                    <a href="{{route('usercancel',['id'=>$appointment->appointment_id])}}" class="btn btn-secondary">Cancel</a>
                                    <a href="{{route('userdel',['id'=>$appointment->appointment_id])}}" class="btn btn-danger">Trash</a>
                                    <a href="{{route('useredit',['id'=>$appointment->appointment_id])}}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">No appointments found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> 
    </div>
</div>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        {{$appointments->links('pagination::bootstrap-4')}}
    </div>
</div>

@endsection
