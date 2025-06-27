@include('layout.header')

<!-- Beauty Blog Section -->
<section class="py-5" style="background-color: #f5f5f5;">
   <div class="container">
      <div class="text-center mb-5">
         <h2 class="fw-bold">
            MY <span style="color: #fbb200;">BLOG</span>
         </h2>
         <p class="text-muted">
            Discover expert beauty tips, glowing skin secrets, and the latest trends in wellness & self-care.
         </p>
      </div>

      <div class="row g-4">
         @forelse($blogs as $blog)
         <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
               <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
               <div class="card-body">
                  <h5 class="card-title fw-bold fs-3 text-center">{{ $blog->title }}</h5>
                  <p class="text-muted small mb-2 text-center">
                     <i class="fa fa-clock-o me-1 text-warning"></i> {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') }} &nbsp; | &nbsp; <span class="text-secondary">{{ $blog->author }}</span>
                  </p>
                  <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($blog->description, 120) }}</p>
                  <div class="text-center mt-3">
                     <a href="{{ route('blog.detail', $blog->id) }}" class="btn btn-warning text-white fw-semibold py-2 px-5 rounded-pill">Read More</a>
                  </div>
               </div>
            </div>
         </div>
         @empty
         <p class="text-center text-muted">No blog posts available yet.</p>
         @endforelse
      </div>
   </div>
</section>

@include('layout.footer')
