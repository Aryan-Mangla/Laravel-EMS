@extends('layouts.app')

@section('content')
@include('layouts.navigation')
<div class="container">
    <h2>Your Events</h2>
   

    <div class="row mt-4">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-secondary">View Event</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
