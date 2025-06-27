@include('layout.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center fw-bold">Edit Profile</div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control rounded-3" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 rounded-3">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')