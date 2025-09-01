@extends('admin1.main')
@section('main-section')

<div class="container">
    <h2 class="mb-4 text-primary text-center fw-bold">Edit Specialist</h2>
    <div class="card p-4 shadow-sm">

        <form action="{{ route('specialist.update', $specialist->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST') <!-- Keep POST for update route as per your controller -->

            <div class="row g-4">

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" class="form-control" 
                               value="{{ old('name', $specialist->name) }}" required>
                    </div>
                </div>

                <!-- Specialization -->
                <div class="col-md-6">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" class="form-control" 
                           value="{{ old('specialization', $specialist->specialization) }}" required>
                </div>

                <!-- Experience -->
                <div class="col-md-6">
                    <label class="form-label">Experience (Years)</label>
                    <input type="number" name="experience" class="form-control" 
                           value="{{ old('experience', $specialist->experience) }}" required>
                </div>

                <!-- Service Selection -->
                <div class="col-md-6">
                    <label class="form-label">Service</label>
                    <select name="service_id" class="form-select" required>
                        <option value="" disabled>-- Select Service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" 
                                {{ $specialist->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->service_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image Upload -->
                <div class="col-md-6">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Current Image Preview -->
                @if($specialist->image)
                    <div class="col-md-6 text-center mt-2">
                        <label class="form-label">Current Image</label>
                        <img src="{{ asset('images/' . $specialist->image) }}" alt="Specialist Image" class="img-preview" 
                             style="max-width:150px; border-radius:10px;">
                    </div>
                @endif

                <!-- Social Links -->
                <div class="col-md-4">
                    <label class="form-label">Instagram</label>
                    <input type="url" name="instagram" class="form-control" 
                           value="{{ old('instagram', $specialist->instagram) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">WhatsApp</label>
                    <input type="url" name="whatsapp" class="form-control" 
                           value="{{ old('whatsapp', $specialist->whatsapp) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Twitter</label>
                    <input type="url" name="twitter" class="form-control" 
                           value="{{ old('twitter', $specialist->twitter) }}">
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-success px-4">Update Specialist</button>
                    <a href="{{ route('addspecialistshow.page') }}" class="btn btn-secondary px-4">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
