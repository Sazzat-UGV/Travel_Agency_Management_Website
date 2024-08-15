@extends('frontend.layout.master')
@section('title')
    Blog
@endsection
@push('frontend_style')
@endpush
@section('content')
    @include('frontend.layout.inc.breadcrumb', [
        'page_name' => 'Blog',
    ])
    <div class="blod-grid-section pt-120 mb-120">
        <div class="container">
            <div class="row g-md-4 gy-5 mb-70">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-card-img-wrap">
                                <a href="{{ route('blog_details',$blog->slug) }}" class="card-img"><img
                                        src="{{ asset('uploads/blog') }}/{{ $blog->photo }}" alt="Blog Photo"></a>
                                <a href="blog-grid.html" class="date">
                                    <span><strong>{{ $blog->created_at->format('d') }}</strong> <br>
                                        {{ $blog->created_at->format('F') }}</span>
                                </a>
                            </div>
                            <div class="blog-card-content">
                                <h5><a href="{{ route('blog_details',$blog->slug) }}">{{ $blog->title }}</a></h5>
                                <p class="text-black">{{ Str::words($blog->short_description, 100, '...') }}</p>
                                <div class="bottom-area">
                                    <a href="{{ route('blog_details',$blog->slug) }}">View Post
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12"
                                                viewBox="0 0 14 12" fill="none">
                                                <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                                                <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105"
                                                    stroke-linecap="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <nav class="inner-pagination-area">
                        {{ $blogs->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend_script')
@endpush
