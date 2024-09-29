@extends('layouts.app')
<x-nav-bar />

@section('content')
<div class="container-fluid">
  

    
    <div id="eventImageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($event->images as $index => $image)
            <button type="button" data-bs-target="#eventImageCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner my-5">
        @foreach($event->images as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset('images/events/'. $image->image_path) }}" class="d-block w-100 img-fluid mh-flyer" alt="Event Image {{ $index + 1 }}">

            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#eventImageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#eventImageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


</div>
<div class="container">
<h2>{{ $event->title }}</h2>
<p>{{ $event->description }}</p>
</div>
@endsection
