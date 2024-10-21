@extends('layouts.app')

@section('content')
@include('layouts.navigation')
<div class="container">
    <h2>Create Event</h2>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <input type="text" name="meta_description" class="form-control">
        </div>
        <div class="form-group">
            <label for="event_start_time">Event Start Time</label>
            <input type="datetime-local" name="event_start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="event_end_time">Event End Time</label>
            <input type="datetime-local" name="event_end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="images">Upload Images (up to 5)</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="promo">Promo</label>
            <select name="promo" class="form-control">
                <option value="0">New Entry</option>
                <option value="1">Priority</option>
            </select>
        </div>

        <div class="form-group">
            <label for="active">Status</label>
            <select name="active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
@endsection
