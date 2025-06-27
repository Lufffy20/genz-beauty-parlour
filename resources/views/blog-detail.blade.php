@include('layout.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                {{-- Image Section --}}
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
               

                <div class="card-body">
                    <h2 class="card-title">{{ $blog->title }}</h2>
                    <p class="text-muted">
                        <strong>Author:</strong> {{ $blog->author }} |
                        <strong>Date:</strong> {{ \Carbon\Carbon::parse($blog->date)->format('d M Y') }}
                    </p>
                    <p class="card-text" style="white-space: pre-wrap;">
                        {{ $blog->description }}
                    </p>
                    <a href="{{ route('blogpage') }}" class="btn btn-secondary">← Back to Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
