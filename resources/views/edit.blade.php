@extends('admin1.main')
@section('main-section')

<h1 class="mt-4">Edit Booking</h1>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('updateStatus2', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $booking->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $booking->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ $booking->phonenumber }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender">
                <option value="Male" {{ $booking->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $booking->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $booking->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Packages</label>
            <select class="form-select" name="package_id[]" multiple>
                @foreach(\App\Models\Package1::all() as $package)
                    <option value="{{ $package->id }}" {{ in_array($package->id, explode(',', $booking->package_id)) ? 'selected' : '' }}>
                        {{ $package->package_name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple packages</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Specialists</label>
            <select class="form-select" name="specialist[]" multiple>
                @foreach(\App\Models\Specialist::all() as $spec)
                    <option value="{{ $spec->id }}" {{ in_array($spec->id, explode(',', $booking->specialist)) ? 'selected' : '' }}>
                        {{ $spec->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple specialists</small>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $booking->date }}" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $booking->time }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3">{{ $booking->message }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Done" {{ $booking->status == 'Done' ? 'selected' : '' }}>Done</option>
                <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Booking</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
