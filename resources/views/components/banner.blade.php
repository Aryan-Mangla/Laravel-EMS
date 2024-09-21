<div id="bannerCarousel" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden">
        @foreach($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-full h-auto" alt="{{ basename($banner->image) }}">
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
