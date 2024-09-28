@extends('layouts.app')

@section('content')
@include('layouts.navigation')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Banner Images</h5>
                    <p class="card-text">Total Banner Images: {{ $bannerCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
           
        </div>
    </div>
</div>

@endsection
