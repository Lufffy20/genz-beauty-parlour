@extends('admin1.main')
@section('main-section')

<h1 class="mt-4">All Appointments</h1>

<div class="container-fluid mt-4 mb-2">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <form action="" method="GET" class="d-flex flex-grow-1">
            <input type="search" value="{{ request('search') }}" name="search" class="form-control me-2" placeholder="Search name and email">
            <button class="btn btn-primary me-2" type="submit">Search</button>
            <a href="{{ url()->current() }}" class="btn btn-secondary">Reset</a>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Package Name</th>
                        <th>Specialist</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Payment ID</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allPackages as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->email }}</td>
                            <td>{{ $service->phonenumber }}</td>
                            <td>{{ $service->gender }}</td>

                            {{-- Package Names --}}
                            <td>
                                @php
                                    $packageIds = explode(',', $service->package_id);
                                    $packageNames = \App\Models\Package1::whereIn('id', $packageIds)->pluck('package_name')->toArray();
                                @endphp
                                {{ implode(', ', $packageNames) }}
                            </td>

                            {{-- Specialist Names --}}
                            <td>
                                @php
                                    $specialistIds = explode(',', $service->specialist);
                                    $specialistNames = \App\Models\Specialist::whereIn('id', $specialistIds)->pluck('name')->toArray();
                                @endphp
                                {{ implode(', ', $specialistNames) }}
                            </td>

                            <td>{{ $service->time }}</td>
                            <td>{{ $service->date }}</td>
                            <td>{{ $service->message }}</td>
                            <td>{{ $service->payment_id ?? 'Not Paid' }}</td>

                            {{-- Status Badge --}}
                            <td>
                                @switch($service->status)
                                    @case('Approved')
                                        <span class="badge bg-success">{{ $service->status }}</span>
                                        @break
                                    @case('Done')
                                        <span class="badge bg-primary">{{ $service->status }}</span>
                                        @break
                                    @case('Pending')
                                        <span class="badge bg-warning text-dark">{{ $service->status }}</span>
                                        @break
                                    @case('Cancelled')
                                        <span class="badge bg-danger">{{ $service->status }}</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ $service->status }}</span>
                                @endswitch
                            </td>

                            <td>{{ \Carbon\Carbon::parse($service->created_at)->format('d-M-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($service->updated_at)->format('d-M-Y') }}</td>

                            {{-- Action Buttons --}}
                            <td class="d-flex flex-wrap gap-1">
                                <a href="{{ route('userapprove1', $service->id) }}" class="btn btn-success btn-sm">Approve</a>
                                <a href="{{ route('userdone1', $service->id) }}" class="btn btn-info btn-sm">Done</a>
                                <a href="{{ route('usercancel1', $service->id) }}" class="btn btn-secondary btn-sm">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                {{ $allPackages->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
