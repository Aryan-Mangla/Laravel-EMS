@extends('layouts.app')

@section('content')
@include('layouts.navigation')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Sidebar or other content can go here -->
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Banner Images</h5>
                    <p class="card-text">Total Banner Images: {{ $bannerCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
