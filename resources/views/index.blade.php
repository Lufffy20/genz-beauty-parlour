
<div class="container">
    <h2>About Section</h2>
    <a href="{{ route('admin.about.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abouts as $about)
            <tr>
                <td>{{ $about->title }}</td>
                <td><img src="{{ asset('storage/'.$about->image) }}" width="100"></td>
                <td>
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

