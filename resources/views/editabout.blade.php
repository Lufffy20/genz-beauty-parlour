
<div class="container">
    <h2>Add About Section</h2>
    <form action="{{ route('admin.about-section.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Why Choose Us (Enter each point separated by a comma)</label>
            <input type="text" name="why_choose_us[]" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
