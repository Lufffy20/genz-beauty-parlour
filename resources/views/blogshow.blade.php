@extends('admin.main')
@section('main-section')

<div class="container py-4">
   <h2 class="mb-4 fw-bold">All Blog Posts</h2>

   @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
   @endif

   <a href="{{ route('addblog') }}" class="btn btn-primary mb-3">+ Add New Blog</a>

   <table class="table table-bordered table-hover">
      <thead class="table-warning">
         <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>description</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @forelse($blogs as $index => $blog)
         <tr>
            <td>{{ $index + 1 }}</td>
            <td><img src="{{ asset('storage/' . $blog->image) }}" width="80" height="50" style="object-fit: cover;" alt=""></td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author }}</td>
            <td>{{ $blog->description }}</td>
            <td>{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</td>
            <td>
               <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>

               <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
               </form>
            </td>
         </tr>
         @empty
         <tr>
            <td colspan="6" class="text-center">No blogs available.</td>
         </tr>
         @endforelse
      </tbody>
   </table>
</div>
@endsection
