@extends('layouts.app')

@section('content')
@include('layouts.navigation')

<div class="row">
    <!-- Banner Management Column -->
    <div class="col-md-12">
        <div class="container mt-5">
            <h1 class="my-4 text-center">Upload Banner Images</h1>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Banner Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3 w-100">Upload</button>
            </form>

            <hr>

            <h2 class="my-4 text-center fs-1">Existing Banners</h2>
            
            @if($banners->count())
                <form action="{{ route('banner.bulkDelete') }}" method="POST" onsubmit="return confirmBulkDelete();">
                    @csrf
                    <div class="row">
                        @foreach($banners as $banner)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/' . $banner->image) }}" class="card-img-top img-thumbnail" alt="{{ basename($banner->image) }}" style="height: 150px; object-fit: cover;">
                                    <div class="card-body text-center">
                                        <p class="card-text">{{ basename($banner->image) }}</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <input type="checkbox" name="banners[]" value="{{ $banner->id }}" id="banner{{ $banner->id }}">
                                        <label for="banner{{ $banner->id }}">Select for deletion</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Delete Selected</button>
                </form>
            @else
                <p class="text-muted text-center">No banners uploaded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmBulkDelete() {
        return confirm('Are you sure you want to delete the selected banners? This action cannot be undone.');
    }
</script>
@endsection
