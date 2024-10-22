@extends('layouts.app')

@section('content')
<x-nav-bar />
<div class="container-fluid">
    @include('components.banner', ['banners' => App\Models\Banner::all()])
    <div class="container mt-5">
        <h2 class="fw-bold mb-3">Upcoming <span class="theme-text "> Events</span></h2>
        @php
            $events = App\Models\Event::where('active', 1)->take(6)->get();
        @endphp

        @if($events->isNotEmpty())
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-4 mb-3">
                    <div class="rotating-border">
                    <div class="card event-card">
                        <!-- Event Image -->
                        <img src="{{ asset('images/events/' . ($event->images->first()->image_path ?? 'default-image.png')) }}" class="card-img-top" alt="Event Image">

                        <!-- Card Body -->
                        <div class="card-body">
                            <!-- Event Title -->
                            <h5 class="card-title">{{ $event->title }}</h5>

                            <!-- Event Description -->
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>

                            <!-- Event Start and End Times -->
                            <div class="d-flex justify-content-between">
                                <p class="card-text"><span class="theme-text">Start at:</span> {{ \Carbon\Carbon::parse($event->event_start_time)->format('d-m-Y') }}</p>
                                <p class="card-text"><span class="theme-text">End at:</span> {{ \Carbon\Carbon::parse($event->event_end_time)->format('d-m-Y') }}</p>
                            </div>

                            <!-- Event Department -->
                            <p class="card-text"><span class="theme-text">Department: </span>{{ $event->department }}</p>

                            <!-- View Details Button -->
                            <a href="{{ route('public.events.show', $event->id) }}" class="btn btn-primary">View Details</a>
                        </div>
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
