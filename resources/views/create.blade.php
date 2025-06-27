@extends('admin.main')
@section('main-section')
<div class="container mt-5">
    <h2 class="mb-4 text-primary text-center fw-bold">Add About Section</h2>
    <div class="card p-4 shadow-lg rounded">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('store8') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter description" required></textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label class="form-label fw-bold">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- Why Choose Us -->
            <div class="mb-3">
                <label class="form-label fw-bold">Why Choose Us</label>
                <div id="whyChooseUsContainer">
                    <input type="text" name="why_choose_us[]" class="form-control mb-2" placeholder="Enter a reason" required>
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addWhyChooseUs()">Add More</button>
            </div>
            
            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-success px-4">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addWhyChooseUs() {
        let container = document.getElementById('whyChooseUsContainer');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'why_choose_us[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Enter another reason';
        container.appendChild(input);
    }
</script>
@endsection
