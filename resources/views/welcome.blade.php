@extends('layouts.app')

@section('content')
<x-nav-bar />
<div class="container-fluid">
    @include('components.banner', ['banners' => App\Models\Banner::all()])

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
