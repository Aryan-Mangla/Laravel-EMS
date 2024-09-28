@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $event->title }}</h2>
    <p>{{ $event->description }}</p>

    <!-- Accordion for Images -->
    <div class="accordion" id="eventImageAccordion">
        @foreach($event->images as $index => $image)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                        Image {{ $index + 1 }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#eventImageAccordion">
                    <div class="accordion-body">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Event Image {{ $index + 1 }}" class="img-fluid">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
