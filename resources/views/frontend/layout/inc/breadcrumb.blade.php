<div class="breadcrumb-section"
style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url({{ asset('assets/frontend') }}/img/innerpage/inner-banner-bg.png);">
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
            <div class="banner-content">
                <h1>{{ $page_heading }}</h1>
                <ul class="breadcrumb-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    @if ($parent_page_name)
                    <li><a href="{{ $parent_page_link }}">{{ $parent_page_name }}</a></li>
                    @endif
                    <li>{{ $page_name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
