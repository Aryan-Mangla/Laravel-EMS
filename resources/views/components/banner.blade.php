<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
        @foreach($banners as $key => $banner)
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $key }}" class="@if($key == 0) active @endif" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($banners as $key => $banner)
            <div class="carousel-item @if($key == 0) active @endif">
            <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100 banner-h" alt="{{ basename($banner->image) }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
