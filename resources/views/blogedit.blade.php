@extends('admin.main')
@section('main-section')

<div class="container py-4">
   <h2 class="mb-4 fw-bold">Edit Blog</h2>

   @if ($errors->any())
      <div class="alert alert-danger">
         <ul class="mb-0">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
         <label for="title" class="form-label">Title</label>
         <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
      </div>

      <div class="mb-3">
         <label for="author" class="form-label">Author</label>
         <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author) }}" required>
      </div>

      <div class="mb-3">
         <label for="date" class="form-label">Date</label>
         <input type="date" name="date" class="form-control" value="{{ old('date', $blog->date) }}" required>
      </div>

      <div class="mb-3">
         <label for="description" class="form-label">Description</label>
         <textarea name="description" class="form-control" rows="5" required>{{ old('description', $blog->description) }}</textarea>
      </div>

      <div class="mb-3">
         <label for="image" class="form-label">Image</label>
         <input type="file" name="image" class="form-control">
         @if ($blog->image)
            <div class="mt-2">
               <img src="{{ asset('storage/' . $blog->image) }}" width="150" height="100" style="object-fit: cover;" alt="Current Image">
            </div>
         @endif
      </div>

      <button type="submit" class="btn btn-success">Update Blog</button>
      <a href="{{ route('blogshow') }}" class="btn btn-secondary">Back</a>
   </form>
</div>

@endsection
