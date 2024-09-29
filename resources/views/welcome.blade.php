@extends('layouts.app')

@section('content')
<x-nav-bar />
<div class="container-fluid">
    @include('components.banner', ['banners' => App\Models\Banner::all()])
    <div class="container mt-4">
        <h2>Upcoming Events</h2>
        @php
            $events = App\Models\Event::where('active', 1)->take(6)->get();
        @endphp

        @if($events->isNotEmpty())
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <!-- Event Image -->
                            <img src="{{ asset('images/events/' . ($event->images->first()->image_path ?? 'default-image.png')) }}" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <!-- Event Title -->
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <!-- Event Description (truncated) -->
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <!-- View Details Button -->
                                <a href="{{ route('public.events.show', $event->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No upcoming events available at this time.</p> <!-- Message if no events exist -->
        @endif
    </div>
</div>

@endsection

@section('script')
<script>
     $(document).ready(function() {
        
        @if(session('error'))
            $('#messageModal').modal('show');
        @endif
    });
</script>


@endsection
